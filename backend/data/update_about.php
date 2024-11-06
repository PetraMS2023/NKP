<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_text_ar = $_POST['about_text_ar'];
    $about_text_en = $_POST['about_text_en'];

  
    $sql = "SELECT * FROM about_us WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $sql = "UPDATE about_us SET about_text_ar = '$about_text_ar', about_text_en = '$about_text_en' WHERE id = 1";
    } else {
        
        $sql = "INSERT INTO about_us (id, about_text_ar, about_text_en) VALUES (1, '$about_text_ar', '$about_text_en')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../../admin/pages/about-us.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
