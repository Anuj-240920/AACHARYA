

<?php



include 'connect.php';









?>







<!doctype html>

<html lang="en">



<head>

  <title>show</title>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- Bootstrap CSS v5.2.1 -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>



<body>

  <header>

    <!-- place navbar here -->

  </header>

  <main>

<div class="container">

    <div class="row">

        <div class="col-12 m-auto">



        <h1 style="text-align: center; margin:20px 0px;">Teacher's Details</h1>

        <table class='table table-striped table-hover table-bordered text-center '>



<thead class='bg-dark text-white'>

  <tr class='text-center'>

  <th>Id</th>

  <th>username</th>

  <th>First name</th>

  <th>Last name</th>

  <th>year</th>

  <th>full name</th>

  <th>email</th>

  <th>Aadhar no</th>

  <th>subject</th>

  <th>course</th>







  <th>delete</th>

  <th>update</th>



  </tr> 





      </thead>

      <tbody>

        <?php



include 'connect.php';







  $sql= "select * from teacher";



  $res=mysqli_query($conn,$sql);





  while($fetch=mysqli_fetch_array($res)){

    



  

  

    

?>



<tr>

  <td><?php echo $fetch['id'] ?></td>

  <td><?php echo $fetch['username'] ?></td>

  <td><?php echo $fetch['fname'] ?> </td>

  <td><?php echo $fetch['lname'] ?> </td>

  <td><?php echo $fetch['age'] ?> </td>

  <td><?php echo $fetch['fathar_name'] ?> </td>

  <td><?php echo $fetch['email'] ?> </td>
  <td><?php 
  if (strlen($fetch['aadhar_no']) >= 4) {
    $aadhar =  str_repeat('*', strlen($fetch['aadhar_no']) - 4) . substr($fetch['aadhar_no'], -4);
   
} 
else {
    $aadhar = $fetch['aadhar_no'];
}
  echo $aadhar
  ?> </td>

  <td><?php echo $fetch['subject'] ?> </td>

  <td><?php echo $fetch['degrees'] ?> </td>







  <td><button class='btn btn-danger'><a href="delete.php?id=<?php echo $fetch['id'] ?>" class='text-white'> 

 

  <i class="fa fa-trash" style='font-size:1.4rem;'></i>

</a></button> </td>

  <td><button class='btn btn-primary'><a href="edit.php?id=<?php echo $fetch['id'] ?>" class='text-white'>

  <i class="	fa fa-pencil-square-o" style='font-size:1.4rem;'></i>





</a></button>  </td>



</tr>

<?php  

  }

?>

</tbody>

  



</table>

        </div>

    </div>
    <div style="margin:auto; margin-top:20px; margin-bottom:15px; width:fit-content;">

    <a href="admin1_dashboard.php" class="btn btn-success">Dashboard</a>
</div>
    <!-- <a href="show.php" class="btn btn-success">update</a> -->





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