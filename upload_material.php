<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Material</title>
</head>
<body>
  <h2>Upload Material</h2>
  <form action="upload_process.php" method="post" enctype="multipart/form-data">
    <label for="course_id">Course ID:</label>
    <input type="text" id="course_id" name="course_id"><br><br>
    <label for="file">Select File:</label>
    <input type="file" id="file" name="file"><br><br>
    <input type="submit" name="submit" value="Upload">
  </form>
</body>
</html>
