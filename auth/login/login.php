<?php
include '../../src/db.php';

header('Content-Type: application/json');

$identifier = $_POST['identifier'];
$password = $_POST['password'];

// Check if identifier is username or email
$sql = "SELECT * FROM users WHERE username='$identifier' OR email='$identifier'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  // Verify password
  if (password_verify($password, $user['password'])) {
    echo json_encode(["message" => "Login successful"]);
  } else {
    echo json_encode(["message" => "Invalid password"]);
  }
} else {
  echo json_encode(["message" => "Username or email not found"]);
}

$conn->close();
?>