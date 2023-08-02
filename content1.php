<?php


// Database connection parameters

include 'includes/conn.php';


$conn = new mysqli($servername, $username, $password, $dbname);





// Check connection


if ($conn->connect_error) {


    die("Connection failed: " . $conn->connect_error);


}





// Function to sanitize input


function sanitizeInput($input) {


    return htmlspecialchars(stripslashes(trim($input)));


}





// Check if form is submitted


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // Get form data and sanitize inputs


    $username = sanitizeInput($_POST["username"]);


    $password = sanitizeInput($_POST["password"]);


    $fname = sanitizeInput($_POST["fname"]);


    $lname = sanitizeInput($_POST["lname"]);


    $age = sanitizeInput($_POST["age"]);


    $fathar_name = sanitizeInput($_POST["fathar_name"]);


    $email = sanitizeInput($_POST["email"]);


    $aadhar_no = sanitizeInput($_POST["aadhar_no"]);


    $subject = sanitizeInput($_POST["subject"]);


    $degrees = sanitizeInput($_POST["degrees"]);





    // Update teacher information in the database


    $sql = "UPDATE teacher SET


            password = '$password',


            fname = '$fname',


            lname = '$lname',


            age = '$age',


            fathar_name = '$fathar_name',


            email = '$email',


            aadhar_no = '$aadhar_no',


            subject = '$subject',


            degrees = '$degrees'


            WHERE username = '$username'";





    if ($conn->query($sql) === TRUE) {


        echo "Teacher information updated successfully.";


    } else {


        echo "Error updating teacher information: " . $conn->error;


    }


}





// Retrieve the teacher's information from the database using the session id


session_start();


if (isset($_SESSION["id"])) {


    $id = $_SESSION["id"];


    $sql = "SELECT * FROM teacher WHERE id = '$id'";


    $result = $conn->query($sql);





    // Check if the query was successful and at least one row was returned


    if ($result && $result->num_rows > 0) {


        $row = $result->fetch_assoc();





        // Display the form with the retrieved teacher's information


        ?>


        <!DOCTYPE html>


        <html>


        <head>


            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


        </head>


        <body>


            <div style="justify-content: center; color: orange;">


            <h1>Your Detail</h1>


                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">


                <div class="form-group">


                    <label for="username">Username:</label>


                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="password">Password:</label>


                    <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="email">Email:</label>


                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="fname">First Name:</label>


                    <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="lname">Last Name:</label>


                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="age">Age:</label>


                    <input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="subject">Subject:</label>


                    <input type="text" class="form-control" name="subject" value="<?php echo $row['subject']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="degree">Degree:</label>


                    <input type="text" class="form-control" name="degrees" value="<?php echo $row['degrees']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="fathar_name">Father's Name:</label>


                    <input type="text" class="form-control" name="fathar_name" value="<?php echo $row['fathar_name']; ?>" required>


                </div>





                <div class="form-group">


                    <label for="aadhar_no">Aadhar Number:</label>


                    <input type="text" class="form-control" name="aadhar_no" value="<?php echo $row['aadhar_no']; ?>" required>


                </div>





                <input type="submit" class="btn btn-primary" value="Update Information">


                </form>


            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        </body>


        </html>


        <?php


    } else {


        echo "Error: Teacher not found.";


    }


} else {


    echo "Error: Teacher session not found.";


}





// Close the database connection


$conn->close();


?>