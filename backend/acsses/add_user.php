<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إدخال المستخدم الجديد في قاعدة البيانات
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        echo "تم إضافة المستخدم بنجاح";
    } else {
        echo "حدث خطأ أثناء إضافة المستخدم: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مستخدم جديد</title>
    <style>
        .form {
            width: 300px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
        }
        .input {
            margin-bottom: 15px;
        }
        .input span {
            display: block;
            margin-bottom: 5px;
        }
        .input input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="" method="POST" class="form">
    <div class="input">
        <span>البريد الالكتروني :</span>
        <input type="text" name="email" spellcheck="false" placeholder="البريد الالكتروني" required>
    </div>
    <div class="input">
        <span>كلمة المرور :</span>
        <input type="password" name="password" placeholder="كلمة المرور" required>
    </div>
    <button type="submit">إضافة المستخدم</button>
</form>

</body>
</html>
