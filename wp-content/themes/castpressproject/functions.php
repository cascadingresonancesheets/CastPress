<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

$assets_path = get_template_directory_uri() . '/assets/public/';

include( get_template_directory() . '/inc/enqueue.php' );
include( get_template_directory() . '/inc/menus.php' );
include( get_template_directory() . '/inc/custom-posts.php' );
include( get_template_directory() . '/inc/posts-by-author.php' );
include( get_template_directory() . '/inc/meta.php' );
include( get_template_directory() . '/inc/contact-form.php' );
include( get_template_directory() . '/inc/metaboxes.php' );

include( get_template_directory() . '/inc/podcast-statistics/admin-menu.php' );
include( get_template_directory() . '/inc/podcast-statistics/metabox.php' );
include( get_template_directory() . '/inc/podcast-statistics/save-stats.php' );

// no guttenberg
add_filter( 'use_block_editor_for_post_type', '__return_false' );

// hide post menu item
function custom_menu_page_removing() {
  remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'custom_menu_page_removing' );

// hide editor in pages
function hide_editor() {
  if ( isset($_GET['post']) ) {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $page_template = get_page_template_slug($post_id);
    if( $page_template == 'about.php' || $page_template == 'main.php' ){
      remove_post_type_support('page', 'editor');
    }
  }
}

add_action( 'admin_menu', 'hide_editor' );

update_option( 'medium_crop', 1 );