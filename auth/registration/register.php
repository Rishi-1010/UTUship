<?php
include '../src/db.php';

header('Content-Type: application/json');

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$profile_picture = $_FILES['profile_picture'];

// Check if username is unique
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo json_encode(["message" => "Username already exists."]);
  $conn->close();
  exit();
}

// Handle file upload
$target_dir = "../uploads/";
$target_file = $target_dir . basename($profile_picture["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($profile_picture["tmp_name"]);
if($check !== false) {
  if (move_uploaded_file($profile_picture["tmp_name"], $target_file)) {
    $profile_picture_url = "uploads/" . basename($profile_picture["name"]);
    $sql = "INSERT INTO users (name, username, email, password, profile_picture) VALUES ('$name', '$username', '$email', '$password', '$profile_picture_url')";

    if ($conn->query($sql) === TRUE) {
      echo json_encode(["message" => "User registered successfully"]);
    } else {
      echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
  } else {
    echo json_encode(["message" => "Sorry, there was an error uploading your file."]);
  }
} else {
  echo json_encode(["message" => "File is not an image."]);
}

$conn->close();
?>