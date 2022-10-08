<?php

function cast_register_posts() {

  // Podcast Taxonomy
  register_taxonomy( 'podcast_category', ['podcast'], [
    'labels' => [
      'name' => 'Категории',
      'singular_name' => 'Категория',
    ],
    'public' => true,
    'hierarchical' => true,
    'show_admin_column' => true,
    'rewrite' => [
      'slug' => 'podcasts/category',
    ],
  ] );

  // Podcast Post Type
  register_post_type( 'podcast', [
    'menu_position' => 5,
    'supports' => ['title', 'editor', 'thumbnail', 'comments', 'author'],
    'taxonomies' => ['podcast_category', 'post_tag'],
    'rewrite' => [
      'slug' => 'podcasts',
    ],
    'has_archive' => true,
    'public' => true,
    'labels' => [
      'name' => 'Подкасты',
      'add_new' => 'Добавить подкаст',
      'add_new_item' => 'Добавить подкаст',
      'edit_item' => 'Редактировать подкаст',
      'all_items' => 'Все подкасты',
      'singular_name' => 'Подкаст',
    ],
    'menu_icon' => 'dashicons-microphone',
  ] );

  // Blog Post Type
  register_post_type( 'blog', [
    'menu_position' => 5,
    'supports' => ['title', 'editor', 'thumbnail', 'comments', 'author'],
    'taxonomies' => ['post_tag'],
    'rewrite' => [
      'slug' => 'blog',
    ],
    'has_archive' => true,
    'public' => true,
    'labels' => [
      'name' => 'Блог',
      'add_new' => 'Добавить пост',
      'add_new_item' => 'Добавить пост',
      'edit_item' => 'Редактировать пост',
      'all_items' => 'Все посты',
      'singular_name' => 'Пост',
    ],
    'menu_icon' => 'dashicons-welcome-write-blog',
  ] );

  // Team Post Type
  register_post_type( 'team', [
    'menu_position' => 15,
    'supports' => ['title'],
    'has_archive' => false,
    'public' => false,
    'show_ui' => true,
    'publicly_queryable' => false,
    'exclude_from_search' => false,
    'show_in_nav_menus' => false,
    'labels' => [
      'name' => 'Команда',
      'add_new' => 'Добавить члена команды',
      'add_new_item' => 'Добавить члена команды',
      'edit_item' => 'Редактировать члена команды',
      'all_items' => 'Все члены команды',
      'singular_name' => 'Член команды',
    ],
    'menu_icon' => 'dashicons-groups',
  ] );

  // Feedback Post Type
  register_post_type( 'feedback', [
    'menu_position' => 55,
    'supports' => ['title'],
    'has_archive' => false,
    'public' => false,
    'show_ui' => true,
    'publicly_queryable' => false,
    'exclude_from_search' => false,
    'show_in_nav_menus' => false,
    'labels' => [
      'name' => 'Обратная связь',
      'all_items' => 'Обратная связь',
      'singular_name' => 'Обратная связь',
    ],
    'menu_icon' => 'dashicons-feedback',
    'map_meta_cap' => true,
    'capabilities' => [
      'create_posts' => false
    ]
  ] );
}

add_action( 'init', 'cast_register_posts' );