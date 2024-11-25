<?php
$user = $_POST['username'] ?? '';
$passWrd = $_POST['password'] ?? '';
$errors = array();

if (isset($_POST['submit'])) {
  require_once './includes/library.php';
  $pdo = connectdb(); //create database connection

  //Find the login credentials if username exists
  $select = "SELECT `username`, `email`, `password_hash` FROM `assn2_users` WHERE `username` = ?";
  $stmt = $pdo->prepare($select);
  $stmt->execute([$user]);
  $userDetails = $stmt->fetch();

  //check if username is inputted
  if (isset($userDetails['username'])) {
    //check if password match
    if (password_verify($passWrd, $userDetails['password_hash'])) {
      session_start();

      $_SESSION['username'] = $user; //set username for session
      $_SESSION['password'] = $passWrd; //set password for session
      
      header("Location: view-account.php"); //direct user to account viewing page
      exit();
    }
    else {
      $errors['password'] = true;
    }
  }
  else {
    $errors['username'] = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
  <header class="gradient">
    <p>CiNerd</p>
    <img src="./assets/clapperboard and film reel.png" alt="clapperboard and film reel">
  </header>
  <main>
    <div id="center-container">
      <h2>Login</h2>
      <form id="login" method="post" action="" />
      <div class="form-item col">
        <label for="username">Username:</label>
        <!--notice the echo of username to allow for a sticky form on error-->
        <input type="text" id="username" name="username" size="25" value="<?= $user ?>" />
        <span class="error <?= !isset($errors['username']) ? 'hidden' : '' ?>">Your username was invalid</span>
      </div>
      <div class="form-item col">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="25" />
        <span class="error <?= !isset($errors['password']) ? 'hidden' : '' ?>">Your passwords was invalid</span>
      </div>

      <div class="form-item row">
        <div>
          <label for="remember">Remember me</label>
          <input type="checkbox" name="remember" value="remember" />
        </div>
        <a href="#">Forgot password?</a>
      </div>

      <button id="submit" name="submit" class="centered">Login</button>

      </form>
      <div class="link-container">
        <a href="create-account.php">Create a New Account</a>
      </div>
    </div>
  </main>
  <footer class="gradient">
    <p>&copy; CiNerd, Inc. 2024 &mdash; Built by Vishal & Steven</p>
  </footer>

</html>