<!-- admin.php -->
<?php
include('../includes/db_connect.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Навигационная панель -->
    <?php include('../navbar.php'); ?>

    <!-- Поиск заведений -->
    <div class="container mt-5">
        <form action="admin.php" method="GET">
            <div class="mb-3">
                <input type="text" class="form-control" name="search" placeholder="Поиск заведений" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Поиск</button>
        </form>
    </div>

    <!-- Таблица заведений -->
    <div class="container mt-5">
        <h2>Заведения</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Тип</th>
                    <th>Рейтинг</th>
                    <th>Адрес</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Поиск заведений
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $sql = "SELECT * FROM restaurants WHERE name LIKE '%$search%'";
                $result = $conn->query($sql);

                // Отображаем результаты
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['rating'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>
                                <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . $row['id'] . "'>Редактировать</button>
                                <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='" . $row['id'] . "'>Удалить</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Заведения не найдены</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php include('../footer.php'); ?>

    <!-- Модальные окна для редактирования и удаления -->

    <!-- Модальное окно для редактирования -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Редактирование заведения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form action="edit.php" method="POST">
                        <div class="mb-3">
                            <label for="restaurantName" class="form-label">Название</label>
                            <input type="text" class="form-control" id="restaurantName" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Рейтинг</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="0" max="5">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <input type="hidden" name="id" id="restaurantId">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно для удаления -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Удалить заведение</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить это заведение?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Удалить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Подключение JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript для обработки данных в модальных окнах -->
    <script>
        // Заполняем форму редактирования данными
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var restaurantId = button.getAttribute('data-id');

            fetch('get_restaurant.php?id=' + restaurantId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('restaurantName').value = data.name;
                    document.getElementById('rating').value = data.rating;
                    document.getElementById('address').value = data.address;
                    document.getElementById('restaurantId').value = data.id;
                });
        });

        // Подтверждение удаления
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var restaurantId = button.getAttribute('data-id');
            document.getElementById('confirmDelete').onclick = function () {
                window.location.href = 'delete.php?id=' + restaurantId;
            };
        });
    </script>
</body>
</html>
