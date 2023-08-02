<?php

include "includes/conn.php";

if(isset($_POST['submit'])){

    $email=$_POST['email'];

    $sql="insert into contact_email(email) values('$email')";

    $res=mysqli_query($conn,$sql);

    if($res){
        echo'<script>
        alert("Thank you for subscribing")
        window.location.replace("/index.html")
        </script>';
    }
}




?>