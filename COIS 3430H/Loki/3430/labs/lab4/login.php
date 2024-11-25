<?php
$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";
$errors = array();
if (isset($_POST['submit'])) {
  require_once 'includes/library.php';
  $pdo = connectdb();

  $stmt = $pdo->prepare("SELECT UserID, username, pwd FROM cois3430_lab_users WHERE username = :username");

  // Bind the username parameter
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);

  // Execute the query
  $stmt->execute();

  // Fetch the user data
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    // Username does not exist in the database
    $errors['username'] = true;
  } else {
    // Verify the entered password with the stored hash
    if (password_verify($password, $user['pwd'])) {
      // Password is correct, start a session
      session_start();
      // Store user information in session variables
      $_SESSION['username'] = $user['username'];
      $_SESSION['user_id'] = $user['UserID'];
      // Redirect to address.php
      header("Location: address.php");
      exit();
    } else {
      // Password is incorrect
      $errors['password'] = true;
    }
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
      <h2>Login</h2>
      <form id="login" method="post" action="" />
      <div class="form-item col">
        <label for="username">Username:</label>
        <!--notice the echo of username to allow for a sticky form on error-->
        <input type="text" id="username" name="username" size="25" value="<?= $username ?>" />
        <span class="error <?= !isset($errors['username']) ? 'hidden' : '' ?>">Your username was invalid</span>
      </div>
      <div class="form-item col">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="25" />
        <span class="error <?= !isset($errors['password']) ? 'hidden' : '' ?>">Your password was invalid</span>
      </div>

      <div class="form-item row">
        <label for="remember">Remember:</label>
        <input type="checkbox" name="remember" value="remember" />
      </div>

      <button id="submit" name="submit" class="centered">Login</button>

      </form>
      <a href="create-account.php">Create a New Account</a>

    </div>

    <div id="right-side-container"></div>
  </main>

  <footer>&copy; COIS 3430, Inc. 2024 &mdash; Built by {{ name }}</footer>


</body>

</html>