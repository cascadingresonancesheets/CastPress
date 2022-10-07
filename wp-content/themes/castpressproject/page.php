<?php get_header(); ?>

<main class="page__content">
  <article class="wrapper">
    <h1 class="page__title"><?php the_title(); ?></h1>
    <div class="article">
      <?php the_content(); ?>
    </div>
  </article>
</main>

<?php get_footer(); ?>