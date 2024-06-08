<?php
$host = 'localhost';
$dbname = 'MeetingDB2';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->query("SELECT meetings.*
FROM meetings
LEFT JOIN responses
 ON meetings.id = responses.meeting_id
WHERE responses.meeting_id IS NULL;
");
$meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($meetings);
?>