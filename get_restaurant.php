// get_restaurant.php
<?php
include('../includes/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM restaurants WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Заведение не найдено']);
    }
}
?>
