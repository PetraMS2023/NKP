<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name_ar = $_POST['brand_name_ar'];
    $brand_name_en = $_POST['brand_name_en'];
    $category_name_ar = $_POST['category_name_ar'];
    $category_name_en = $_POST['category_name_en'];
    $category_description_ar = $_POST['category_description_ar'];
    $category_description_en = $_POST['category_description_en'];
    
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["category_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["category_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
            echo "Directory created: " . $target_dir . "<br>";
        }

        if (move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["category_image"]["name"])). " has been uploaded.<br>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
            echo "Error details: " . $_FILES["category_image"]["error"] . "<br>";
        }
    }
    
    $sql = "INSERT INTO categories (brand_name_ar, brand_name_en, category_name_ar, category_name_en, category_description_ar, category_description_en, category_image)
    VALUES ('$brand_name_ar', '$brand_name_en', '$category_name_ar', '$category_name_en', '$category_description_ar', '$category_description_en', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../admin/pages/classification.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
