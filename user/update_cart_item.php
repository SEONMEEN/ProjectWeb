<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
$orderItemsID = $data['orderItemsID'];
$change = $data['change'];

$conn = new mysqli('localhost', 'root', '12345678', 'mydb');
$sql = "UPDATE orderitems SET quantity = quantity + ? WHERE orderItemsID = ? AND quantity + ? >= 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $change, $orderItemsID, $change);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
}
?>
