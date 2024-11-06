<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // استرجاع مسار الصورة من قاعدة البيانات
    $sql = "SELECT image_path FROM slider_images WHERE id = $id";
    $result = $conn->query($sql);
    $image_path = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];
    }

   
    if (!empty($image_path) && file_exists($image_path)) {
        unlink($image_path);
    }


    $sql = "DELETE FROM slider_images WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../admin/pages/setting.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
