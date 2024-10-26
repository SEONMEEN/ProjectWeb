<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
$orderItemsID = $data['orderItemsID'];

$conn = new mysqli('localhost', 'root', '12345678', 'mydb');
$sql = "DELETE FROM orderitems WHERE orderItemsID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderItemsID);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete item']);
}
?>
