<?php
$host = 'localhost';
$db_user = 'root'; 
$db_pass = '';     
$db_name = 'royal_barber';

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Помилка підключення до БД: " . $conn->connect_error);
}
?>