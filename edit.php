// edit.php
<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $address = $_POST['address'];

    $sql = "UPDATE restaurants SET name = '$name', rating = '$rating', address = '$address' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
    } else {
        echo "Ошибка обновления записи: " . $conn->error;
    }
}
?>
