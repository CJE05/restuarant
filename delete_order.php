<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM orders WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully! <a href='view_orders.php'>Back</a>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>