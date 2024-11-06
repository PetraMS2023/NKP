<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $sql = "DELETE FROM subcategories WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../admin/pages/sub-classification.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
