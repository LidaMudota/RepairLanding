<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['model']) && isset($_POST['issue']) && isset($_POST['contact'])) {
        $model = $_POST['model'];
        $issue = $_POST['issue'];
        $contact = $_POST['contact'];

        // SQL-запрос для вставки данных
        $sql = "INSERT INTO bookings (model, issue, contact) VALUES ('$model', '$issue', '$contact')";

        if ($conn->query($sql) === TRUE) {
            echo "Вы успешно записались на ремонт!";
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