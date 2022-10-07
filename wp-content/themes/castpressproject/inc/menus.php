<?php

function cast_menus() {
  register_nav_menu( 'header', 'Header Menu' );
  register_nav_menu( 'footer', 'Footer Menu' );
}

add_action( 'cast_header_menu', 'cast_header_menu_html' );
add_action( 'cast_footer_menu', 'cast_footer_menu_html' );

function cast_header_menu_html() {

  // Получаем все элементы меню
  $locations = get_nav_menu_locations();
  $menu_id = $locations['header'];
  $menu_items = wp_get_nav_menu_items( $menu_id, []);

  
  // Получаем все id родительских элементов
  $menu_items_has_child = [];

  foreach($menu_items as $item) {
    if ($item->menu_item_parent > 0) {
      $menu_items_has_child[] = $item->menu_item_parent;
    }
  }
  $menu_items_has_child = array_unique($menu_items_has_child);

  // Присваиваем родительским элементам is_parent = true
  foreach($menu_items as $item) {
    foreach($menu_items_has_child as $id) {
      if ($item->ID == $id) {
        $item->is_parent = true;
      }
    }
  }
?>

<ul class="topnav__list">
  <?php 
    foreach($menu_items as $item) {

      // донатный li 
      if ($item->classes[0] == 'topnav__link_donate') {
        echo "\t" . '<li class="topnav__item"><a class="topnav__link topnav__link_donate" href="' . $item->url . '">' .
        // '<svg><use xlink:href="' . get_template_directory() . 'img/icons/sprite.svg#heart"></use></svg>' . 
        $item->title . '</a></li>' . "\n";

        continue;
      }

      // обычный li первого уровня
      if (!$item->is_parent && $item->menu_item_parent == '0') {
        echo "\t" . '<li class="topnav__item"><a class="topnav__link" href="' . $item->url . '">'. $item->title . '</a></li>' . "\n";
      }

      // родительский li первого уровня
      if ($item->is_parent) {
        echo "\t" . '<li class="topnav__item topnav__item_has-submenu">' . "\n";
        echo "\t" . '<a class="topnav__link" href="' . $item->url . '">' . $item->title . '</a>' . "\n";
        echo "\t" . '<button class="submenu-toggle"></button>' . "\n";

        // ul воторого уровня (submenu)
        echo "\t" . '<ul class="topnav__submenu submenu">' . "\n";

        // Получаем id этого ul воторого уровня (submenu)
        $submenu_id = $item->ID;
        foreach($menu_items as $subitem) {

          // обычный li второго уровня с родительским id = id текущего ul
          if ($subitem->menu_item_parent == $submenu_id) {
            echo "\t\t" . '<li class="submenu__item"><a class="submenu__link" href="' . $subitem->url . '">' . $subitem->title . '</a></li>' . "\n";
          }
        }
        echo "\t" . '</ul>' . "\n";
        echo "\t" . '</li>' . "\n";
      }
    }
  ?>
</ul>

<?php
}

function cast_footer_menu_html() {

  $locations = get_nav_menu_locations();
  $menu_id = $locations['footer'];
  $menu_items = wp_get_nav_menu_items( $menu_id, []);

  echo '<ul class="footer-nav">' . "\n";

  foreach ( $menu_items as $item ) {
    echo "\t" . '<li class="footer-nav__item"><a class="footer-nav__link" href="' . $item->url . '">'. $item->title . '</a></li>' . "\n";
  }

  echo '</ul>' . "\n";
}

add_action( 'after_setup_theme', 'cast_menus' );