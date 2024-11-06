<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name_ar = $_POST['product_name_ar'];
    $product_name_en = $_POST['product_name_en'];
    $product_specs = $_POST['product_specs'];
    $main_category_id = intval($_POST['main_category_id']);
    $subcategory_id = intval($_POST['subcategory_id']);
    
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (!empty($_FILES["product_image"]["tmp_name"])) {
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
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

            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["product_image"]["name"])). " has been uploaded.<br>";
                $image_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
                echo "Error details: " . $_FILES["product_image"]["error"] . "<br>";
            }
        }
    } else {
        $image_path = "";
    }
    
    $sql = "INSERT INTO products (product_name_ar, product_name_en, product_specs, main_category_id, subcategory_id, product_image)
    VALUES ('$product_name_ar', '$product_name_en', '$product_specs', $main_category_id, $subcategory_id, '$image_path')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../admin/pages/product.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
