<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location_ar = $_POST['location_ar'];
    $location_en = $_POST['location_en'];


    $sql = "SELECT * FROM company_contact WHERE id = 1"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $sql = "UPDATE company_contact SET email = '$email', phone = '$phone', location_ar = '$location_ar', location_en = '$location_en' WHERE id = 1";
    } else {
    
        $sql = "INSERT INTO company_contact (id, email, phone, location_ar, location_en) VALUES (1, '$email', '$phone', '$location_ar', '$location_en')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../../admin/pages/contact-info.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
