<?php // Template Name: Поддержать ?>

<?php global $assets_path; ?>

<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper">
    <h1 class="page__title"><?php the_title(); ?></h1>
    <div class="article">
      <?php the_content(); ?>
    </div>
    <a class="form__btn btn-4" href="#">
      <span>Поддержать</span>
      <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#btn-arrow"></use></svg>
    </a>
  </div>
</main>

<?php get_footer(); ?>