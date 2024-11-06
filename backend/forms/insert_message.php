<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   
    $sql = "INSERT INTO messages (full_name, email, message) VALUES ('$full_name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        
        header("Location: ../../pages/contact.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
