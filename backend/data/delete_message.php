<?php
include '../db_connection.php';

$response = ['success' => false, 'error' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    
    $sql = "DELETE FROM messages WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    } else {
        $response['error'] = "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    $response['error'] = "Invalid request.";
}

echo json_encode($response);
?>
