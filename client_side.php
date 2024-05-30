<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Meeting Invitation</title>
    <script>
        function sendInvitation() {
            const title = document.getElementById('meetingTitle').value;
            const date = document.getElementById('meetingDate').value;
            const time = document.getElementById('meetingTime').value;

            fetch('send-meeting-invitation.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ title, date, time })
            })
            .then(response => response.json())
            .then(data => alert('Invitation sent successfully!'))
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <h1>Create Meeting Invitation</h1>
    <form onsubmit="event.preventDefault(); sendInvitation();">
        <label for="meetingTitle">Meeting Title:</label>
        <input type="text" id="meetingTitle" name="meetingTitle"><br><br>
        
        <label for="meetingDate">Meeting Date:</label>
        <input type="date" id="meetingDate" name="meetingDate"><br><br>
        
        <label for="meetingTime">Meeting Time:</label>
        <input type="time" id="meetingTime" name="meetingTime"><br><br>
        
        <input type="submit" value="Send Invitation">
    </form>
</body>
</html>