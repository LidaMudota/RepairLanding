<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tractor_repair";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
