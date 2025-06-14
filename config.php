<?php
$host = "127.0.0.1";
$user = "crudBD";
$pass = "crudBD28!";
$db   = "php_crud";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die(json_encode(["status" => false, "message" => "Connection failed."]));
}
?>
