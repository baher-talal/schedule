<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>طلبات الاجتماعات</title>
  <!-- Link Bootstrap CSS -->
  <style>
  body {
    direction: rtl;
  }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center">طلبات الاجتماعات</h2>
    <hr class="m-5">

    <audio id="alertSound">
      <source src="notification_sound.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>

    <div class="container">
      <table id="meetingTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <!-- <th>Meeting ID</th> -->
            <th class="text-center">الأسم</th>
            <th class="text-center">نبذة</th>
            <th class="text-center">التاريخ</th>
            <th class="text-center">الوقت</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Meeting requests will be inserted here -->
        </tbody>
      </table>
    </div>
  </div>


  <script>
  $(document).ready(function() {
    function fetchMeetingRequests() {
      $.get("fetch_meeting_requests.php", function(data) {
        var meetings = JSON.parse(data);
        meetings.forEach(function(meeting) {
          if ($('#meetingTable tbody tr[data-id="' + meeting.id + '"]').length === 0) {
            var tr = $('<tr>').attr('data-id', meeting.id);
            tr.append('<td class="text-center">' + meeting.title + '</td>');
            tr.append('<td class="text-center">' + meeting.note + '</td>');
            tr.append('<td class="text-center">' + meeting.date + '</td>');
            tr.append('<td class="text-center">' + meeting.time + '</td>');
            var td = $('<td class="text-center">');
            var acceptBtn = $('<button>').addClass('btn btn-success mx-3').text('قبول').click(function() {
              updateResponse(meeting.id, 'accepted');
            });
            var rejectBtn = $('<button>').addClass('btn btn-danger mx-3').text('رفض').click(function() {
              updateResponse(meeting.id, 'rejected');
            });
            td.append(acceptBtn).append(rejectBtn);
            tr.append(td);
            $('#meetingTable tbody').append(tr);

            // Play alert sound when a new meeting is added
            playAlertSound();
          }
        });
      });
    }

    fetchMeetingRequests();
    setInterval(fetchMeetingRequests, 1000);

    function updateResponse(id, response) {
      $.ajax({
        url: 'update_response.php',
        type: 'POST',
        data: JSON.stringify({
          id: id,
          response: response
        }),
        contentType: 'application/json',
        success: function(data) {
          alert("تم الحفظ");
          location.reload();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    function playAlertSound() {
      var audio = document.getElementById("alertSound");
      audio.play();
    }
  });
  </script>

</body>

</html>