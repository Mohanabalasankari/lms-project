<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-top: 0;
      font-size: 24px;
      color: #333;
      text-align: center;
    }

    .section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .section h3 {
      margin: 0;
      font-size: 20px;
      color: #555;
    }

    .section p {
      margin-top: 5px;
      color: #777;
    }

    .section a {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }

    .section a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Include the database configuration file
    require('db1.php');
    $mydb = new Database();

    // Check if the course_id parameter is set in the URL
    if (isset($_GET['course_id'])) {
        // Sanitize the input to prevent SQL injection
        $course_id = mysqli_real_escape_string($mydb->conn, $_GET['course_id']);
        
        // Query to retrieve course details
        $sql = "SELECT * FROM courses WHERE course_id = $course_id";
        
        // Execute the query
        $result = $mydb->executeQuery($sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            // Course details found
            $course = $mydb->fetchAssoc($result);
            // Output the course details
            echo "<h2>{$course['course_name']}</h2>";
           

            // Materials Section
            echo "<div class='section'>";
            echo "<h3>Materials</h3>";
            echo "<p>Access study materials for this course.</p>";
            echo "<a href='materials.php'>View Materials</a>";
            echo "</div>";

            // Quiz/Assignment Section
            echo "<div class='section'>";
            echo "<h3>Quiz/Assignment</h3>";
            echo "<p>Take quizzes and assignments for this course.</p>";
            echo "<a href='#'>Take Quiz/Assignment</a>";
            echo "</div>";
        } else {
            // Course not found
            echo "<h2>Course Not Found</h2>";
        }
        
        // Free result set
        $mydb->freeResult($result);
    } else {
        // course_id parameter not set
        echo "<h2>Error: Course ID Not Provided</h2>";
    }

    // Close database connection
    $mydb->close_connection();
    ?>
  </div>
</body>
</html>
