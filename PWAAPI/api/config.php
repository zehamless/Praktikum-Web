<?php
$host = 'localhost';
$dbname = 'apilog';
$username = 'root';
$password = '';

$conn = new PDO(
    "mysql:host=$host;dbname=$dbname",
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => false)
);