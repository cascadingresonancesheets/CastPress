<?php

add_action( 'add_meta_boxes', 'cast_meta_boxes' );

function cast_meta_boxes() {
  add_meta_box(
    'cast-contact-form-name',
    'Имя пользователя',
    'cast_contact_form_name_cb',
    'feedback'
  );

  add_meta_box(
    'cast-contact-form-email',
    'Email',
    'cast_contact_form_email_cb',
    'feedback'
  );

  add_meta_box(
    'cast-contact-form-message',
    'Сообщение',
    'cast_contact_form_message_cb',
    'feedback'
  );
}

function cast_contact_form_name_cb($post) {
  $name = get_post_meta( $post->ID, 'cast-contact-form-name', true );

  echo "<p>$name</p>";
}

function cast_contact_form_email_cb($post) {
  $email = get_post_meta( $post->ID, 'cast-contact-form-email', true );

  echo "<p>$email</p>";
}

function cast_contact_form_message_cb($post) {
  $message = get_post_meta( $post->ID, 'cast-contact-form-message', true );

  echo "<p>$message</p>";
}
