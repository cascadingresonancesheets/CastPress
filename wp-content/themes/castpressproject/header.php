<?php global $assets_path; ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>
  </head>
  <body class="page">
    <header class="header">
      <div class="wrapper header__wrapper">
        <a class="logo" href="<?php echo site_url(); ?>" aria-label="Homepage link">
          <img src="<?php echo $assets_path; ?>img/logo.svg" alt="CastPress logo" />
        </a>
        <button class="humb" aria-label="Main navigation menu">
          <span class="humb__elem-1"></span>
          <span class="humb__elem-2"></span>
        </button>
        <nav class="topnav">
          <?php do_action( 'cast_header_menu' ); ?>

          <div class="header-search">
            <form class="onefield-form">
              <input class="onefield-form__input" type="text" name="search" placeholder="Search..." required />
              <button class="onefield-form__btn onefield-form__btn_search" aria-label="Search">
                <svg><use href="<?php echo $assets_path; ?>img/icons/sprite.svg#search"></use></svg>
              </button>
            </form>
          </div>
        </nav>
        <div class="header-icons">
          <button class="search-icon" aria-label="Toggle search form">
            <svg class="search-icon__svg"><use href="<?php echo $assets_path; ?>img/icons/sprite.svg#search"></use></svg>
            <span class="search-icon__cross">&#x2715;</span>
          </button>
          <a class="header-icons__item" aria-label="Cart" href="./cart.html">
            <svg class="header-icons__svg header-icons__svg_cart"><use href="<?php echo $assets_path; ?>img/icons/sprite.svg#cart"></use></svg>
          </a>
          <a class="header-icons__item" aria-label="Profile" href="./account.html">
            <svg class="header-icons__svg"><use href="<?php echo $assets_path; ?>img/icons/sprite.svg#profile"></use></svg>
          </a>
        </div>
      </div>
    </header>