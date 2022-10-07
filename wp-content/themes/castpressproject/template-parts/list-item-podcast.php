<?php global $assets_path; ?>

<li class="podcasts-list__item podcast-card">
  <div class="podcast-card__meta">

    <!-- is new -->
    <?php 
      if ( time() - get_post_timestamp( $id ) < 259200 ) {
        echo '<span class="podcast-card__new">Свежак</span>';
      }
    ?>

    <!-- post category link -->
    <?php 
      $category = get_the_terms( $id, 'podcast_category' );
      $category_url = get_term_link( $category[0]->term_id );
    ?>
    <a class="podcast-card__cat-link" href="<?php echo $category_url; ?>"><?php echo $category[0]->name; ?></a>
    <span class="podcast-card__sep">|</span>

    <!-- post date -->
    <span class="podcast-card__date"><?php echo get_the_date( 'M d, Y' ); ?></span>
  </div>
  <h2 class="podcast-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <!-- post excerpt -->
  <?php if ( get_field( 'podcast_intro' ) ): ?>
    <p class="podcast-card__descr"><?php the_field( 'podcast_intro' ); ?></p>
  <?php endif; ?>

  <a class="podcast-card__link btn-1" href="<?php the_permalink(); ?>">
    <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#podcast-card-play"></use></svg>
    <span>Слушать</span>
  </a>
</li>