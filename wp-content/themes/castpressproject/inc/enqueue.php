<?php

function cast_enqueue() {
  wp_register_style( 'cast_style', get_template_directory_uri() . '/assets/public/style.css' );
  wp_enqueue_style( 'cast_style' );

  wp_register_script( 'cast_main_js', get_template_directory_uri() . '/assets/public/main.js', [], false, true );
  wp_enqueue_script( 'cast_main_js' );
}

add_action( 'wp_enqueue_scripts', 'cast_enqueue' );