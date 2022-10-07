<?php

function cast_posts_by_author( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  } 
  
  if ( $query->is_author() ) {
    $query->set( 'post_type', ['podcast', 'blog'] );
  }
  
  if ( $query->is_tag() ) {
    $query->set( 'post_type', ['podcast', 'blog'] );
  }
  
}

add_action( 'pre_get_posts', 'cast_posts_by_author' );