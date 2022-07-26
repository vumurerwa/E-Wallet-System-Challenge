<!DOCTYPE html>
<html lang="en">
<head>
 <?php include 'header.php';?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
   <div class="card-header text-center">
      <h1>User Login</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="loginOp.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="u_email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="u_pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a style="cursor:pointer;" data-toggle="modal" data-target="#modal-default">Create new account</a>
      </p>
      <!-- <p class="mb-0">
        <a href="index.php" class="text-center">Login as Admin</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Create Account</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="index.php" enctype="multipart/form-data">
              
              <!-- Input addon -->
           <div class="card card-info">
             <div class="card-body">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-user"></i></span>
                 </div>
                 <input type="text" name="u_name" class="form-control" placeholder="Full Names">
               </div>

               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                 </div>
                 <input type="email" name="u_email" class="form-control" placeholder="Email" required="">
               </div>

               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-key"></i></span>
                 </div>
                 <input type="Password" required name="u_pass" class="form-control" placeholder="Password">
               </div>

               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-phone"></i></span>
                 </div>
                 <input type="text" name="u_phone" class="form-control" maxlength="10" placeholder="Phone Number">
               </div>

               <div class="form-group">
                   <label for="exampleInputFile">Profile Picture</label>
                   <div class="input-group">
                     <div class="custom-file">
                       <input type="file" name="file" class="custom-file-input" id="file">
                       <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                     </div>
                   </div>
                 </div>

                 <div class="col-sm-6">
                     <!-- radio -->
                     <label for="exampleInputFile">Gender</label>
                     <div class="form-group">
                       <div class="custom-control custom-radio">
                       <input class="custom-control-input" value="M" type="radio" id="customRadio1" name="u_gender">
                         <label for="customRadio1" class="custom-control-label">Male</label>
                       </div>
                       <div class="custom-control custom-radio">
                       <input class="custom-control-input" value="F" type="radio" id="customRadio2" name="u_gender">
                         <label for="customRadio2" class="custom-control-label">Female</label>
                       </div>
                     </div>
                   </div>
               <input type="submit" name="save" value="Create" class="btn btn-block btn-primary">
               <!-- /.row -->
               </div>
               <!-- /input-group -->
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

           </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



</body>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>

<?php
include ('dbcon.php');
if (isset($_POST['save'])) {
  $u_name=$_POST['u_name'];
  $u_email=$_POST['u_email'];
  $u_pass=$_POST['u_pass'];
  $u_phone=$_POST['u_phone'];
  $u_gender=$_POST['u_gender'];

  $filename = $_FILES['file']['name'];

    // Select file type
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload files and store in database
        if(move_uploaded_file($_FILES["file"]["tmp_name"],'dist/img/'.$filename)){

  $sql="INSERT INTO user_tb values('','$u_name','$u_email','$u_pass','$u_phone','$filename','$u_gender',1)";
  $qry=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  if ($qry) 
  {
    $account = "INSERT INTO account values(null,'$u_phone','1000','0')";
    mysqli_query($conn,$account)or die(mysqli_error($conn));
    echo "<script>alert('Account created Sucessfully with 1000 welcome bonus');
    window.location='index.php';</script>";
  }
   }else{
            echo 'Error in uploading file - '.$_FILES['file']['name'].'<br/>';
        }
    }
}
?>