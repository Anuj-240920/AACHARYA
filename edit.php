<?php



// include 'conn.php';

include 'connect.php';



$id=$_GET['id'];

$sql1= "select * from teacher where id='$id'";

  $res1=mysqli_query($conn,$sql1);

  $fetch=mysqli_fetch_array($res1);

if(isset($_POST['submit'])){

   

  

    $username = $_POST['username'];

    // $password = $_POST['password'];

    $fname = $_POST['fname'];

    $lname = $_POST['lname'];

    $age = $_POST['age'];

    $fathar_name = $_POST['fathar_name'];

    $email = $_POST['email'];

    $aadhar_no = $_POST['aadhar_no'];

    // $subject = $_POST['subject'];

    // $degrees = $_POST['degrees'];



  $sql= "update teacher set  username='$username', fname='$fname',lname='$lname',fathar_name='$fathar_name',email='$email',aadhar_no='$aadhar_no' where id='$id'";



  $res=mysqli_query($conn,$sql);

  



  if($res){

    echo '<script>alert("updated")</script>';

    header('location: tdetails.php');



  }

  else{

    echo 'abe ja re';

  }

}



?>







<!doctype html>

<html lang="en">



<head>

  <title>form</title>

  <!--  meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- Bootstrap CSS v5.2.1 -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">



</head>



<body>

  <header>

    <!-- place navbar here -->

  </header>

  <main>

<div  class="container">

    <div class="row">

        <div style="margin:auto !important;" class="col-6">



        <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group">

                <label for="username">Username:</label>

                <input type="text" class="form-control" id="username" name="username"  value="<?php echo $fetch['username'] ?>">

              </div>

             

              <div class="form-group">

                <label for="fname">First Name:</label>

                <input type="text" class="form-control" id="fname" name="fname"  value="<?php echo $fetch['fname'] ?>">

              </div>

        

              <div class="form-group">

                <label for="lname">Last Name:</label>

                <input type="text" class="form-control" id="lname" name="lname"  value="<?php echo $fetch['lname'] ?>">

              </div>

        

              <div class="form-group">

                <label for="age">Age:</label>

                <input type="number" class="form-control" id="age" name="age"  value="<?php echo $fetch['age'] ?>">

              </div>



              <div class="form-group">

                <label for="age">Fathar Name:</label>

                <input type="text" class="form-control" id="fathar_name" name="fathar_name"  value="<?php echo $fetch['fathar_name'] ?>">

              </div>



              <div class="form-group">

                <label for="age">Email:</label>

                <input type="email" class="form-control" id="email" name="email"  value="<?php echo $fetch['email'] ?>" >

              </div>



              <div class="form-group">

                <label for="age">Aadhar No:</label>

                <input type="number" class="form-control" id="aadhar_no" name="aadhar_no"  value="<?php echo $fetch['aadhar_no'] ?>">

              </div>

        

            

        

              
<div style="margin:auto; margin-bottom:20px; margin-top:25px ; width:fit-content;">
        

              <input  type="submit" value="submit" name='submit' class='btn btn-dark'>

        
</div>
              <!-- <button type="submit" class="btn btn-primary" name='submit'>Update</button> -->
 <div style="margin:auto; display: flex; justify-content: space-between; margin-top:25px">
        <a href="tdetails.php" class="btn btn-success" style="width: 170px !important;">Teacher Data</a>

        <a href="admin1_dashboard.php" class="btn btn-success" style="width: 170px !important;">Dashboard</a>

</div>
            </form>





          

        </div>
   

    </div>

</div>

  </main>

  <footer>

    <!-- place footer here -->

  </footer>

  <!-- Bootstrap JavaScript Libraries -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"

    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">

  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"

    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">

  </script>

</body>



</html>