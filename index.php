<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إرسال دعوة الاجتماعات</title>
  <!-- Bootstrap CSS -->
  <style>
    body {
      direction: rtl;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        body: JSON.stringify({
          title,
          date,
          time
        })
      })
      .then(response => response.json())
      .then(data => {
        alert('تم إرسال الدعوة بنجاح')
        window.location.href = "response.php";
      })
      .catch(error => console.error('Error:', error));
  }
  </script>
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">إنشاء دعوة اجتماع</h1>
    <hr class="m-5">
    <form onsubmit="event.preventDefault(); sendInvitation();" class="row g-3">
      <div class="col-md-4">
        <label for="meetingTitle" class="form-label">الأسم:</label>
        <input type="text" id="meetingTitle" name="meetingTitle" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label for="meetingDate" class="form-label">التاريخ:</label>
        <input type="date" id="meetingDate" name="meetingDate" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label for="meetingTime" class="form-label">الوقت:</label>
        <input type="time" id="meetingTime" name="meetingTime" class="form-control" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary m-auto d-block">إرسال</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
