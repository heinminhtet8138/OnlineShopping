<?php 

  session_start();
  if (!isset($_SESSION['loginuser'])) {

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="backend/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="backend/signup.php" enctype="multipart/form-data">
                
                <div class="form-group">
                  <input type="file" class="form-control-file" placeholder="Profile" name="user_profile">
                  <?php 
                    if (isset($_SESSION['validate_profile_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_profile_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_profile_msg']);
                  ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Name" name="user_name" value="<?php if(isset($_SESSION['old_name'])) echo $_SESSION['old_name'] ?>">
                  <?php 
                    if (isset($_SESSION['validate_name_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_name_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_name_msg']);
                    unset($_SESSION['old_name']);
                  ?>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="user_email" value="<?php if(isset($_SESSION['old_email'])) echo $_SESSION['old_email'] ?>">
                  <?php 
                    if (isset($_SESSION['validate_email_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_email_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_email_msg']);
                    unset($_SESSION['old_email']);
                  ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-user" placeholder="Password" name="user_password" value="<?php if(isset($_SESSION['old_password'])) echo $_SESSION['old_password'] ?>">
                  <?php 
                    if (isset($_SESSION['validate_password_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_password_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_password_msg']);
                    unset($_SESSION['old_password']);
                  ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-user" placeholder="Confirm Password" name="user_cpassword" value="<?php if(isset($_SESSION['old_cpassword'])) echo $_SESSION['old_cpassword'] ?>">
                  <?php 
                    if (isset($_SESSION['validate_cpassword_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_cpassword_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_cpassword_msg']);
                    unset($_SESSION['old_cpassword']);
                  ?>
                </div>

                <div class="form-group">
                  <input type="number" class="form-control form-control-user" placeholder="Phone Number" name="user_phone" value="<?php if(isset($_SESSION['old_phone'])) echo $_SESSION['old_phone'] ?>">
                  <?php 
                    if (isset($_SESSION['validate_phone_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_phone_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_phone_msg']);
                    unset($_SESSION['old_phone']);
                  ?>
                </div>

                <div class="form-group">
                  <textarea class="form-control" placeholder="Address" name="user_address"><?php if(isset($_SESSION['old_address'])) echo $_SESSION['old_address'] ?></textarea>
                  <?php 
                    if (isset($_SESSION['validate_address_msg'])) {
                  ?>
                  <small class="text-danger"><?= $_SESSION['validate_address_msg'] ?></small>
                  <?php
                    }
                    unset($_SESSION['validate_address_msg']);
                    unset($_SESSION['old_address']);
                  ?>
                </div>
               
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                     
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 
}else{
  header("location:index.php");
}
?>