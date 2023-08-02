<?php
// Database connection details
$servername = "sql110.infinityfree.com";
$username = "if0_34387152";
$password = "TSklVo1qO1q";
$dbname = "if0_34387152_signupdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo'<script>
alert("form submitted successfully")
window.location.replace("httpS://aacharya.ermks.in/contact.html");
</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
