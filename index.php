<?php
include 'db_connect.php';
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
        <h1>Ремонт тракторов: [Название компании]</h1>
        <p>Профессиональный ремонт тракторов всех марок. Гарантия качества.</p>
        <nav>
            <ul>
                <li><a href="#services">Наши услуги</a></li>
                <li><a href="#contacts">Контакты</a></li>
                <li><a href="#reviews">Отзывы</a></li>
                <li><a href="#gallery">Галерея</a></li>
                <li><a href="#booking">Онлайн-запись</a></li>
            </ul>
        </nav>
    </header>

    <section id="services">
        <h2>Наши услуги</h2>
        <ul>
            <li>Капитальный ремонт двигателя</li>
            <li>Ремонт трансмиссии</li>
            <li>Ремонт гидравлики</li>
            <li>Электронная диагностика</li>
            <li>Ремонт ходовой части</li>
            <li>Замена деталей</li>
            <li>Ремонт навесного оборудования</li>
            <li>Замена сцепления</li>
        </ul>
        <p>Мы предлагаем высококачественные услуги по ремонту тракторов всех марок. Наши преимущества включают опыт, надежность и гарантию на выполненные работы.</p>
        <a href="files/pricelist.pdf" download>Скачать прайс-лист</a>
    </section>

    <section id="booking">
        <h2>Онлайн-запись на ремонт</h2>
        <form action="submit_booking.php" method="post">
            <label for="model">Модель трактора:</label>
            <input type="text" id="model" name="model" required>
            <label for="issue">Тип проблемы:</label>
            <input type="text" id="issue" name="issue" required>
            <label for="contact">Контактные данные:</label>
            <input type="text" id="contact" name="contact" required>
            <button type="submit">Записаться</button>
        </form>
    </section>

    <section id="video">
    <h2>Видео о нашем сервисе</h2>
    <video width="100%" controls>
        <source src="video/tractor_repair.mp4" type="video/mp4">
        Ваш браузер не поддерживает HTML5 видео.
    </video>
</section>

<section id="gallery" class="gallery">
        <h2>Галерея</h2>
        <div class="gallery-item">
            <img src="images/1.png" alt="Отремонтированный трактор 1">
        </div>
        <div class="gallery-item">
            <img src="images/2.png" alt="Отремонтированный трактор 2">
        </div>
        <div class="gallery-item">
            <img src="images/3.png" alt="Отремонтированный трактор 3">
        </div>
    </section>

    <section id="reviews">
    <h2>Отзывы</h2>
    <?php
    // Извлекаем отзывы из базы данных
    $sql = "SELECT name, review, photo, reg_date FROM reviews ORDER BY reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Выводим каждый отзыв
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<p>" . htmlspecialchars($row["review"]) . "</p>";
            echo "<p>— " . htmlspecialchars($row["name"]) . " (" . $row["reg_date"] . ")</p>";
            if ($row["photo"]) {
                echo "<img src='" . htmlspecialchars($row["photo"]) . "' alt='Фото отзыва' style='max-width: 200px;'>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>Пока что нет отзывов.</p>";
    }
    ?>

    <form action="submit_review.php" method="post" enctype="multipart/form-data">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <label for="review">Ваш отзыв:</label>
        <textarea id="review" name="review" required></textarea>
        <label for="photo">Загрузить фото:</label>
        <input type="file" id="photo" name="photo">
        <button type="submit">Отправить отзыв</button>
    </form>
</section>

    <section id="contacts">
    <h2>Контакты</h2>
    <p>Адрес: ул. Примерная, дом 123, г. Москва</p>
    <p>Телефон: +7 (123) 456-78-90</p>
    <p>Email: info@company.com</p>
    <div id="map" style="height: 400px; width: 100%;"></div>
    <form action="submit_form.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" required></textarea>
        <button type="submit">Отправить</button>
    </form>
</section>

<!-- Подключаем Leaflet.js и стили -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    var map = L.map('map').setView([55.7558, 37.6173], 15); // Координаты Москвы

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([55.7558, 37.6173]).addTo(map)
        .bindPopup('АгроТехСервис')
        .openPopup();
</script>

</body>
</html>

<?php
$conn->close();
?>