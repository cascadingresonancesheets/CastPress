<?php global $assets_path; ?>

<footer class="footer">
      <div class="footer__main">

        <nav class="footer__nav">
          <?php do_action( 'cast_footer_menu' ); ?>
        </nav>

        <form class="footer-form" action="#">
          <h3 class="footer-form__title">Newsletter</h3>
          <label class="footer-form__label" for="footer-email">Sign up now; get closer to our action.</label>
          <div class="footer-form__input onefield-form">
            <input class="onefield-form__input" type="email" name="email" placeholder="Email adress..." required id="footer-email" />
            <button class="onefield-form__btn" aria-label="subscribe">
              <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#arrow"></use></svg>
            </button>
          </div>
        </form>

      </div>
      <div class="footer__bottom">
        <div class="footer__slogan">
          PodcastTheme by VitaThemes |
          <a href="/privacy.html" target="_blank">Privacy policy</a>
        </div>
        <ul class="footer__socials socials">
          <li class="socials__item">
            <a class="socials__link" href="#" aria-label="facebook" target="_blank">
              <svg><use href="img/icons/sprite.svg#facebook"></use></svg>
            </a>
          </li>
          <li class="socials__item">
            <a class="socials__link" href="#" aria-label="github" target="_blank">
              <svg><use href="img/icons/sprite.svg#github"></use></svg>
            </a>
          </li>
          <li class="socials__item">
            <a class="socials__link" href="#" aria-label="twitter" target="_blank">
              <svg><use href="img/icons/sprite.svg#twitter"></use></svg>
            </a>
          </li>
        </ul>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>