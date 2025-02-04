<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title>BADC</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>/public/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    
<!--
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
-->

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>public/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>public/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/css/custom.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo logo-login">
           <img src="<?php echo base_url();?>public/images/logo2.png" alt="">
            <a href="#" style="font-size:16px">Bangladesh Agricultural Development Corporation  </a> 
        </div>
        <div class="card">
            <div class="body">
			  
                <?php echo form_open($this->uri->uri_string()); ?>
                    <div class="msg">Sign in to start your session</div>
					<div class="msg" style="color:red; font-weight:bold">
					<?php $sa = $this->dx_auth->get_auth_error(); if(!empty($sa)): ?><div  class="error_msg" id="status_message"><?php echo ucwords($sa); ?>
	</div><?php endif; ?></div>
					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
						
						<input type="submit" class="btn btn-block bg-pink waves-effect" value="SIGN IN"/>
                           <!-- <a href="index.php" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</a>-->
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.php"> </a>
                        </div>
                        <div class="col-xs-6 align-right">
                           <!-- <a href="forgot-password.php">Forgot Password?</a>-->
                        </div>
                    </div>
					
					<input type="hidden" name="id" value="<?php echo $id;?>">
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>public/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>public/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>public/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url();?>public/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>public/js/admin.js"></script>
    <script src="<?php echo base_url();?>public/js/pages/examples/sign-in.js"></script>
</body>

</html>