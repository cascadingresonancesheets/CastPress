<li class="blog-posts__item post-card">

  <?php
    if ( has_post_thumbnail() ) {
      echo '<a class="post-card__thumb" href="' . get_the_permalink() . '">';
      echo get_the_post_thumbnail( $id, 'thumbnail' ); 
      echo '</a>';
    } else {
      echo '<div class="no-image"></div>';
    }
  ?>

  <div class="post-card__meta">
    <h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <span class="post-card__date"><?php echo get_the_date( 'M d, Y' ); ?></span>
    <a class="post-card__link" href="<?php the_permalink(); ?>">Читать</a>
  </div>
</li>