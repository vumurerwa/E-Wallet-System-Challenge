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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Administrator</a>
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
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Send Money
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
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
   


    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <br>
            <form action="send-money.php" method="GET">
            <input type="text" class="form-control col-8" name="phone" placeholder="Search Receipient number">
            <button class="btn btn-primary" name="search-user">Search</button>
            </form>
            <?php
            include "dbcon.php";
            if (isset($_GET['search-user'])) {
                ?>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><b>Send Money</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
    $phone = $_GET['phone'];
$sql = "SELECT * FROM user_tb WHERE u_phone='$phone'";
$num=1;
?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>N<sup><u>o</u></sup></th>
                    <th>Names</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
          <?php
 $num=1;
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $u_full_name = $row["u_full_name"];
        $u_email = $row["u_email"];
        $u_phone = $row["u_phone"];
        $u_gender = $row["u_gender"];
        $u_photo = 'dist/img/'.$row["u_photo"];
        $u_idd = $row["u_id"];
        ?>         
                   <tr>
                     <td><?php echo $num; ?></td>
                    <td><?php echo $u_full_name; ?></td>
                    <td><?php echo $u_phone; ?></td>
                    <td><?php echo $u_gender; ?></td>
                    <td><img src="<?php echo $u_photo; ?>" class="img-circle elevation-2" width="60" height="60"></td>
                    <td>
                      <a href="<?php echo 'send-money.php?phone='.$u_phone; ?>" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Send money</a>
                      </td>
                  </tr>
                  <?php
              $num++;
    }
    $result->free();
}
$conn->close();
}
?> 
                  </tfoot>
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
      <!-- /.container-fluid -->
          </section>



          <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Send Money</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="send-money.php" enctype="multipart/form-data">

              <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-user"></i></span>
                 </div>
                 <input type="text" value="<?php echo $u_full_name; ?>" readonly name="u_name" class="form-control" placeholder="Full Names">
               </div>

               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" readonly name="u_phone" value="<?php echo $_GET['phone']; ?>" class="form-control" maxlength="10" placeholder="Phone Number">
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sign"></i></span>
                  </div>
                  <input type="number" name="amount" class="form-control" placeholder="Amount" required="">
                </div><div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input class="form-control" type="hidden" value="<?php echo $_SESSION["u_pass"];?>" required=" " id="pass1" name="newpsw" placeholder="Password">
                  <input class="form-control" type="password" required="" id="pass2" onkeyup="checkPass(); return false;" placeholder="Enter your Password" name="conpsw">
                  <span id="confirmMessage"></span>
                </div>
                    <div class="form-group pass_show"> 
                        <input type="submit"  class="btn btn-info" value="Send Money" name="sendMoney" id="cp"> 
                            </div> 
                </form>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

        <?php
        if(isset($_POST["sendMoney"]))
        {
          include ('dbcon.php');
          $amount = $_POST['amount'];
          $phone = $_POST['u_phone'];
          $query = mysqli_query($conn, ("SELECT * FROM account where user_phone=$phone"));
          while( $row = mysqli_fetch_array($query)) 
            { 
              $acc = $row['total_amount'];
              $acc2 = $acc+$amount;
              mysqli_query($conn, "UPDATE account SET total_amount = '$acc2' WHERE user_phone = '$phone'");
              $num =  $_SESSION["u_phone"];
              $query = mysqli_query($conn, ("SELECT * FROM account where user_phone=$num"));
              while( $row2 = mysqli_fetch_array($query)) 
                { 
                  $red = $row2['total_amount'];
                  $fee = $row2['fees_reduction'];
                  if($amount<=10000)
                  {
                    $reduction = 0;
                  }
                  else if($amount<=100000)
                  {
                    $reduction = 200;
                  }
                  else if($amount>10000)
                  {
                    $reduction = 1000;
                  }
                  $acc3 = $red-$amount;
                  $bal = $acc3 - $reduction;
                  $red_fee = $fee+ $reduction;
                  mysqli_query($conn, "UPDATE account SET total_amount = '$bal', fees_reduction = '$red_fee' WHERE user_phone = '$num'");
                }
              echo "<script>alert('Money sent sucessfully');
                  window.location='send-money.php';</script>";

            }
        }
        ?>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
</body>
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
</html>