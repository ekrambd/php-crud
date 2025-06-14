<?php
//ec2 database
$host = "localhost";
$user = "crudBD";
$pass = "crudBD28!";
$dbname = "php_crud";

// Step 1: Connect to MySQL server
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create Database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
        $tables = [

        "users" => "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        
        "subjects" => "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            subject_name VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",

    ];

    foreach ($tables as $name => $query) {
    if (mysqli_query($conn, $query)) {
        echo "Table '$name' created successfully.<br>";
    } else {
        echo "Error creating '$name': " . mysqli_error($conn) . "<br>";
    }
}
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Step 3: Select the database
mysqli_select_db($conn, $dbname);

// Step 4: Create Tables





// Step 5: Close connection
mysqli_close($conn);
?>
