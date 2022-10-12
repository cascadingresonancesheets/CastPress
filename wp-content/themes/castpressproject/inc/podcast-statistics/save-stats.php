<?php

add_action( 'wp_ajax_cast-save-stats', 'cast_save_stats' );
add_action( 'wp_ajax_nopriv_cast-save-stats', 'cast_save_stats' );

function cast_save_stats() {
  $stats = get_post_meta( $_POST['id'], 'cast-stat', true );

  if ( $stats === "" ) {
    unset($stats);
    $stats = [];
  }

  if ( $_POST['stat'] !== 'undefined') {
    $stats['stats'][] = $_POST['stat'];
    $stats['time'] = $_POST['time'];
    update_post_meta( $_POST['id'], 'cast-stat', $stats );
  }

  // delete_post_meta_by_key('cast-stat');
}