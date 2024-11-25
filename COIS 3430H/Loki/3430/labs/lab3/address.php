<?php
# Include library and create connection
require_once 'includes/library.php';
$pdo = connectdb();

#Do database work here
$search = $_GET['search'] ?? "";
if (!empty($search)) {
  $query = "SELECT name, email, phoneType, phone, contactType FROM cois3430_lab_contacts WHERE name LIKE ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute(["%$search%"]);  // Add wildcards (%) before and after the search term
} else {
  # Default query to select all contacts
  $query = "SELECT name, email, phoneType, phone, contactType FROM cois3430_lab_contacts";
  $stmt = $pdo->query($query);
}



// $results = $stmt->fetchAll();



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
      <table id="results">
        <thead>
          
          <th>Name</th>
          <th>Email</th>
          <th>P. Type</th>
          <th>Phone Number</th>
          <th>Contact Type</th>
        </thead>
        <tbody>
          <!-- add loop here -->
          <?php
            foreach ($stmt as $row):
           ?>
            
          <!-- replace hard coded values with dynamic output -->
          <tr>
            <td><?= $row['name'] ?> </td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phoneType'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['contactType'] ?></td>

          </tr>
          <!-- end loop here -->
          <?php endforeach ?>
        </tbody>
      </table>

    </div>
    <div id="right-side-container">
      <h2>Filter Results</h2>
      <form method="get">
        <label for="search">Name:</label>
        <input type="text" name="search" id="search" value="<?= $search ?>">
        <button type="submit">Filter Address Book</button>
      </form>
    </div>
  </main>
  <footer>&copy; COIS 3430, Inc. 2024 &mdash; Built by Vishal </footer>

</body>

</html>