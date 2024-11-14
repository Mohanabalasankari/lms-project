<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Enrollment</title>
  <style>
    /* styles.css */

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h2 {
  text-align: center;
}

.dashboard-menu ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.dashboard-menu ul li {
  display: inline;
  margin-right: 20px;
}

.dashboard-menu ul li a {
  text-decoration: none;
  color: #333;
}

.dashboard-content {
  margin-top: 20px;
}

.dashboard-content h3 {
  margin-bottom: 10px;
}

.dashboard-content ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.dashboard-content ul li {
  margin-bottom: 10px;
}

.dashboard-content ul li a {
  text-decoration: none;
  color: #007bff;
}

.dashboard-content ul li a:hover {
  text-decoration: underline;
}
</style>

</head>
<body>
  <div class="container">
    <h2>Course Enrollment</h2>
    <div class="dashboard-menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <!-- Add more links as needed -->
      </ul>
    </div>
    <div class="dashboard-content">
      <h3>Available Courses</h3>
      <ul>
        <li>Course 1 <a href="enroll.php?course_id=1">Enroll Now</a></li>
        <li>Course 2 <a href="enroll.php?course_id=2">Enroll Now</a></li>
        <!-- Add more courses dynamically -->
      </ul>
    </div>
  </div>
</body>
</html>
