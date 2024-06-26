<?php
$host = 'localhost';
$dbname = 'nile_rcc_meetingdb';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->query("SELECT meetings.*, responses.response AS responseStatus
                     FROM meetings
                     LEFT JOIN responses ON meetings.id = responses.meeting_id");
$responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($responses);
