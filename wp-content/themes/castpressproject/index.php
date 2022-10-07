<?php get_header(); ?>

  <main class="page__content">
    <!-- <div class="wrapper">
      <div class="page__hero">
        <article class="podcast">
          <img class="podcast__img" src="img/podcast-1.jpg" alt="podcast-1" />
          <h1 class="podcast__title podcast__title_index title">How to rapidly test any experience!</h1>
          <a class="podcast__link btn-2" href="/podcast-single.html">
            <svg><use xlink:href="img/icons/sprite.svg#play"></use></svg>
            <span>Episode page</span>
          </a>
          <div class="podcast__platforms">
            <div class="listen-on">
              <span class="listen-on__caption">Listen on</span>
              <ul class="listen-on__list">
                <li class="listen-on__item">
                  <a class="listen-on__link" aria-label="listen on spotify" href="#">
                    <svg><use href="img/icons/sprite.svg#spotify"></use></svg>
                  </a>
                </li>
                <li class="listen-on__item">
                  <a class="listen-on__link" aria-label="listen on soundcloud" href="#">
                    <svg><use href="img/icons/sprite.svg#soundcloud"></use></svg>
                  </a>
                </li>
                <li class="listen-on__item">
                  <a class="listen-on__link" aria-label="listen on apple" href="#">
                    <svg><use href="img/icons/sprite.svg#apple"></use></svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>
      <div class="page__section">
        <div class="podcasts">
          <ul class="podcasts-list podcasts__podcasts-list">
            <li class="podcasts-list__item podcast-card">
              <div class="podcast-card__meta">
                <span class="podcast-card__new">New</span>
                <a class="podcast-card__cat-link" href="#">Business</a>
                <span class="podcast-card__sep">|</span>
                <span class="podcast-card__date">Jan 18, 2021</span>
              </div>
              <h2 class="podcast-card__title"><a href="/podcast-single.html">23 - Makemeup Podcast Theme</a></h2>
              <p class="podcast-card__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
              <a class="podcast-card__link btn-1" href="/podcast-single.html">
                <svg><use xlink:href="img/icons/sprite.svg#podcast-card-play"></use></svg>
                <span>Listen now</span>
              </a>
            </li>
            <li class="podcasts-list__item podcast-card">
              <div class="podcast-card__meta">
                <a class="podcast-card__cat-link" href="#">Education</a>
                <span class="podcast-card__sep">|</span>
                <span class="podcast-card__date">Jan 18, 2021</span>
              </div>
              <h2 class="podcast-card__title"><a href="/podcast-single.html">22 - Makemeup Podcast Theme; launch an audio podcast website</a></h2>
              <p class="podcast-card__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
              <a class="podcast-card__link btn-1" href="/podcast-single.html">
                <svg><use xlink:href="img/icons/sprite.svg#podcast-card-play"></use></svg>
                <span>Listen now</span>
              </a>
            </li>
            <li class="podcasts-list__item podcast-card">
              <div class="podcast-card__meta">
                <a class="podcast-card__cat-link" href="#">Market</a>
                <span class="podcast-card__sep">|</span>
                <span class="podcast-card__date">Jan 18, 2021</span>
              </div>
              <h2 class="podcast-card__title"><a href="/podcast-single.html">21 - Makemeup Podcast Theme ; launch it now!</a></h2>
              <p class="podcast-card__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
              <a class="podcast-card__link btn-1" href="/podcast-single.html">
                <svg><use xlink:href="img/icons/sprite.svg#podcast-card-play"></use></svg>
                <span>Listen now</span>
              </a>
            </li>
          </ul>
          <div class="pagination podcasts__pagination">
            <a class="pagination__item pagination__item_prev" href="#">
              <svg aria-hidden><use xlink:href="img/icons/sprite.svg#pagination"></use></svg>
            </a>
            <a class="pagination__item" href="#">1</a>
            <a class="pagination__item" href="#">2</a>
            <a class="pagination__item" href="#">3</a>
            <a class="pagination__item">...</a>
            <a class="pagination__item pagination__item_next" href="#">
              <svg aria-hidden><use xlink:href="img/icons/sprite.svg#pagination"></use></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="page__section">
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
      </div>
      <div class="page__section">
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
      </div>
      <div class="page__section">
        <section class="latest-posts section">
          <h2 class="title section__title">Latest Posts</h2>
          <article class="latest-posts__item post-card">
            <a class="post-card__thumb" href="/blog-single.html"><img src="img/post-1.jpg" alt="post-1" /></a>
            <div class="post-card__meta">
              <h3 class="post-card__title"><a href="/blog-single.html">How to create your own podcast cover art?</a></h3>
              <span class="post-card__date">Dec 4, 2021</span>
              <a class="post-card__link" href="/blog-single.html">Read More</a>
            </div>
          </article>
          <article class="latest-posts__item post-card">
            <a class="post-card__thumb" href="/blog-single.html"><img src="img/post-2.jpg" alt="post-2" /></a>
            <div class="post-card__meta">
              <h3 class="post-card__title"><a href="/blog-single.html">How to create your own podcast cover art?</a></h3>
              <span class="post-card__date">Dec 1, 2021</span>
              <a class="post-card__link" href="/blog-single.html">Read More</a>
            </div>
          </article>
          <a class="latest-posts__link btn-3" href="/blog.html">
            <span>View Blog</span>
            <svg><use xlink:href="img/icons/sprite.svg#btn-arrow"></use></svg>
          </a>
        </section>
      </div>
    </div> -->
  </main>

<?php get_footer(); ?>