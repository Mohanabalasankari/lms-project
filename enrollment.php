<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
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

    .courses {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      grid-gap: 20px;
    }

    .course {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
      transition: transform 0.3s;
    }

    .course:hover {
      transform: translateY(-5px);
    }

    .course h3 {
      margin-top: 0;
      font-size: 18px;
      color: #333;
    }

    .course a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>My Enrolled Courses</h2>
    <div class="courses">
      <?php
      // Include the database configuration file
      require('db1.php');
      $mydb = new Database();

      // Check if the user is logged in and get the user ID
      // Replace this with your actual code to get the user ID after login
      $user_id = 2; // Example user ID, replace with actual user ID

      // Check if the database connection is successful
      if ($mydb && $mydb->conn) {
        // Database connection is successful
        $connection = $mydb->conn;

        // SQL query to retrieve enrolled courses for the current user
        $sql = "SELECT courses.course_id, courses.course_name
                FROM enrollments
                INNER JOIN courses ON enrollments.course_id = courses.course_id
                WHERE enrollments.user_id = {$user_id}";

        $result = $mydb->executeQuery($sql);

        if ($result) {
          // Display enrolled courses
          while ($row = $mydb->fetchAssoc($result)) {
            echo "<div class='course'>";
            echo "<a href='course_details.php?course_id={$row['course_id']}'>";
            echo "<h3>{$row['course_name']}</h3>";
            echo "</a>";
            echo "</div>";
          }
          $mydb->freeResult($result);
        } else {
          echo "Error: " . $mydb->getError();
        }

        // Close database connection (if needed)
        $mydb->close_connection();
      } else {
        // Database connection failed
        echo "Error: Unable to connect to the database.";
      }
      ?>
    </div>
  </div>
</body>
</html>
