<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Служба доставки еды</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Навигационная панель -->
    <?php include('navbar.php'); ?>

    <!-- Область уведомлений -->
    <div class="alert alert-info" role="alert">
        Добро пожаловать в нашу службу доставки еды!
    </div>

    <!-- Карусель -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/1.jpg" class="d-block w-100" alt="Food Delivery">
            </div>
            <div class="carousel-item">
                <img src="images/2.jpg" class="d-block w-100" alt="Food Delivery">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>

    <!-- Достоинства службы доставки -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="images/do.jpg" class="card-img-top" alt="Быстрая доставка">
                    <div class="card-body">
                        <h5 class="card-title">Быстрая доставка</h5>
                        <p class="card-text">Мы доставляем ваш заказ за рекордное время!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/3.jpg" class="card-img-top" alt="Качественная еда">
                    <div class="card-body">
                        <h5 class="card-title">Качественная еда</h5>
                        <p class="card-text">Мы используем только свежие и качественные ингредиенты.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/sale.jpg" class="card-img-top" alt="Скидки">
                    <div class="card-body">
                        <h5 class="card-title">Скидки и акции</h5>
                        <p class="card-text">Следите за акциями и получайте скидки на заказы.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Блок с меню -->
    <div class="container mt-5">
        <h2>Меню</h2>
        <div class="row">
            <!-- Пример блюда -->
            <div class="col-md-4">
                <div class="card">
                    <img src="images/dish1.jpg" class="card-img-top" alt="Блюдо 1">
                    <div class="card-body">
                        <h5 class="card-title">Блюдо 1</h5>
                        <p class="card-text">Описание блюда 1. Очень вкусное!</p>
                        <p><strong>Цена:</strong> 500 руб.</p>
                        <input type="number" class="form-control" value="1" min="1" id="dish1-quantity">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Блок с предприятиями -->
    <div class="container mt-5">
        <h2>Выберите предприятие</h2>
        <select class="form-select" id="restaurant-select">
            <option value="1">Сметана</option>
            <option value="2">Родник</option>
            <option value="2">Кафе "Академия"</option>
            <option value="2">Школа 1430</option>
            <option value="2">Брусника</option>
            <option value="2">Кафе Гогиели</option>
            <option value="2">Алло пицца</option>
            <option value="2">ГБОУ Школа 1452</option>
        </select>
    </div>

    <!-- Итоговая стоимость и кнопка "Оформить заказ" -->
    <div class="container mt-5">
        <h2>Итоговая стоимость</h2>
        <p id="total-price">1000 руб.</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Оформить заказ</button>
    </div>

    <!-- Модальное окно для оформления заказа -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Параметры заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <p>Ваш заказ: Блюдо 1, Количество: 1</p>
                    <p>Итоговая стоимость: 1000 руб.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Подтвердить заказ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Подключение JavaScript и Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
