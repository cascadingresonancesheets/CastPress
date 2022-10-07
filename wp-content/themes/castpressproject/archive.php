<?php global $assets_path; ?>
<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper">

    <?php 
    
      if ( is_post_type_archive( 'podcast' ) ) {
        $h1 = 'Подкасты';
      }

      if ( is_tax( 'podcast_category' ) ) {
        $h1 = 'Подкасты из категории: ' . $wp_query->queried_object->name;
      }

      if ( is_author() ) {
        $h1 = 'Автор: ' . $wp_query->query_vars['author_name'];
        $list_class = 'items-list';
      }

      if ( is_post_type_archive( 'blog' ) ) {
        $h1 = 'Наш блог';
      }

      if ( is_tag() ) {
        $h1 = 'Материалы по тегу: ' . $wp_query->queried_object->name;
        $list_class = 'items-list';
      }

    ?>

    <h1 class="page__title"><?php echo $h1; ?></h1>

    <div class="podcasts <?php if ($list_class) echo $list_class; ?>">
      <ul class="podcasts-list podcasts__podcasts-list">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php get_template_part(  'template-parts/list-item', get_post_type() ); ?>

      <?php endwhile; else: ?>
        Записей нет.
      <?php endif; ?>

      </ul>

      <?php 
        the_posts_pagination([
          'prev_text' => '<svg aria-hidden><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#pagination"></use></svg>',
          'next_text' => '<svg aria-hidden><use xlink:href="' . $assets_path . 'img/icons/sprite.svg#pagination"></use></svg>',
          'screen_reader_text' => 'Пагинация'
        ]); 
      ?> 

    </div>
  </div>
</main>

<?php get_footer(); ?>