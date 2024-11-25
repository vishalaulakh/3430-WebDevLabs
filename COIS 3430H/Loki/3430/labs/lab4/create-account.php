<?php

//get data from post
$user = $_POST['username'] ?? "";
$email = $_POST['email'] ?? "";
$password1 = $_POST['password'] ?? "";
$password2 = $_POST['password2'] ?? "";
$errors = array();


//when form has been submitted
if (isset($_POST['submit'])) {

  //make sure name isn't empty
  if (empty($user)) {
    $errors['username'] = true;
  }
  //verify email is valid
  if (empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $errors['email'] = true;
  }

  if ((strcmp($password1, $password2) !== 0)){
    $errors['p_match'] = true;
  }
  if (strlen($password1)< 10){
    $errors['p_strength'] = true;
  }
   if(empty($errors)){
    require_once 'includes/library.php';
    $pdo = connectdb();
    $hashedpass = password_hash($password1,PASSWORD_DEFAULT);
    ######## Do database insert here ###########
    $stmt = $pdo -> prepare ("INSERT into cois3430_lab_users (username ,email, pwd) values (?,?, ?)");
    $stmt -> execute([$user, $email, $hashedpass]);
  
    header("Location:login.php");
    exit();
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
  <header>
    <h1>My Address Book</h1>
  </header>
  <main>
    <nav>
      <h2>Menu</h2>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="contact.php">Add Contact</a></li>
        <li><a href="address.php">View Address Book</a></li>
      </ul>
    </nav>
    <div id="center-container">
      <h2>Create Account</h2>
      <form id="create-account" method="post" action="" />
      <div class="form-item col">
        <label for="username">Username:</label>
        <!--notice the echo of username to allow for a sticky form on error-->
        <input type="text" id="username" name="username" size="25" value="<?= $user ?>" />
        <span class="error <?= !isset($errors['username']) ? 'hidden' : '' ?>">Your username cannot be empty</span>
      </div>
      <div class="form-item col">
        <label for="email">Email:</label>

        <input type="text" id="email" name="email" size="25" value="<?= $email ?>" />
        <span class="error <?= !isset($errors['email']) ? 'hidden' : '' ?>">Your email was invalid</span>
      </div>
      <div class="form-item col">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="25" />
        <span class="error <?= !isset($errors['p_strength']) ? 'hidden' : '' ?>">Your password was not strong
          enough</span>
      </div>
      <div class="form-item col">
        <label for="password2">Verify Password:</label>
        <input type="password" id="password2" name="password2" size="25" />
        <span class="error <?= !isset($errors['p_match']) ? 'hidden' : '' ?>">Your passwords do not match</span>
      </div>


      <button id="submit" name="submit">Create Account</button>

      </form>

    </div>

    <div id="right-side-container"></div>
  </main>

  <footer>&copy; COIS 3430, Inc. 2024 &mdash; Built by {{ name }}</footer>


</body>

</html>