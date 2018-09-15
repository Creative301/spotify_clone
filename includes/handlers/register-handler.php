<?php

// Sanitize password form function
function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText); // Remove HTML tags
  return $inputText;
}

// Sanitize username form function
function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText); // Remove HTML tags
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

// Sanitize string form function
function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText)); // Capitalize first letter
  return $inputText;
}




// If sign up button is pressed, do something
if (isset($_POST['registerButton'])) {
  // "Sign up button was pressed";
  // echo "Sign up button was pressed";

  // Get data from the field when Sign up button was pressed and sanitize
  $username = sanitizeFormUsername($_POST['username']);

  $firstName = sanitizeFormString($_POST['firstName']);

  $lastName = sanitizeFormString($_POST['lastName']);

  $email = sanitizeFormString($_POST['email']);

  $email2 = sanitizeFormString($_POST['email2']);

  $password = sanitizeFormPassword($_POST['password']);

  $password2 = sanitizeFormPassword($_POST['password2']);
  
  // Jika input dari user tdk ada error (registrasi sukses)
  $wasSuccessfull = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

  // Redirect ke index
  if($wasSuccessfull == true) {
    header("Location: index.php");
  }


}


?>