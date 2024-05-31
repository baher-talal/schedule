<?php
$host = 'localhost'; // or your host
$dbname = 'MeetingDB';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = json_decode(file_get_contents('php://input'), true);

$title = $data['title'];
$date = $data['date'];
$time = $data['time'];

$query = "INSERT INTO Meetings (title, date, time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$title, $date, $time]);

$response = ['status' => 'success', 'message' => 'Meeting invitation sent successfully'];
echo json_encode($response);
?>