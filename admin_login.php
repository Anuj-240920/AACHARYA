<?php

// Start the session

session_start();

if (isset($_SESSION['loggedin'])) {

    // Redirect the user to the login page or show a message

    header('Location: admin1_dashboard.php'); // Redirect to the dashboard page

    exit();

}
else {

    if($_SERVER["REQUEST_METHOD"]== "POST") {

        include 'includes/conn.php';
    
        $user = $_POST["admin"];
    
        $pwd = $_POST["password"];
    
        $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pwd'";
    
        $result = mysqli_query($conn, $query);
    
        
    
        if (mysqli_num_rows($result) > 0) {
    
            // Successful login
    
            header("Location: admin1_dashboard.php");
    
    
            
    
                // Set session variables
    
                $_SESSION['username'] = $user;
    
                $_SESSION['loggedin'] = true;
    
            
    
                // Redirect the user to a protected page
    
    
                exit();
    
             
    
            
    
        } 
    
        else {
    
    
    
           $adstate = 'Invalid admin Credential';
    
        }
        mysqli_close($conn);
    }
}


// Check if the user is not logged in


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="college/admin_login.css">

</head>

<body class="bg">

    <div class="dddd">

    <div class="sss">

        <h1 class="logocard"> <a href="index.html"> <svg  width="306.79999999999995" height="75.69771640216716"

                viewBox="0 0 369.66666666666674 93.32330997214308" class="css-1j8o68f">

                <defs id="SvgjsDefs1846"></defs>

                <g id="SvgjsG1847" featurekey="rZF8Vg-0"

                    transform="matrix(1.581916915025462,0,0,1.581916915025462,-3.9547885159798235,-3.9547794641786282)"

                    fill="#0081c6">

                    <title xmlns="http://www.w3.org/2000/svg">1</title>

                    <path xmlns="http://www.w3.org/2000/svg"

                        d="M32,16.5H56.24a1.49861,1.49861,0,0,1,1.3.75,29.56871,29.56871,0,0,1,3.03,7.37,1.57067,1.57067,0,0,1-.26005,1.3,1.5914,1.5914,0,0,1-1.19.58H32A5.50968,5.50968,0,0,0,26.5,32,1.498,1.498,0,0,1,25,33.5H18A1.498,1.498,0,0,1,16.5,32,15.51337,15.51337,0,0,1,32,16.5Z">

                    </path>

                    <path xmlns="http://www.w3.org/2000/svg"

                        d="M32,47.5H7.76a1.49874,1.49874,0,0,1-1.3-.75,29.57057,29.57057,0,0,1-3.03-7.37,1.47647,1.47647,0,0,1,.12-1.06,1.51388,1.51388,0,0,1,1.33-.82H32A5.50972,5.50972,0,0,0,37.5,32,1.498,1.498,0,0,1,39,30.5h7A1.498,1.498,0,0,1,47.5,32,15.51337,15.51337,0,0,1,32,47.5Z">

                    </path>

                    <path xmlns="http://www.w3.org/2000/svg"

                        d="M4,33.5A1.498,1.498,0,0,1,2.5,32,29.48784,29.48784,0,0,1,51.49,9.87,1.54256,1.54256,0,0,1,52,11.13a1.51761,1.51761,0,0,1-1.5,1.37H32A19.52509,19.52509,0,0,0,12.5,32,1.498,1.498,0,0,1,11,33.5Z">

                    </path>

                    <path xmlns="http://www.w3.org/2000/svg"

                        d="M61.5,32c.07664,25.20862-30.16446,38.86111-48.99012,22.12964A1.50835,1.50835,0,0,1,12.31,52.09a1.49265,1.49265,0,0,1,1.19-.59H32A19.52509,19.52509,0,0,0,51.5,32,1.498,1.498,0,0,1,53,30.5h7A1.498,1.498,0,0,1,61.5,32Z">

                    </path>

                </g>

                <g id="SvgjsG1848" featurekey="6VBqdG-0"

                    transform="matrix(2.2685759710019155,0,0,2.2685759710019155,112.09256831350964,7.8422567720097245)"

                    fill="#48466d">

                    <path

                        d="M12.46 20 l-1.28 -2.96 l-7.16 0 l-1.28 2.96 l-2.34 0 l6.24 -14 l1.92 0 l6.24 14 l-2.34 0 z M4.82 15.219999999999999 l5.56 0 l-2.78 -6.44 z M27.660000000000004 20 l-1.28 -2.96 l-7.16 0 l-1.28 2.96 l-2.34 0 l6.24 -14 l1.92 0 l6.24 14 l-2.34 0 z M20.020000000000003 15.219999999999999 l5.56 0 l-2.78 -6.44 z M43.24 18.5 c-1.26 1.1 -2.9 1.7 -4.72 1.7 c-3.76 0 -7.22 -2.96 -7.22 -7.2 s3.46 -7.2 7.22 -7.2 c1.8 0 3.42 0.6 4.66 1.66 l-1.34 1.52 c-0.88 -0.68 -2.02 -1.1 -3.18 -1.1 c-2.72 0 -5.08 2.12 -5.08 5.12 s2.36 5.12 5.08 5.12 c1.18 0 2.36 -0.44 3.24 -1.16 z M53.82000000000001 6 l2.2 0 l0 14 l-2.2 0 l0 -5.92 l-6.48 0 l0 5.92 l-2.2 0 l0 -14 l2.2 0 l0 6.04 l6.48 0 l0 -6.04 z M69.68 20 l-1.28 -2.96 l-7.16 0 l-1.28 2.96 l-2.34 0 l6.24 -14 l1.92 0 l6.24 14 l-2.34 0 z M62.040000000000006 15.219999999999999 l5.56 0 l-2.78 -6.44 z M84.22 20 l-2.36 0 l-3.3 -4.88 l-0.24 0 l-2.5 0 l0 4.88 l-2.2 0 l0 -14 l4.7 0 c3.14 0 5.06 1.92 5.06 4.62 c0 1.96 -1.02 3.46 -2.78 4.12 z M75.82000000000001 8.04 l0 5.16 l2.4 0 c1.78 0 2.96 -0.84 2.96 -2.58 s-1.18 -2.58 -2.96 -2.58 l-2.4 0 z M98.14000000000001 6 l-5.26 7.76 l0 6.24 l-2.2 0 l0 -6.24 l-5.26 -7.76 l2.5 0 l3.86 5.76 l3.86 -5.76 l2.5 0 z M111.20000000000002 20 l-1.28 -2.96 l-7.16 0 l-1.28 2.96 l-2.34 0 l6.24 -14 l1.92 0 l6.24 14 l-2.34 0 z M103.56 15.219999999999999 l5.56 0 l-2.78 -6.44 z">

                    </path>

                </g>

                <g id="SvgjsG1849" featurekey="rMoqOW-0"

                    transform="matrix(0.5523335735898655,0,0,0.5523335735898655,147.33719942198167,60.79646516782951)"

                    fill="#0081c6">

                    <path

                    d="M9.92 8.38 l-6.02 0 l0 3.46 l4.96 0 l0 2.24 l-4.96 0 l0 5.92 l-2.7 0 l0 -14 l8.72 0 l0 2.38 z M28.28 6 l0 14 l-2.62 0 l0 -14 l2.62 0 z M53.82 6 l2.62 0 l0 14 l-2 0 l-7.3 -9.22 l0 9.22 l-2.62 0 l0 -14 l2.02 0 l7.28 9.24 l0 -9.24 z M77.48 6 c4 0 7.08 3.1 7.08 6.94 c0 3.96 -3.08 7.06 -7.08 7.06 l-4.8 0 l0 -14 l4.8 0 z M77.46000000000001 17.52 c2.84 0 4.44 -2.06 4.44 -4.58 c0 -2.4 -1.6 -4.46 -4.44 -4.46 l-2.16 0 l0 9.04 l2.16 0 z M101.38000000000001 20.1 c-0.84 0 -1.48 -0.64 -1.48 -1.48 s0.64 -1.48 1.48 -1.48 s1.48 0.64 1.48 1.48 s-0.64 1.48 -1.48 1.48 z M127.22 6 l2.62 0 l0 14 l-2.62 0 l0 -5.76 l-6 0 l0 5.76 l-2.62 0 l0 -14 l2.62 0 l0 5.82 l6 0 l0 -5.82 z M148.7 6 l0 14 l-2.62 0 l0 -14 l2.62 0 z M175.78 20 l-2.78 0 l-3.12 -4.76 l-0.12 0 l-2.2 0 l0 4.76 l-2.62 0 l0 -14 l4.82 0 c3.14 0 5.12 1.92 5.12 4.7 c0 1.94 -0.96 3.38 -2.6 4.08 z M167.56 8.42 l0 4.56 l2.06 0 c1.58 0 2.64 -0.68 2.64 -2.28 c0 -1.58 -1.06 -2.28 -2.64 -2.28 l-2.06 0 z M194.04 17.58 l6.1 0 l0 2.42 l-6.5 0 l-2.22 0 l0 -14 l2.62 0 l5.92 0 l0 2.42 l-5.92 0 l0 3.36 l4.5 0 l0 2.36 l-4.5 0 l0 3.44 z M217.06 20.1 c-0.84 0 -1.48 -0.64 -1.48 -1.48 s0.64 -1.48 1.48 -1.48 s1.48 0.64 1.48 1.48 s-0.64 1.48 -1.48 1.48 z M247.48 12.64 c0.54 4.66 -2.52 7.56 -6.26 7.56 c-3.92 0 -7.24 -2.96 -7.24 -7.2 s3.4 -7.2 7.24 -7.2 c1.82 0 3.46 0.6 4.68 1.66 l-1.58 1.8 c-0.8 -0.6 -1.86 -1 -2.94 -1 c-2.62 0 -4.68 1.98 -4.68 4.74 s2 4.74 4.52 4.74 c2 0 3.42 -0.8 3.84 -2.86 l-3.48 0 l0 -2.24 l5.9 0 z M274.3 20 l-2.78 0 l-3.12 -4.76 l-0.12 0 l-2.2 0 l0 4.76 l-2.62 0 l0 -14 l4.82 0 c3.14 0 5.12 1.92 5.12 4.7 c0 1.94 -0.96 3.38 -2.6 4.08 z M266.08 8.42 l0 4.56 l2.06 0 c1.58 0 2.64 -0.68 2.64 -2.28 c0 -1.58 -1.06 -2.28 -2.64 -2.28 l-2.06 0 z M296.88 5.800000000000001 c3.84 0 7.24 2.96 7.24 7.2 s-3.4 7.2 -7.24 7.2 s-7.24 -2.96 -7.24 -7.2 s3.4 -7.2 7.24 -7.2 z M296.88 17.740000000000002 c2.44 0 4.5 -1.98 4.5 -4.74 s-2.06 -4.74 -4.5 -4.74 c-2.46 0 -4.52 1.98 -4.52 4.74 s2.06 4.74 4.52 4.74 z M339.16 6 l-4.58 14 l-1.86 0 l-3.42 -9.34 l-3.4 9.34 l-1.86 0 l-4.58 -14 l2.76 0 l2.86 8.84 l3.22 -8.84 l2.02 0 l3.22 8.84 l2.86 -8.84 l2.76 0 z">

                </path>

            </g>

        </svg></a></h1>

        <div class="formcard">

        <form method="POST" action="" id="login">

            <label for="username">USERNAME :</label>


            <input type="text" id="name" required="true" name="admin" value=""><br><br>

            <label for="password">PASSWORD :</label>

            <input type="password" id="password" name="password" required="true" value="">

            <br><br>

            <div class="sbtn">



                <input type="submit" value="Log In"> <span><a href="index.html">Back to home</a></span>

            </div>
            <div style=" display: flex; background: white; color: red; justify-content: center"> <b> <?php echo $adstate;?></b> </div>


        </form>

    </div>





    <script src="jquery.min.js"></script>

    <script src="adminlte.min.js"></script>

</body>

</html>