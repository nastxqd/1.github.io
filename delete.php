// delete.php
<?php
include('../includes/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM restaurants WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
    } else {
        echo "Ошибка удаления записи: " . $conn->error;
    }
}
?>
