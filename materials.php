<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Materials</title>
</head>
<body>
  <h2>Course Materials</h2>
  <ul>
    <?php
    session_start();
    require('db1.php');

    // Retrieve course materials from database based on course ID
    $course_id = $_GET['course_id']; // Get course ID from URL parameter

    $sql = "SELECT * FROM materials WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='{$row['file_path']}' download>{$row['file_name']}</a></li>";
        }
    } else {
        echo "No materials available for this course.";
    }
    ?>
  </ul>
</body>
</html>
