<?php // Template Name: Контакт ?>

<?php global $assets_path; ?>

<?php get_header(); ?>

<main class="page__content">
  <div class="wrapper contact">
    <h1 class="page__title page__title_sm-margin">Связаться с нами</h1>
 
    <p class="page__descr"><?php echo get_the_content() ?></p>
    
    <?php if ( !isset($_GET['status']) ): ?>

    <form class="contact-form form" action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">

      <input type="hidden" name="action" value="cast-contact-form">

      <div class="form__field">
        <label class="form__label" for="name">Ваше имя*</label>
        <input class="form__input" type="text" name="name" id="name" placeholder="Введите ваше имя" required
        value="<?php if ( isset( $_GET['username'] ) ) echo $_GET['username'] ?>" />

        <?php if ( isset($_GET['name_error']) ): ?>
          <p class="form__error-text">Имя должно содержать минимум 2 символа</p>
        <?php endif; ?>

      </div>

      <div class="form__field">
        <label class="form__label" for="email">Email*</label>
        <input class="form__input" type="text" name="email" id="email" placeholder="Ваш email" required
        value="<?php if ( isset( $_GET['email'] ) ) echo $_GET['email'] ?>" />

        <?php if ( isset($_GET['email_error']) ): ?>
          <p class="form__error-text">Некорректный email-адрес</p>
        <?php endif; ?>

      </div>

      <div class="form__field_last">
        <label class="form__label" for="message">Сообщение* (максимум 500 символов)</label>

        <textarea class="form__input form__input_textarea" name="message" id="message" placeholder="Ваше сообщение" required><?php if ( isset( $_GET['message'] ) ) echo $_GET['message'] ?></textarea>

        <?php if ( isset($_GET['message_error']) && $_GET['message_error'] == 2 ): ?>
          <p class="form__error-text">Превышена допустимая длина сообщения</p>
        <?php endif; ?>
        <?php if ( isset($_GET['message_error']) && $_GET['message_error'] == 1 ): ?>
          <p class="form__error-text">Сообщение слишком короткое</p>
        <?php endif; ?>

      </div>

      <label class="custom-checkbox form__checkbox">
        <input class="custom-checkbox__input" type="checkbox" checked required />
        <span class="custom-checkbox__text">Я соглашаюсь с условиями обработки персональных данных</span>
      </label>

      <button class="form__btn btn-4" type="submit">
        <span>Submit</span>
        <svg><use xlink:href="<?php echo $assets_path; ?>img/icons/sprite.svg#btn-arrow"></use></svg>
      </button>

    </form>

    <?php else: ?>

      <p class="form__success">Спасибо! Ваше сообщение успешно отправлено.</p>

    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>