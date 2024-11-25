<?php
// Part 4: Setting Up Our Response Method
function json_response($status_code, $data)
{
  // Set the HTTP status code
  http_response_code($status_code);

  // Set the content type to JSON
  header('Content-Type: application/json');

  // Encode the data as JSON
  $json_data = json_encode($data);

  // Set the Content-Length header
  header('Content-Length: ' . strlen($json_data));

  // Echo the JSON data
  echo $json_data;

  // Exit to prevent further processing
  exit();
}

//$uri = $_SERVER['REQUEST_URI'];
define('__BASE__', '/~vishalsingh/3430/labs/lab5/api/');

$req_uri = parse_url($_SERVER['REQUEST_URI']);


$req_path = str_replace(__BASE__, '', $req_uri['path']);

$req_method = $_SERVER['REQUEST_METHOD'];

if ($req_method === 'GET' && $req_path === 'contacts') {
  require_once '../includes/library.php';
  $pdo = connectdb();
  # Default query to select all contacts
  $query = "SELECT name, email, phoneType, phone, contactType FROM cois3430_lab_contacts";
  $stmt = $pdo->query($query);
  $all_contacts = $stmt->fetchAll();

  // Call the json_response function and pass the relevant data
  json_response(200, ['contacts' => $all_contacts]);
} else if ($req_method == 'PATCH' && $req_path === 'users') {

  if (isset($_SERVER['HTTP_X_API_KEY'])) {
    $api_key = $_SERVER['HTTP_X_API_KEY'];
  } // Validate API key presence
  else if (empty($api_key)) {
    $error = ['Error' => 'You must provide an API key'];
    json_response(400, $error);
  }
  parse_str(file_get_contents("php://input"), $req_data);

  $email = isset($req_data['email']) ? trim($req_data['email']) : '';

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = ['Error' => 'You must provide a valid email address'];
    json_response(400, $error);
  }
  try {
    // Create the $pdo object
    require_once '../includes/library.php';
    $pdo = connectdb();

    // Check if the API key is valid
    $stmt = $pdo->prepare("SELECT 1 FROM `cois3430_lab_users` WHERE `apikey` = ?");
    $stmt->execute([$api_key]);
    $api_key_valid = $stmt->fetchColumn();

    if (!$api_key_valid) {
      // Create error array
      $error = ['Error' => 'The provided apikey is invalid'];

      // Send JSON response with status 400
      json_response(400, $error);
    }
    if (empty($error)) {

      // Update the user's email
      $update_stmt = $pdo->prepare("UPDATE `cois3430_lab_users` SET `email` = ? WHERE `apikey` = ?");
      $update_stmt->execute([$email, $api_key]);
    }

    // Check if any row was actually updated
    if ($update_stmt->rowCount() > 0) {
      // Create success message
      $message = ['Message' => 'Update successful'];

      // Send JSON response with status 200
      json_response(200, $message);
    } else {
      // Create message for no changes
      $message = ['Message' => 'No changes were made'];

      // Send JSON response with status 200
      json_response(200, $message);
    }
  } catch (PDOException $e) {
    // Log the error message for debugging (optional)
    error_log($e->getMessage());

    // Handle database errors
    $error = ['Error' => 'Internal Server Error'];
    json_response(500, $error);
  }
} else {

  json_response(404, ['error' => 'We are unable to respond to this request']);
}
