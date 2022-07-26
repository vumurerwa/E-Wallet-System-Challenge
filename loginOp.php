<?php
session_start();
include 'dbcon.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $u=$_POST['u_email'];
  $psw=$_POST['u_pass'];
  $sql=mysqli_query($conn,"SELECT * FROM user_tb WHERE u_email='$u' and u_pass='$psw'")or die(mysqli_error($conn));

  $count=mysqli_num_rows($sql);
  if ($count==1) 
  {
    $_SESSION['u_email']=$u;
    while($row=mysqli_fetch_array($sql))
    {
     $_SESSION["u_photo"] = 'dist/img/'.$row['u_photo'];
     $_SESSION["u_full_name"] = $row['u_full_name'];
     $_SESSION["u_phone"] = $row['u_phone'];
     $_SESSION["u_id"] = $row['u_id'];
     $_SESSION["u_pass"] = $row['u_pass'];
        echo "<script>function red(){
        window.location='dashboard.php';
        } setInterval(red,1000);
        </script>";
      }

    }
     else{
        echo "<font color='red'>Invalid Email or Password</font>";
        echo "<script>function red(){
        window.location='index.php';
        } setInterval(red,1500);
        </script>";
    }
  }
?>