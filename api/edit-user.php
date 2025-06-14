<?php
include '../config.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$id    = $data['id'] ?? '';
$name  = $data['name'] ?? '';
$email = $data['email'] ?? '';

if ($id && $name && $email) {
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => true, "message" => "User updated."]);
    } else {
        echo json_encode(["status" => false, "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => false, "message" => "ID, name, and email required."]);
}

