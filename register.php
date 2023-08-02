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

// Registration form handling
if (isset($_POST['collegeId'], $_POST['username'], $_POST['password'], $_POST['collegename'], $_POST['collegeaddress'], $_POST['city'], $_POST['state'], $_POST['email'], $_POST['mobile'])) {
    $collegeId = $_POST['collegeId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $collegename = $_POST['collegename'];
    $collegeaddress = $_POST['collegeaddress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $stmt = $conn->prepare("INSERT INTO college_data (collegeId, username, password, collegename, collegeaddress, city, state, email, mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $collegeId, $username, $password, $collegename, $collegeaddress, $city, $state, $email, $mobile);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<h1 style="text-align:center"> Registration successful.</h1>
            <h2 style="text-align:center">You will be redirect to login page....</h2>
            <h2 style="text-align:center">if you not automatic redirect in 5 seconds <a href="college/teacher_login.php">click here</a></h2>';
            echo " <script>
            setTimeout(function() {
  window.location.href = 'https://aacharya.ermks.in/college/teacher_login.php';  }, 5000);
  </script>
";
    } else {
         echo '<h1 style="text-align:center">Failed to register your institution..</h1>
            <h2 style="text-align:center">You will be redirect to homepage....</h2>
            <h2 style="text-align:center">if you not automatic redirect in 5 seconds <a href="index.html">click here</a></h2>';
            echo "<script>
            setTimeout(function() {
  window.location.href = 'https://aacharya.ermks.in';  }, 5000);
  </script>
";
    }

    $stmt->close();
}

$conn->close();
?>