<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meeting Requests</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h2>Meeting Requests</h2>

<table id="meetingTable" border="1">
  <thead>
    <tr>
      <!-- <th>Meeting ID</th> -->
      <th>Title</th>
      <th>Date</th>
      <th>Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- Meeting requests will be inserted here -->
  </tbody>
</table>

<script>
$(document).ready(function(){
  // Fetch meeting requests from server and populate table
  $.get("fetch_meeting_requests.php", function(data){
    var meetings = JSON.parse(data);
    var tbody = $('#meetingTable tbody');
    meetings.forEach(function(meeting){
      var tr = $('<tr>');
      // tr.append('<td>' + meeting.id + '</td>');
      tr.append('<td>' + meeting.title + '</td>');
      tr.append('<td>' + meeting.date + '</td>');
      tr.append('<td>' + meeting.time + '</td>');
      var td = $('<td>');
      var acceptBtn = $('<button>').text('Accept').click(function(){
        updateResponse(meeting.id, 'accepted');
      });
      var rejectBtn = $('<button>').text('Reject').click(function(){
        updateResponse(meeting.id, 'rejected');
      });
      td.append(acceptBtn).append(rejectBtn);
      tr.append(td);
      tbody.append(tr);
    });
  });

  // Function to update response in database
  function updateResponse(id, response){
    $.ajax({
      url: 'update_response.php',
      type: 'POST',
      data: JSON.stringify({ id: id, response: response }),
      contentType: 'application/json',
      success: function(data){
        alert("your response is saved");
        location.reload();
        // Optionally, you can remove the row from the table upon successful response
        // $('#meetingTable tbody tr').remove(':contains("' + id + '")');
      },
      error: function(xhr, status, error){
        console.error(xhr.responseText);
      }
    });
  }
});
</script>

</body>
</html>
