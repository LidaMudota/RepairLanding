<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['review'])) {
        $name = $_POST['name'];
        $review = $_POST['review'];
        $photo = '';

        // Убедитесь, что папка существует
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Обработка загрузки фото
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $photo = $target_file;
            } else {
                echo "Ошибка при загрузке файла.";
            }
        }

        // SQL-запрос для вставки данных
        $sql = "INSERT INTO reviews (name, review, photo) VALUES ('$name', '$review', '$photo')";

        if ($conn->query($sql) === TRUE) {
            echo "Ваш отзыв успешно отправлен!";
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