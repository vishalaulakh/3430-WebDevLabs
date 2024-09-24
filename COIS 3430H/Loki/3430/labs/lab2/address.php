<?php
// include class and start session
include 'includes/class_contact.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Address Book</title>
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
      <h2>Entries</h2>
      <!-- var dump session contacts -->
       <?= var_dump($_SESSION['contact']);?>
    </div>
    <div id="right-side-container"></div>
  </main>
  <footer>&copy; COIS 3430, Inc. 2024 &mdash; Built by {{ name }}</footer>

</body>

</html>