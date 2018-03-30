<?php

  function validation($user) {
    $errors = [];

    // check validation for input and store errors in array
    if(empty($user['first-name'])) {
      $errors[] = "First Name is required";
    }

    if (empty($user['last-name'])) {
      $errors[] = "Last Name is required";
    }

    if (empty($user['email'])) {
      $errors[] = "Email cannot be blank";
    }

    if (empty($user['password'])) {
      $errors[] = "Password cannot be blank";
    }

    if (empty($user['username'])) {
      $errors[] = "Username cannot be blank";
    }

    if (empty($user['favTeam'])) {
      $errors[] = "Please choose a favourite team";
    }

    if (empty($user['confirm-password'])) {
      $errors[] = "Please confirm your password";
    }

    if ($user['password'] != $user['confirm-password']) {
      $errors[] = "Passwords must match";
    }

    return $errors;

  }

?>
