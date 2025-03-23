<?php
include('../db.php');

// Получаем данные о выбранном заведении
$restaurant_id = $_GET['restaurant_id'];
$sql = "SELECT * FROM restaurants WHERE id = '$restaurant_id'";
$result = mysqli_query($conn, $sql);
$restaurant = mysqli_fetch_assoc($result);

// Получаем меню заведения
$sql_menu = "SELECT * FROM menu WHERE restaurant_id = '$restaurant_id'";
$menu_result = mysqli_query($conn, $sql_menu);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Food Delivery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">Заказ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Оформление заказа в <?php echo $restaurant['name']; ?></h2>
        
        <h3>Меню</h3>
        <form action="process_order.php" method="POST">
            <?php
            if (mysqli_num_rows($menu_result) > 0) {
                while($menu_item = mysqli_fetch_assoc($menu_result)) {
                    echo '<div class="mb-3">';
                    echo '<label>' . $menu_item['name'] . ' - ' . $menu_item['price'] . '₽</label>';
                    echo '<input type="number" name="menu[' . $menu_item['id'] . ']" class="form-control" min="0" value="0">';
                    echo '</div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-success">Оформить заказ</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
