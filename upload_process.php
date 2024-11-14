<?php
session_start();
require('db1.php');

// Check if user is logged in and is a teacher (implement your own authentication logic)
/*if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.php"); // If not logged in or not a teacher, redirect to login page
    exit();
}*/

// Define an empty variable to store error messages
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $course_id = $_POST['course_id'];
    $teacher_id = $_SESSION['user_id'];
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    
    // Specify upload directory
    $upload_dir = "uploads/";
    $file_path = $upload_dir . $file_name; 

    if (move_uploaded_file($file_tmp, $file_path)) {
        // Insert file details into database
        $upload_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO materials (course_id, teacher_id, file_name, file_path, upload_date) 
                VALUES ('$course_id', '$teacher_id', '$file_name', '$file_path', '$upload_date')";
        
        if (mysqli_query($conn, $sql)) {
            $success_msg = "File uploaded successfully.";
        } else {
            $error_msg = "Error inserting data into the database: " . mysqli_error($conn);
        }
    } else {
        $error_msg = "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Materials</title>
</head>
<body>
  <h2>Upload Materials</h2>
  <?php if (!empty($success_msg)) : ?>
    <div style="color: green;"><?php echo $success_msg; ?></div>
  <?php endif; ?>
  <?php if (!empty($error_msg)) : ?>
    <div style="color: red;"><?php echo $error_msg; ?></div>
  <?php endif; ?>
  <form method="POST" enctype="multipart/form-data">
    <label for="course">Select Course:</label>
    <select name="course_id" id="course" required>
      <!-- Fetch and display courses dynamically here -->
    </select><br><br>
    <input type="file" name="file" required><br><br>
    <button type="submit">Upload</button>
  </form>
</body>
</html>
