<?php $names="Harry Potter, ron Weasley, Hermione Granger, lavender brown, Pavarti patil, NEVILLE Longbottom, Seamus FiNNegan, Dean Thomas";
      $arraynames = explode( ',' , $names);
      var_dump($arraynames);
      
      $arraynames[] = "Draco malfoy";
      var_dump($arraynames);

      natcasesort($arraynames);
      var_dump($arraynames);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <title>COIS 3430 Lab 1</title>
</head>

<body>
  <h1>Welcome to COIS 3430</h1>
  <ul>
    <?php foreach($arraynames as $name): ?>
    <li> <?=ucwords(strtolower($name))?> </li>
    <?php endforeach; ?>
  </ul>
  <p>Bonus Part:</p>
  <ul>
  <?php foreach($arraynames as $name): ?>
    <li class="<?= str_contains(strtolower($name), 'h')  ? 'ravenclaw' : 'gryffindor' ?>">
        <?= ucwords(strtolower(trim($name))) ?>
      </li>
    <?php endforeach; ?>

    
  </ul>
  <?php
// Check if the form is submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $word = $_POST['word'] ?? '';
    echo "You entered: $word";
}
?>

<form method="post">
  <label for="word">Enter a word:</label>
  <input type="text" name="word" id="word" />
  <button type="submit">Submit</button>
</form>

</body>

</html>