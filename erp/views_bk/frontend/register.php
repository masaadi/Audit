<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/font-awesome.min.css" type="text/css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/rstyle.css">
    <style type="text/css">
      .message_error_input p{color:red}
      .error {
      color: red;
        }
        .disable-btn{
            background-color: red;
        }
        #agreeterm-error{   
            position: absolute;
            margin-top: 22px;
            margin-left: -15px;
        }
    </style>
</head>
<body>

    <div class="main">
      <?php echo form_open("siteadmin/registered", array('id' => 'form_register')); ?>
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <?php 
                if(empty($this->session->flashdata('message'))){
                ?>
                <div class="signup-content">
                   
                        <div class="brand-logo" style="text-align: center;">
                          <img width="100px" src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="logo">
                        </div>
                        <h2 class="form-title"><?= $this->lang->line('sign_up_to_continue')?></h2>
                        <div class="form-group">
                            <label><?= $this->lang->line('first_name')?> <span class="mandetory">*</span></label>
                            <input type="text" value="<?=  $this->form_validation->set_value('first_name') ?>" class="form-input" name="first_name" id="first_name" placeholder="<?= $this->lang->line('first_name')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('first_name')); ?></div>
                        </div>

                        <div class="form-group">
                            <label><?= $this->lang->line('last_name')?> <span class="mandetory">*</span></label>
                            <input type="text" value="<?=  $this->form_validation->set_value('last_name') ?>" class="form-input" name="last_name" id="last_name" placeholder="<?= $this->lang->line('last_name')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('last_name')); ?></div>
                        </div>
                        
                        <div class="form-group">
                            <label><?= $this->lang->line('nid_no')?> </label>
                            <input type="text" value="<?= (isset($_POST['nid_no']))? $_POST['nid_no'] : '' ?>" class="form-input" name="nid_no" id="nid_no" placeholder="<?= $this->lang->line('nid_no')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('nid_no')); ?></div>
                        </div>

                        <div class="form-group">
                            <label><?= $this->lang->line('birth_certificate_no')?> </label>
                            <input type="text" value="<?= (isset($_POST['nid_no']))? $_POST['birth_certificate_no'] : '' ?>" class="form-input" name="birth_certificate_no" id="birth_certificate_no" placeholder="<?= $this->lang->line('birth_certificate_no')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('birth_certificate_no')); ?></div>
                        </div>

                        <div class="form-group">
                            <label><?= $this->lang->line('email')?> <span class="mandetory">*</span></label>
                            <input type="email" value="<?=  $this->form_validation->set_value('email') ?>" class="form-input" name="email" id="email" placeholder="<?= $this->lang->line('your_email')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('email')); ?></div>
                        </div>
                        
                        <div class="form-group">
                            <label><?= $this->lang->line('phone_no')?> <span class="mandetory">*</span></label>
                            <input type="text" value="<?=  $this->form_validation->set_value('phone_no') ?>" class="form-input" name="phone_no" id="phone_no" placeholder="<?= $this->lang->line('phone_no')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('phone_no')); ?></div>
                        </div>

                        <div class="form-group">
                            <label><?= $this->lang->line('username')?> <span class="mandetory">*</span></label>
                            <input type="text" value="<?=  $this->form_validation->set_value('username') ?>" class="form-input" name="username" id="username" placeholder="<?= $this->lang->line('username')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('username')); ?></div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label><?= $this->lang->line('password')?> <span class="mandetory">*</span></label>
                            <input type="text"  value="<?=  $this->form_validation->set_value('password') ?>" class="form-input" name="password" id="password" placeholder="<?= $this->lang->line('create_password')?>"/>
                            <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                            <div class="message_error_input"> <?php echo ucwords(form_error('password')); ?></div>
                        </div>
                        <div class="form-group">
                            <label><?= $this->lang->line('confirm_password')?> <span class="mandetory">*</span></label>
                            <input type="password"  value="<?=  $this->form_validation->set_value('confirm_password') ?>" class="form-input" name="confirm_password" id="confirm_password" placeholder="<?= $this->lang->line('repeat_your_password')?>"/>
                            <div class="message_error_input"> <?php echo ucwords(form_error('confirm_password')); ?></div>
                        </div>
                        <div class="form-group">
                            <input  type="checkbox"  name="agreeterm" id="agreeterm" class=""/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span><?= $this->lang->line('i_agree_all_statement')?> <a href="#" class="term-service"><?= $this->lang->line('terms_of_service')?></a></label>
                        </div>
                        <div class="form-group" style="margin-top: 35px;">
                            <input type="submit" style="cursor:pointer" name="submit" id="submit" class="form-submit cursor-pointe" value="<?= $this->lang->line('signup')?>"  />
                        </div>
                    <p class="loginhere">
                       <?= $this->lang->line('have_already_an_account')?> <a href="<?php echo base_url();?>siteadmin/login" class="loginhere-link"><?= $this->lang->line('login_here')?></a>
                    </p>
                </div>
                <?php 
                }else{
                    ?>
                    <div class="signup-content">
                        <?php  echo $this->session->flashdata('message');
                        echo 'dfssdf';?>
                    </div>

                    <?php 
                }
                ?>
            </div>
        </section>
        <?php echo form_close(); ?>
    </div>

    <!-- JS -->
    <script src="<?php echo base_url();?>public/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>public/js/rmain.js"></script>


    <script>
    //    $('#agreeterm').change(function(){
    //         if($(this).is(':checked')){
    //             //Enable the submit button.
    //             $('#submit').attr("disabled", false);
    //             $('#submit').addClass('disable-btn');
    //         } else{
    //             //If it is not checked, disable the button.
    //             $('#submit').attr("disabled", true);
    //             $('#submit').addClass('disable-btn');
    //         }
    //    })


       $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#form_register').validate({
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        email: {
                            required: true,
                        },
                        phone_no: {
                            required: true,
                            number: true
                        },
                        username: {
                            required: true,
                        },
                        password: {
                            required: true,
                        },
                        confirm_password: {
                            required: true,
                        },
                        agreeterm: {
                            required: true,
                        }
                    },
                    messages: {
                        first_name: {
                            required: 'First Name is requied.',
                        },
                        last_name: {
                            required: 'Last Name is required.',
                        },
                        email: {
                            required: 'Email is required.',
                        },
                        phone_no: {
                            required: 'Phone No is required.',
                            number: 'Please input valid phone number.',
                        },
                        username: {
                            required: "Username is required.",
                        },
                        password: {
                            required: 'Password is required.',
                        },
                        confirm_password: {
                            required: 'Confirm Password is required.',
                        },
                        agreeterm: {
                            required: 'Please checked for singup.',
                        }
                    }
                });
            
        });
    });





    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>