<?php



include 'connect.php';

$id = $_GET['id'];

$res=mysqli_query($conn, "DELETE FROM `teacher` WHERE id='$id'");

header('location:tdetails.php');

?>