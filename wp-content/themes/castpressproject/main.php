<?php // Template Name: Главная ?>

<?php global $assets_path; ?>

<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper">
    <div class="page__hero">
      <div class="podcast">
        <?php 
          $main_podcast_id = ( get_field( 'main_podcast' ) ) ?: [];

          if ( is_int( $main_podcast_id ) ) {
            $main_podcast_args = [
              'post_type' => 'podcast',
              'post__in' => [$main_podcast_id]
            ];
          } else {
            $main_podcast_args = [
              'post_type' => 'podcast',
            ];
          }

          $main_podcast_query = new WP_Query( $main_podcast_args );
          $main_podcast = $main_podcast_query->posts[0];

          $main_podcast_query->the_post();

          // ! Меняем id если в хиро последний опубликованный подкаст
          $main_podcast_id = $id;
        ?>
        <?php
          if ( has_post_thumbnail() ) {
            echo get_the_post_thumbnail( $id, 'thumbnail', ['class' => 'podcast__img'] ); 
          }
        ?>
        <h1 class="podcast__title podcast__title_index title"><?php the_title(); ?></h1>

        <a class="podcast__link btn-2" href="<?php the_permalink(); ?>">
          <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#play"></use></svg>
          <span>Слушать</span>
        </a>

        <?php get_template_part( 'template-parts/listen-on' ); ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>

    <div class="page__section">
      <div class="podcasts">
        <ul class="podcasts-list podcasts__podcasts-list podcasts__podcasts-list_front-page">

          <?php 
            $podcast_query = new WP_Query([
              'post_type' => 'podcast',
              'posts_per_page' => 3,
              'post__not_in' => [$main_podcast_id],
            ]);

            if ( $podcast_query->have_posts() ) : while ( $podcast_query->have_posts() ) : $podcast_query->the_post();
            get_template_part(  'template-parts/list-item-podcast' );
            endwhile; endif;
            wp_reset_postdata();
          ?>

        </ul>
        <a class="latest-posts__link btn-3" href="<?php echo site_url( '/podcasts/' ); ?>">
          <span>Все подкасты</span>
          <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#btn-arrow"></use></svg>
        </a>

      </div>
    </div>
    <!-- <div class="page__section">
      <div class="section shop-section">
        <h2 class="title section__title">Shop The Latest</h2>
        <ul class="shop-section__list shop-list">
          <li class="shop-list__item product-card">
            <div class="product-card__image">
              <a class="product-card__thumb" href="/product.html"><img src="img/shop-1.jpg" alt="product 1" /></a>
              <button class="product-card__btn">Add To Cart</button>
              <span class="product-card__status">Sale</span>
            </div>
            <h3 class="product-card__title"><a href="/product.html">Item 01</a></h3>
            <div class="product-card__price-wrap">
              <span class="product-card__price product-card__price_through">$4,350</span>
              <span class="product-card__price">$120</span>
            </div>
          </li>
          <li class="shop-list__item product-card">
            <div class="product-card__image">
              <a class="product-card__thumb" href="/product.html"><img src="img/shop-2.jpg" alt="product 2" /></a>
              <button class="product-card__btn">Add To Cart</button>
              <span class="product-card__status product-card__status_black">New</span>
            </div>
            <h3 class="product-card__title"><a href="/product.html">Item 02</a></h3>
            <div class="product-card__price-wrap"><span class="product-card__price">$49.99</span></div>
          </li>
          <li class="shop-list__item product-card">
            <div class="product-card__image">
              <a class="product-card__thumb" href="/product.html"><img src="img/shop-3.jpg" alt="product 3" /></a>
              <button class="product-card__btn">Add To Cart</button>
            </div>
            <h3 class="product-card__title"><a href="/product.html">Item 03</a></h3>
            <div class="product-card__price-wrap"><span class="product-card__price">$120</span></div>
          </li>
        </ul>
        <a class="shop-section__link btn-3" href="/shop.html">
          <span>View Shop</span>
          <svg><use xlink:href="img/icons/sprite.svg#btn-arrow"></use></svg>
        </a>
      </div>
    </div> -->
    <!-- <div class="page__section">
      <section class="team-section section">
        <h2 class="title section__title">Team</h2>
        <ul class="team-section__list">
          <li class="team-section__item team-item">
            <img class="team-item__img" src="img/team-2.jpg" alt="Aida Cave" />
            <div class="team-item__meta">
              <div class="team-item__position">Position</div>
              <div class="team-item__name">Aida Cave</div>
              <ul class="team-item__socials team-socials">
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="linked">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#linked"></use></svg>
                  </a>
                </li>
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="github">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#github"></use></svg>
                  </a>
                </li>
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="twitter">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#twitter"></use></svg>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="team-section__item team-item">
            <img class="team-item__img" src="img/team-1.jpg" alt="Nick Carleton" />
            <div class="team-item__meta">
              <div class="team-item__position">Position</div>
              <div class="team-item__name">Nick Carleton</div>
              <ul class="team-item__socials team-socials">
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="linked">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#linked"></use></svg>
                  </a>
                </li>
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="github">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#github"></use></svg>
                  </a>
                </li>
                <li class="team-socials__item">
                  <a class="team-socials__link" href="#" aria-label="twitter">
                    <svg aria-hidden><use xlink:href="img/icons/sprite.svg#twitter"></use></svg>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </section>
    </div> -->
    <div class="page__section">
      <section class="latest-posts section">
        <h2 class="title section__title">Наш блог</h2>
        <?php 
          $blog_query = new WP_Query([
            'post_type' => 'blog',
            'posts_per_page' => 2,
          ]);

          if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
          get_template_part(  'template-parts/list-item-blog' );
          endwhile; endif;
          wp_reset_postdata();
        ?>
        
        <a class="latest-posts__link btn-3" href="<?php echo site_url( '/blog/' ); ?>">
          <span>Все записи</span>
          <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#btn-arrow"></use></svg>
        </a>
      </section>
    </div>
  </div>
</main>

<?php get_footer(); ?>