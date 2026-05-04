<?php
require 'db.php';

$result = $conn->query("SELECT * FROM messages ORDER BY id ASC");

$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);