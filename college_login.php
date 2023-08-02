<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","","teacher_data");
if(!isset($con))
{
    die("Database Not Found");
}

  
  
if(isset($_REQUEST["submit"]))
{
    
 $username=$_POST['username'];
 $password=$_POST['password'];
 if($username!=''&&$password!='')
 {
   $query=mysqli_query($con ,"select * from college_data where username='".$username."' and password='".$password."'");
   $res=mysqli_fetch_row($query);
   if($res)
   {
    $_SESSION['ad']=$username;
    header('location:admin.php');
   }
   else
   {
     echo '<script>';
    echo 'alert("Invalid Login ! Please try again.")';
    echo '</script>';

   }
 }
 else
 {
     echo '<script>';
    echo 'alert("Enter both username and password")';
    echo '</script>';
 
 }
}



?>