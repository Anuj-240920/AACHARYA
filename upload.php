<?php
// Database connection
$servername = "sql110.infinityfree.com";
$username = "if0_34387152";
$password = "TSklVo1qO1q";
$dbname = "if0_34387152_signupdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data and image upload handling
if (isset($_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['age'], $_POST['fathar_name'], $_POST['email'], $_POST['aadhar_no'], $_POST['subject'], $_POST['degrees'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $fathar_name = $_POST['fathar_name'];
    $email = $_POST['email'];
    $aadhar_no = $_POST['aadhar_no'];
    $subject = $_POST['subject'];
    $degrees = $_POST['degrees'];
    //$image = $_FILES['image'];
    //$imageData = file_get_contents($image['tmp_name']);

    $stmt = $conn->prepare("INSERT INTO teacher (username, password, fname, lname, age, fathar_name, email, aadhar_no, subject, degrees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssss", $username, $password, $fname, $lname, $age, $fathar_name, $email, $aadhar_no, $subject, $degrees);
    $stmt->execute();

    // After successful data upload
    $message = "Data uploaded successfully.";
    header("Location: teacher_login.php");

    $stmt->close();
}

$conn->close();
?>