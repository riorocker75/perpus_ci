<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $this->m_dah->get_option('blog_name'); ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets_f/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets_f/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets_f/css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-default">
<!-- <body class=""> -->

  <div class="container">

    <!-- Outer Row -->

    <div class="row justify-content-center">


      <div class="col-xl-5 col-lg-12 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
           
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
               <div class="text-center" style="margin-top:20px;margin-bottom:-20px;width: 100%">
              <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center">
             Selamat Datang 
            </div>
            
           
            </div>

              <div class="col-lg-12">
                <div class="p-5">
               
                  <?php show_alert(); ?>

                  <form class="user" action="<?php echo base_url() . 'xlog/login_act' ?>" method="post">
                    <div class="form-group">
                      <!-- <label>Username atau Nik</label> -->

                      <input type="text" class="form-control form-control-user" placeholder="Username" name="uname">
                    </div>
                    <?php echo form_error('uname', '<div class="form-error">', '</div>'); ?>

                    <div class="form-group pass-cek">
                      <!-- <label>Password</label> -->
                      <input type="password" id="showPass" class="form-control form-control-user " name="pass" placeholder="Password">
                      <span class="icon-input-right checkPass"><i class="fa fa-eye" aria-hidden="true"></i></span>

                    </div>
                    <?php echo form_error('pass', '<div class="form-error">', '</div>'); ?>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>

                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets_f/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets_f/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets_f/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/js/showpass.js"></script>

</body>

</html>