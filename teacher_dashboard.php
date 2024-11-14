<!-- teacher_dashboard.php -->

<?php
// Add database connection and session start here if not already included
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Dashboard</title>
  <style>
    .container {
  display: flex;
}

.dashboard-menu {
  width: fit-content;
  padding: 20px;
  background-color: #f0f0f0;
}

.dashboard-content {
  flex: 1;
  padding: 20px;
}
</style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="dashboard-menu">
      <h2>Welcome, Teacher Name</h2>
      <ul>
        <li><a href="#">Profile</a></li>
        <li><a href="upload_material.php">Upload Materials</a></li>
        <li><a href="#">Create Quiz</a></li>
        <!-- Add more links as needed -->
      </ul>
    </div>
    <div class="dashboard-content">
      <!-- Content will be displayed here -->
    </div>
  </div>

  <!-- JavaScript code for dynamic form fields (if any) can be included here -->
</body>
</html>
