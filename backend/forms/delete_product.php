<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // استعلام لحذف المنتج بناءً على المعرف
    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../admin/pages/product.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
