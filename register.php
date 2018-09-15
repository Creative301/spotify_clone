<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  $account = new Account($con);

  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  // Set value untuk form jika belum diinput
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
  <div id="inputContainer">
    <form id="loginForm" action="register.php" method="POST">
      <h2>Login to your Account</h2>
      <p>
      <label for="loginUsername">Username</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="User name" required>
      </p>
      <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
      </p>

      <button type="submit" name="loginButton">LOGIN</button>
    </form>

    <form id="registerForm" action="register.php" method="POST">
      <h2>Create your free account</h2>
      <p>
        <!-- getError ambil dari Account.php -->
        <!-- Menampilkan error  -->
        <?php echo $account->getError(Constants::$usernameCharacters); ?> 
        <?php echo $account->getError(Constants::$usernameTaken); ?> 
        <label for="username">User Name</label>
        <!-- getInputValue utk show value yg terakhir diisi -->
        <input id="username" name="username" type="text" placeholder="User Name" value="<?php getInputValue('username') ?>" required>
      </p>

      <p>
        <?php echo $account->getError(Constants::$firstNameCharacters); ?> 
        <label for="firstName">First Name</label>
        <input id="firstName" name="firstName" type="text" placeholder="First name" value="<?php getInputValue('firstName') ?>" required>
      </p>

      <p>
        <?php echo $account->getError(Constants::$lastNameCharacters); ?> 
        <label for="lastName">Last Name</label>
        <input id="lastName" name="lastName" type="text" placeholder="Last Name" value="<?php getInputValue('lastName') ?>" required>
      </p>

      <p>
        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?> 
        <?php echo $account->getError(Constants::$emailInvalid); ?> 
        <?php echo $account->getError(Constants::$emailTaken); ?> 
        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
      </p>

      <p>
       <label for="email2">Confirm Email</label>
        <input id="email2" name="email2" type="text" placeholder="Confirm Email" value="<?php getInputValue('email2') ?>" required>
      </p>

      <p>
        <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?> 
        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?> 
        <?php echo $account->getError(Constants::$passwordCharacters); ?> 
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Your Password" required>
      </p>

      <p>
        <label for="password2">Confirm Password</label>
        <input id="password2" name="password2" type="password" placeholder="Your Password" required>
      </p>

      <button type="submit" name="registerButton">SIGN UP</button>
    </form>
  </div>







    <script src="script.js"></script>
</body>
</html>