<?php

add_action( 'admin_post_nopriv_cast-contact-form', 'cast_contact_form_handler' );
add_action( 'admin_post_cast-contact-form', 'cast_contact_form_handler' );

function cast_contact_form_handler() {
  $page_slug = "/kontakt/";

  $name = sanitize_text_field( $_POST['name'] );
  $email = sanitize_email( $_POST['email'] );
  $message = sanitize_text_field( $_POST['message'] );

  if ( mb_strlen($name) < 2 ) {
    header( 'Location: ' . home_url( $page_slug . "?name_error&username=$name&email=$email&message=$message" ) );
    exit();
  }
  
  if ( mb_strlen($email) == 0 ) {
    header( 'Location: ' . home_url( $page_slug . "?email_error&username=$name&email=$email&message=$message" ) );
    exit();
  }

  if ( mb_strlen($message) >= 500 || mb_strlen($message) <= 20 ) {
    $message_error = (mb_strlen($message) <= 500) ? 1 : 2;

    header( 'Location: ' . home_url( $page_slug . "?message_error=$message_error&username=$name&email=$email&message=$message" ) );
    exit();
  }

  $id = wp_insert_post(wp_slash([
    'post_title' => "Сообщение",
    'post_type' => 'feedback',
    'post_status' => 'publish'
  ]));

  if ( $id !== 0 ) {
    wp_update_post(wp_slash([
      'ID' => $id,
      'post_title' => "Сообщение от: $email",
    ]));

    update_post_meta( $id, 'cast-contact-form-name', $name );
    update_post_meta( $id, 'cast-contact-form-email', $email );
    update_post_meta( $id, 'cast-contact-form-message', $message );
  }
  
  // send email
  
  header( 'Location: ' . home_url( $page_slug . "?status=ok" ) );
}

