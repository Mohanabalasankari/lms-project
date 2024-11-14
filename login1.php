<?php
session_start();
require_once('db1.php'); // Assuming db1.php contains the Database class definition

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Create a new instance of the Database class
    $mydb = new Database();

    // Query the database for the user's role
    $query = "SELECT * FROM `users1` WHERE username='$username' AND password='$password'";
    $result = $mydb->executeQuery($query); // Using the Database class method

    if ($result->num_rows == 1) {
        $user = $mydb->fetchAssoc($result); // Using the Database class method
        $_SESSION['username'] = $username;
        
        // Redirect based on user role
        if ($user['role'] == 'student') {
            header("Location: student_dashboard.php");
            exit();
        } elseif ($user['role'] == 'teacher') {
            header("Location: teacher_dashboard.php");
            exit();
        }
    } else {
        echo "<script>alert('Incorrect username or password. Please try again.');</script>";
        //header("Location: index.html"); // Redirect to login page if login fails
        exit();
    }
} 
?>
