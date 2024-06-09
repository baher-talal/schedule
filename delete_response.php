<?php
$host = 'localhost';
$dbname = 'nile_rcc_meetingdb';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$query = "DELETE FROM meetings WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);

$response = ['status' => 'success', 'message' => 'Meeting deleted successfully'];
echo json_encode($response);
