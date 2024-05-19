<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/rstyle.css">
    <style type="text/css">
      .message_error_input p{color:red}
    </style>
</head>
<body>

    <div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content" style="text-align: center;">
                    <?php 
                    if($status==1){
                        ?>
                        <h3 style="color: green;">Verification Complete</h3>
                        <h3 style="color: green;">Please Login</h3>
                        <a href="<?php echo base_url();?>siteadmin/login" class="form-submit"><?= $this->lang->line('login')?></a>

                        <?php 
                    }else{
                         ?>
                        <h3 style="color: red;">Your Verification Codo is Wrong.</h3>
                        <h3 style="color: red;">Please Check Again...</h3>
                        <?php 
                    }

                    ?>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?php echo base_url();?>public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>public/js/rmain.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>