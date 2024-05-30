<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respond to Meeting Invitation</title>
    <script>
        function sendResponse(meetingId, response) {
            fetch('submit-meeting-details.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ meetingId, response })
            })
            .then(response => response.json())
            .then(data => alert('Response recorded successfully!'))
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <h1>Respond to Meeting Invitation</h1>
    <!-- Example meeting ID and buttons for demonstration -->
    <button onclick="sendResponse(1, 'accept')">Accept</button>
    <button onclick="sendResponse(1, 'decline')">Decline</button>
</body>
</html>