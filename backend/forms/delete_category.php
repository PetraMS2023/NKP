<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $sql = "DELETE FROM categories WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
       
        header("Location: ../../admin/pages/classification.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
