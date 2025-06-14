<?php
include '../config.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$name  = $data['name'] ?? '';
$email = $data['email'] ?? '';

if ($name && $email) {
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => true, "message" => "User created."]);
    } else {
        echo json_encode(["status" => false, "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => false, "message" => "Name and email required."]);
}