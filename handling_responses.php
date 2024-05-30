<?php
$host = 'localhost'; // or your host
$dbname = 'MeetingDB';
$username = 'your_username';
$password = 'your_password';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

$meetingId = $data['meetingId'];
$response = $data['response'];

$query = "INSERT INTO Responses (meeting_id, response) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$meetingId, $response]);

$response = ['status' => 'success', 'message' => 'Response recorded successfully'];
echo json_encode($response);
?>