<!-- db_connect.php -->
<?php
$servername = "localhost";
$username = "root";  // имя пользователя для подключения к базе данных
$password = "";      // пароль (по умолчанию пустой)
$dbname = "veb";  // имя вашей базы данных

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
