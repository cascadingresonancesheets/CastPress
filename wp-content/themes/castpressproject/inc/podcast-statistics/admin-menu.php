<?php

add_action( 'admin_menu', 'cast_statistics_menu' );

function cast_statistics_menu() {
  add_menu_page(
    'Статистика подкастов',
    'Статистика',
    'edit_theme_options',
    'cast_statistics',
    'cast_statistics_page',
    'dashicons-chart-line',
    56
  );
}

function cast_statistics_page() {
  if ( isset($_GET['podcast']) ) {
    include_once('stat-single.php');

  } else {
    echo "<h1>Статистика подкастов</h1>";

    $podcasts_query = new WP_Query([
      'post_type' => 'podcast',
      'posts_per_page' => -1,
    ]);

    if ( $podcasts_query->have_posts() ) : while ( $podcasts_query->have_posts() ) : $podcasts_query->the_post();
      $stat = get_post_meta( get_the_ID(), 'cast-stat', true );
      if ( $stat !== "" ) {
        $listens = ($stat['stats'] == "") ? 0 : count($stat['stats']);
      } else {
        $listens = 0;
      }
    ?>

      <div class="stat-item">
        <a href="<?php echo admin_url('admin.php?page=cast_statistics&podcast=' . get_the_ID()); ?>"><b><?php the_title(); ?></b></a>
        <span>Прослушиваний: </span>
        <b><?php echo $listens; ?></b>
      </div>

    <?php
    endwhile; endif;
    wp_reset_postdata();
  }
}

function cast_enqueue_admin_menu() {
  if ( !isset( $_GET['page'] ) || $_GET['page'] != 'cast_statistics' ) {
    return;
  }
  wp_register_style( 'cast_admin_style', get_template_directory_uri() . '/assets/public/admin-style.css' );
  wp_enqueue_style( 'cast_admin_style' );
}

add_action( 'admin_enqueue_scripts', 'cast_enqueue_admin_menu' );