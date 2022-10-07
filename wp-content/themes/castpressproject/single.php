<?php global $assets_path; ?>
<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper">

    <?php while ( have_posts() ): the_post(); ?>

      <div class="page__hero">
        <div class="post-hero">
          <!-- post img -->
          <?php
            if ( has_post_thumbnail() ) {
              echo get_the_post_thumbnail( $id, 'thumbnail', ['class' => 'post-hero__img'] ); 
            }
          ?>

          <!-- post title -->
          <h1 class="post-hero__title title"><?php the_title(); ?></h1>

          <!-- post meta -->
          <div class="post-hero__meta post-meta">

            <!-- post date -->
            <span class="post-meta__item"><?php the_date( 'M d, Y' ); ?></span>

            <span class="post-meta__sep">|</span>

            <!-- author -->
            <?php 
              $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
            ?>
            <a class="post-meta__item" href="<?php echo $author_url; ?>"><?php the_author(); ?></a>

          </div>
        </div>
      </div>
      <div class="page-article">
        <!-- podcast description (content) -->
        <div class="page-article__item">
          <div class="article">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="page-article__item">

          <!-- TAGS -->    
          <?php 
            $tags = get_the_tags();
            if ( $tags ) {
              $tags_id = [];
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
          <div class="post-share">
            <span class="post-share__caption">Share:</span>
            <ul class="socials">
              <li class="socials__item">
                <a class="socials__link" href="#" aria-label="facebook">
                  <svg aria-hidden><use xlink:href="img/icons/sprite.svg#facebook"></use></svg>
                </a>
              </li>
              <li class="socials__item">
                <a class="socials__link" href="#" aria-label="github">
                  <svg aria-hidden><use xlink:href="img/icons/sprite.svg#github"></use></svg>
                </a>
              </li>
              <li class="socials__item">
                <a class="socials__link" href="#" aria-label="twitter">
                  <svg aria-hidden><use xlink:href="img/icons/sprite.svg#twitter"></use></svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <?php 
          $blog_related_query = new WP_Query([
            'post_type' => 'blog',
            'posts_per_page' => 2,
            'tag__in' => $tags_id,
            'orderby' => 'rand',
            'post__not_in' => [$id]
          ]);

          if ( $blog_related_query->have_posts() ) : ?>

            <div class="page-article__item">
              <section class="related-posts section">
                <h2 class="section__title title">Похожие посты</h2>
                <ul>

                <?php
                  while ( $blog_related_query->have_posts() ) : $blog_related_query->the_post();
                  get_template_part(  'template-parts/list-item-blog' );
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