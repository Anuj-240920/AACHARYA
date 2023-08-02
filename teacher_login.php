<?php

session_start();



include "includes/conn.php";



// Check if the teacher is already logged in

if(isset($_SESSION['id'])) {

    header("Location: teacher_dashboard.php");

    exit;

}

else {



if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate the login credentials

    $username = $_POST['username'];

    $password = $_POST['password'];



    // Prepare the SQL statement

    $query = "SELECT id FROM teacher WHERE username = ? AND password = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);



    // Check if the login was successful

    if(mysqli_stmt_num_rows($stmt) == 1) {

        mysqli_stmt_bind_result($stmt, $id);

        mysqli_stmt_fetch($stmt);

        

        // Store the teacher ID in the session

        $_SESSION['id'] = $id;



        header("Location: teacher_dashboard.php");

        exit;

    } else {

        $status = "Invalid login credentials.";

    }



    mysqli_stmt_close($stmt);

    mysqli_close($conn);

} }

?> 



<!DOCTYPE html>

<html>

<head>

    <title>Teacher Login</title>

    <link rel="stylesheet" href="teacher_login.css">



    

</head>

<body class="bg">

    <div class="dddd">

        <div class="sss">

        <h1>Login Here</h1>

        <form method="POST" action="">

            <label for="username">Username:</label>

            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>

            <input type="password" id="password" name="password" required><br>

            <div class="sbtn">



                <input type="submit" value="Log In"> <span><a href="index.html">Back to home</a></span>

            </div>
            <div style=" display: flex; background: white; color: red; justify-content: center"> <b> <?php echo $status;?></b> </div>
        </form>

        </div>

    </div>

     

</body>

</html>