<?php

require('../includes/library.php');
$pdo = connectdb();
$uri = parse_url($_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];
define('__BASE__', '/~vishalsingh/3430/labs/lab9/api/');

// var_dump($_SERVER);

function response($status, $message, $data)
{
  $json = json_encode($data);
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  header("HTTP/1.1 $status $message");
  header("Content-Length: " . strlen($json)); // NB: strlen returns bytes, not chars (good!)
  echo $json;
  exit();
}



$endpoint = str_replace(__BASE__, "", $uri["path"]);
// $params = $uri["query"]??
/*
 * Path: GET /api/users
 * Task: return all contacts or filtered contacts
 */
if ($method == 'GET' && $endpoint == 'contacts') {

  if (isset($uri['query'])) {
    if (isset($_GET['search'])) {
      $query = "select * from cois3430_lab_contacts where name like ?";
      $stmt = $pdo->prepare($query);
      $stmt->execute(["%$_GET[search]%"]);
      $results = $stmt->fetchAll();
      response("200", "Ok", $results);
    } else {
      $results['error'] = "Invalid Query Parameter";
      response("404", "Not Found", $results);
    }
  } else {
    $query = "select * from cois3430_lab_contacts";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    response("200", "Ok", $results);
  }
} else {
  response("500", "Bad Request", $response['error'] = "Not a valid endpoint");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index Page</title>
</head>

<body>
  <h1>This is the index page.</h1>



</body>

</html>