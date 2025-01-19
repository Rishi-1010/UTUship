<?php
include 'db.php';

$name = $_POST['name'];
$profile_picture = $_POST['profile_picture'];

$sql = "INSERT INTO users (name, profile_picture) VALUES ('$name', '$profile_picture')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["message" => "User registered successfully"]);
} else {
  echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>