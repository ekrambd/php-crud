<?php
include '../config.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? '';

if ($id) {
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => true, "message" => "User deleted."]);
    } else {
        echo json_encode(["status" => false, "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => false, "message" => "ID is required."]);
}
