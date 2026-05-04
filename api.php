<?php
require 'config.php';
require 'db.php';

$input = json_decode(file_get_contents("php://input"), true);
$userMessage = $input['message'] ?? '';

// 🔹 Fetch last 5 messages (memory window)
$result = $conn->query("SELECT * FROM messages ORDER BY id DESC LIMIT 5");

$messages = [];

// Convert DB history → AI format
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        "role" => "user",
        "content" => $row['user_message']
    ];
    $messages[] = [
        "role" => "assistant",
        "content" => $row['ai_response']
    ];
}

// Reverse to maintain correct order
$messages = array_reverse($messages);

// Add current message
$messages[] = [
    "role" => "user",
    "content" => $userMessage
];

$url = "https://api.groq.com/openai/v1/chat/completions";

$data = [
    "model" => "llama-3.1-8b-instant",
    "messages" => $messages
];

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . GROQ_API_KEY,
        "Content-Type: application/json"
    ]
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["reply" => "Curl Error: " . curl_error($ch)]);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

$output = $result['choices'][0]['message']['content']
    ?? ($result['error']['message'] ?? "No response");

echo json_encode(["reply" => $output]);