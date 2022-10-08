<?php global $assets_path; ?>
<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper">

    <?php while ( have_posts() ): the_post(); ?>

      <div class="page__hero">
        <div class="podcast">
          <!-- post img -->
          <?php
            if ( has_post_thumbnail() ) {
              echo get_the_post_thumbnail( $id, 'thumbnail', ['class' => 'podcast__img'] ); 
            }
          ?>

          <!-- post title -->
          <h1 class="podcast__title title"><?php the_title(); ?></h1>

          <!-- post meta -->
          <div class="podcast__meta post-meta">

            <!-- post category link -->
            <?php 
              $category = get_the_terms( $id, 'podcast_category' );
              $category_url = get_term_link( $category[0]->term_id );
            ?>
            <a class="post-meta__item" href="<?php echo $category_url; ?>"><?php echo $category[0]->name; ?></a>

            <span class="post-meta__sep">|</span>

            <!-- post date -->
            <span class="post-meta__item"><?php the_date( 'M d, Y' ); ?></span>

            <span class="post-meta__sep">|</span>

            <!-- author -->
            <?php 
              $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
            ?>
            <a class="post-meta__item" href="<?php echo $author_url; ?>"><?php the_author(); ?></a>

          </div>

          <!-- PLAYER -->
          <div class="player podcast__player player">

            <audio id="player" src="<?php the_field( 'podcast_audiofile' ); ?>"></audio>
            <button class="player__play" aria-label="Play / Pause">
              <svg class="player__play-svg player__play-svg_is-active"><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#play"></use></svg><svg class="player__pause-svg"><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#pause"></use></svg>
            </button>
            <span class="player__current-time">00:00:00</span>
            <span class="player__time-sep">/</span>
            <div class="player__progress-bar"><div class="player__progress"></div></div>
            <span class="player__play-time">00:00:00</span>
            <div class="player__volume-wrap">
              <button class="player__volume" aria-label="Volume">
                <svg class="player__volume-svg player__volume-svg_is-active"><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#sound"></use></svg><svg class="player__volume_muted-svg"><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#sound_muted"></use></svg>
              </button>
              <div class="player__volume-bar"><div class="player__volume-value"></div></div>
            </div>
            <a class="player__download" href="<?php the_field( 'podcast_audiofile' ); ?>" download>
              <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#download"></use></svg>
            </a>
          </div>

          <?php get_template_part( 'template-parts/listen-on' ); ?>
          
        </div>
      </div>
      <div class="page-article">
        <!-- podcast description (content) -->
        <div class="page-article__item">
          <div class="article">
            <?php
              if ( get_field( 'podcast_intro' ) ) {
                echo '<p class="article__intro">';
                the_field( 'podcast_intro' );
                echo '</p>';
              }
            ?>
            <?php the_content(); ?>
          </div>
        </div>
        <div class="page-article__item">

          <!-- transcript -->
          <?php if ( get_field( 'podcast_transcript' ) ): ?>
            <details class="transcript">
              <summary class="transcript__caption">
                Продолжительность <span>0</span> мин. | Просмотреть стенограмму
                <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#arrow"></use></svg>
              </summary>
              <div class="transcript__content">
                <?php the_field( 'podcast_transcript' ); ?>
              </div>
            </details>
          <?php endif; ?>
        </div>
        <div class="page-article__item page-article__item_sm-margin">

          <!-- TAGS -->    
          <?php 
            $tags = get_the_tags();
            $tags_id = [0];
            if ( $tags ) {
              echo '<ul class="post-tags">' . "\n";
              foreach ( $tags as $tag ) {
                echo "\t" . '<li class="post-tags__item"><a class="post-tags__link" href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>' . "\n";
                $tags_id[] = $tag->term_id;
              }
              echo '</ul>';
            }
          ?>
          
        </div>
        <div class="page-article__item">
          <?php get_template_part( 'template-parts/share' ); ?>
        </div>
        <?php 
          $podcasts_related_query = new WP_Query([
            'post_type' => 'podcast',
            'posts_per_page' => 2,
            'orderby' => 'rand',
            'post__not_in' => [$id],
            'tax_query' => [
              'relation' => 'OR',
              [
                'taxonomy' => 'podcast_category',
                'field' => 'slug',
                'terms' => $category[0]->slug
              ],
              [
                'taxonomy' => 'post_tag',
                'terms' => $tags_id,
              ],
            ]
          ]);
              
          if ( $podcasts_related_query->have_posts() ): ?>
          
            <div class="page-article__item">
              <section class="related-posts section">
                <h2 class="section__title title">Слушайте также</h2>
                <ul>

                <?php
                  while ( $podcasts_related_query->have_posts() ) : $podcasts_related_query->the_post();
                  get_template_part(  'template-parts/list-item-podcast' );
                  endwhile; 
                ?>

              </ul>
            </section>
          </div>

        <?php endif; wp_reset_postdata(); ?>

        <div class="reply">
          <h3 class="reply__title">Leave a Reply</h3>
          <p class="reply__descr">Required fields are marked *</p>
          <form class="reply__form form">
            <div class="form__field">
              <label class="form__label" for="comment">Comment*</label>
              <textarea class="form__input form__input_textarea" name="comment" id="comment" required></textarea>
            </div>
            <div class="form__field">
              <label class="form__label" for="name">Name*</label>
              <input class="form__input" type="text" name="name" id="name" required />
            </div>
            <div class="form__field">
              <label class="form__label" for="email">Email*</label>
              <input class="form__input" type="email" name="email" id="email" required />
            </div>
            <div class="form__field_last">
              <label class="form__label" for="website">Website</label>
              <input class="form__input form__input_last" type="url" name="website" id="website" />
            </div>
            <label class="custom-checkbox form__checkbox">
              <input class="custom-checkbox__input" type="checkbox" checked />
              <span class="custom-checkbox__text">I agree to receive communications from Createx Construction Bureau.</span>
            </label>
            <button class="form__btn btn-4" type="submit">
              <span>Submit</span>
              <svg><use xlink:href="img/icons/sprite.svg#btn-arrow"></use></svg>
            </button>
          </form>
        </div>
        <section class="comments">
          <h3 class="comments__title">Comments</h3>
          <div class="comments__section">
            <div class="comment">
              <img class="comment__user-img" src="img/team-1.jpg" alt="user-1" />
              <div class="comment__content">
                <div class="comment__user-name">Mark Newman</div>
                <div class="comment__date">October 24.2020</div>
                <div class="comment__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
                <button class="comment__reply">
                  <svg><use xlink:href="img/icons/sprite.svg#reply"></use></svg>
                  <span>Reply</span>
                </button>
              </div>
            </div>
            <div class="comment comment_subcomment">
              <img class="comment__user-img" src="img/team-2.jpg" alt="user-1" />
              <div class="comment__content">
                <div class="comment__user-name">Scarlet Witch</div>
                <div class="comment__date">October 24.2020</div>
                <div class="comment__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
                <button class="comment__reply">
                  <svg><use xlink:href="img/icons/sprite.svg#reply"></use></svg>
                  <span>Reply</span>
                </button>
              </div>
            </div>
            <hr class="comment__sep" />
            <div class="comment">
              <img class="comment__user-img" src="img/team-1.jpg" alt="user-1" />
              <div class="comment__content">
                <div class="comment__user-name">Mark Newman</div>
                <div class="comment__date">October 24.2020</div>
                <div class="comment__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
                <button class="comment__reply">
                  <svg><use xlink:href="img/icons/sprite.svg#reply"></use></svg>
                  <span>Reply</span>
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>