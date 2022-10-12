<?php

add_action( 'add_meta_boxes', 'cast_stat_meta_box' );

function cast_stat_meta_box() {
  add_meta_box(
    'cast-stat',
    'Статистика',
    'cast_stat_cb',
    'podcast',
    'side'
  );
}

function cast_stat_cb($post) {
  echo "<a href='#'>Посмотреть статистику</a>";
}