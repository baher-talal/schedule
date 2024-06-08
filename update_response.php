<?php
$host = 'localhost';
$dbname = 'meetingdb';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$response = $data['response'];

$query = "INSERT INTO responses (meeting_id, response) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$id, $response]);

$response = ['status' => 'success', 'message' => 'Response recorded successfully'];
echo json_encode($response);
?>
