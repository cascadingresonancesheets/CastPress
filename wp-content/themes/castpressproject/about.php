<?php // Template Name: О нас ?>

<?php global $assets_path; ?>

<?php get_header(); ?>

<main class="page__content">
  <article class="wrapper">
    <h1 class="page__title"><?php the_title(); ?></h1>
    <div class="article">
      <h2><?php the_field( 'headline_1' ); ?></h2>
      <?php the_field( 'about_text' ); ?>
      <h2><?php the_field( 'headline_2' ); ?></h2>
      <ul class="team-about" id="team-about">
        <?php 
          $team_query = new WP_Query([
            'post_type' => 'team',
          ]);

          foreach ( $team_query->posts as $item ):
        ?>
        <li class="team-about__item team-item-2">
          <img class="team-item-2__img" src="<?php echo get_field( 'photo', $item->ID )['sizes']['medium']; ?>" alt="<?php echo $item->post_title; ?>" />
          <div class="team-item-2__meta">
            <div class="team-item-2__position"><?php the_field( 'position', $item->ID ); ?></div>
            <h3 class="team-item-2__name"><?php echo $item->post_title; ?></h3>
            <p class="team-item-2__descr"><?php the_field( 'descr', $item->ID ); ?></p>
            <ul class="team-item-2__socials team-socials">
              <?php
                $links = get_field( 'links', $item->ID );
                foreach ( $links as $label => $link ):
              ?>
              <?php if ( $link !== "" ): ?>
              <li class="team-socials__item">
                <a class="team-socials__link" href="<?php echo $link; ?>">
                  <?php 
                  
                    switch ($label) {
                      case 'vk':
                        echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . 'vk' . '"></use></svg>';
                        break;
                      case 'facebook':
                        echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . 'facebook' . '"></use></svg>';
                        break;
                      case 'twitter':
                        echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . 'twitter' . '"></use></svg>';
                        break;
                      case 'git':
                        echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . 'github' . '"></use></svg>';
                        break;
                      case 'in':
                        echo '<svg aria-hidden="true" focusable="false"><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#' . 'linked' . '"></use></svg>';
                        break;
                    }
                  
                  ?>
                </a>
              </li>
              <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>
        <?php endforeach; wp_reset_postdata(); ?>
      </ul>
    </div>
  </article>
</main>

<?php get_footer(); ?>