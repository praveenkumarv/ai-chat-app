<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $conn->prepare("INSERT INTO messages (user_message, ai_response) VALUES (?, ?)");
$stmt->bind_param("ss", $data['user'], $data['ai']);
$stmt->execute();

echo "saved";