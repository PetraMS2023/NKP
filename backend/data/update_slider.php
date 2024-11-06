<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../../uploads/";
    $uploaded_files = [];

   
    foreach ($_FILES['slider_images']['tmp_name'] as $key => $tmp_name) {
        $target_file = $target_dir . basename($_FILES['slider_images']['name'][$key]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($tmp_name, $target_file)) {
            $uploaded_files[] = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // إدخال مسارات الصور الجديدة في قاعدة البيانات
    foreach ($uploaded_files as $file) {
        $sql = "INSERT INTO slider_images (image_path) VALUES ('$file')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    header("Location: ../../admin/pages/setting.php");
    exit();
}
?>
