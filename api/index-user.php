<?php
include '../config.php';

header('Content-Type: application/json');

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode(["status" => true, "data" => $users]);