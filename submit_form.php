<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что все поля формы существуют и не пусты
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // SQL-запрос для вставки данных
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Сообщение успешно отправлено!";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Пожалуйста, заполните все поля формы.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ремонт тракторов: [Название компании]</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <a href="index.php">Назад</a>
    </header>
    </body>
</html>