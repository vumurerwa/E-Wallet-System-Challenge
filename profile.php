<?php
include 'dbcon.php';
include 'secure.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php';?>
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed layout-fixed">
<div class="wrapper">
  <!-- Preloader -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Wallet System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION["u_photo"];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['u_full_name'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="send-money.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Send Money
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link active">
                  <i class="far fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-sign nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    


<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><b>Profile</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                include "dbcon.php";
                $cus_id=$_SESSION["u_id"];
                $u_id=$_SESSION["u_id"];
                $sql = "SELECT * FROM user_tb where u_id='$u_id'";
                $num=1;
                ?>
                <table id="example2" class="table  table-hover">
                  
  <?php
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        //$row_id = $row["s_id"];
        $u_full_name = $row["u_full_name"];
        $u_phone = $row["u_phone"];
        $u_email = $row["u_email"];
        $u_gender = $row["u_gender"];

    }
    $result->free();
    ?>
                  <tr>
                   <th> Names </th>
                   <td> <?php echo $u_full_name; ?></td>
                 </tr>
                 <tr>
                   <th> Phone </th>
                   <td> <?php echo $u_phone; ?></td>
                 </tr>
                 <tr>
                   <th> Email </th>
                   <td> <?php echo $u_email; ?></td>
                 </tr>
                 <tr>
                   <th> Gender </th>
                   <td> <?php echo $u_gender; ?></td>
                 </tr>
                 <tr>
                   <th colspan="2"> <button type="button" class="btn btn-info col-12" data-toggle="modal" data-target="#modal-default">Change Profile</button></th>
                 </tr>
              <?php
}
$conn->close();
?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>



      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Change Information</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="profile.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group row has-success">
                                            <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Names</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="uname" value="<?= $u_full_name;?>" class="form-control form-control-success" id="inputHorizontalSuccess" placeholder="<?=$u_full_name;?>">
                                            </div>
                                        </div>
                                        <div class="form-group row has-success">
                                            <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly name="tel" value="<?=$u_phone;?>" class="form-control form-control-success" id="inputHorizontalSuccess" placeholder="<?=$u_phone;?>">
                                            </div>
                                        </div>
                                        <div class="form-group row has-success">
                                            <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" value="<?=$u_email;?>" class="form-control form-control-success" id="inputHorizontalSuccess" placeholder="<?=$u_email;?>">
                                            </div>
                                        </div>
                                        <div class="form-group pass_show"> 
                                                    <input type="submit"  class="btn btn-info" value="Change" name="ChangeInfo" id="cp"> 
                                                </div> 
                                    </form>
                                    
               
                                    
                                    <hr>
                                     
                                        <center><h3>Change password</h3></center>
                                    <form method="POST" action="profile.php" enctype="multipart/form-data">
                                    <label>Current Password</label>
                                         <div class="form-group pass_show"> 
                                                    <input type="password" required  class="form-control" placeholder="Current Password" name="oldpsw"> 
                                                </div> 
                                            <label>New Password</label>
                                                <div class="form-group pass_show"> 
                                                  <input class="form-control" type="password" required=" " id="pass1" name="newpsw" placeholder="Password">
                                                </div> 
                                            <label>Confirm Password</label>
                                                <div class="form-group pass_show"> 
                                                   <input class="form-control" type="password" required=" " id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password" name="conpsw">
                                                                             <span id="confirmMessage"></span>
                                                </div> 
                                                <div class="form-group pass_show"> 
                                                    <input type="submit"  class="btn btn-info" value="Change Password" name="ChangePass" id="cp"> 
                                                </div> 
                                    </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



    
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        $('#cp').prop('disabled', false);
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        $('#cp').prop('disabled', true);
    }
}  
</script>
  
<script type="text/javascript">
  function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        $('#cp').prop('disabled', false);
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        $('#cp').prop('disabled', true);
    }
}  
</script>
</body>
</html>
<?php
session_start();

if (isset($_POST['ChangeInfo'])) {
  include ('dbcon.php');
    $u_full_name = $_POST['uname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $id = $_SESSION['u_id'];
    $qrys="UPDATE user_tb SET u_full_name='$u_full_name',u_phone='$tel',u_email='$email' WHERE u_id='$id';";
    $results= mysqli_query($conn,$qrys);
    if($results==true){
        ?>
        <script>alert("Information Changed Successfully");
         window.location.href = "profile.php";
        </script>
        <?php
    }else{
        ?>
        <script>alert("Information Change not Success");
         window.location.href = "profile.php";
        </script>
        <?php
    }
}
?>

<?php
session_start();
if(isset($_POST["ChangePass"]))
{
  include ('dbcon.php');
$oldpsw= $_POST["oldpsw"];
$newpsw= $_POST["newpsw"];
$conpsw= $_POST["conpsw"];

$qry1 = "SELECT * FROM user_tb";
$re = mysqli_query($conn,$qry1);
$row = mysqli_fetch_array($re);
$dbpsw= $row['u_pass'];
$id= $_SESSION['u_id'];
 
if($dbpsw==$oldpsw)
{
 
if($newpsw==$conpsw)
{
$nwpsw = $newpsw;
$qrys="UPDATE user_tb SET u_pass='$nwpsw' WHERE u_id='$id'";
$results= mysqli_query($conn,$qrys);
if($results==true)
{
?>
<script>alert("Password Changed Successfully");
window.location.href = "profile.php";
</script>
<?php
}
else
{
?>
<script>alert("Password Not Changed");
window.location.href = "profile.php";
</script>
<?php
}
mysqli_close($conn);
}
else
{
?>
<script>alert("Password Not Matched");
window.location.href = "profile.php";
</script>
<?php
}
}
else
{
?>
<script>alert("Old password is wrong");
window.location.href = "profile.php";
</script>
<?php
}
}
?>