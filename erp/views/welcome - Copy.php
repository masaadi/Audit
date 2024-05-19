<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BSCIC</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css" type="text/css">
    <style>
        .top{
            width: 100%;
            padding: 5px 15px;
            background-color: #139E4F;
            text-align: right;
        }
        .testimonial-box img {
        display: inline-block;
        width: 90px;
        height:90px;
        border-radius: 50%;
        margin: 0 0 15px;
        }
        .testimonial-box h4 {
            color: #fe4819;
        }
        .testimonial-box p {
            margin-bottom: 20px;
            font-size: 17px;
            font-style: italic;
            font-weight: 400;
        }
        .ratings-icons {
            color: #fec42d;
            margin-bottom: 15px;
        }

        .carousel-control-prev-icon{
            color: red;
            font-size: 60px;
            height: 162px;
        }
        .carousel-control-next-icon{
            color: red;
            font-size: 60px;
            height: 162px;
        }
        .btn:hover {
            background-color: #3c3c3c;
            color: #fff!important;
        }
        button{
            padding: 0px 10px;
            font-size: 12px;
            border-radius: 3px;
            border: none;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <div class="top">
        <?php
        $language = $this->session->userdata('lang_file');
        if ($language == "bn"){
            ?>
                <a href="<?php echo base_url();?>/language/set/en"  class='btn btn-info btn-sm'>English</a>
        <?php }else{ ?>
            <a href="<?php echo base_url();?>/language/set/bn"  class='btn btn-info btn-sm '>বাংলা</a>
        <?php } ?>



    </div>
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/public/dashboard/images/bsic.png" alt="" style="width: 45%; padding-top: 5px;"></a>
                        </div>
                    </div> 
                    <div class="col-lg-10 col-md-10">
                        <nav class="main-menu mobile-menu">
                            <ul>
                                <li><a class="active" href="<?php echo base_url();?>"><?= $this->lang->line('home') ?></a></li>
                                <li><a href="<?php echo base_url();?>blog"><?= $this->lang->line('blog') ?></a></li>
                                <li><a href="dashboard/pages/user/forum/forum.php"><?= $this->lang->line('forum') ?></a></li>
                                <li><a href="#"><?= $this->lang->line('verify_entrepreneur') ?></a></li>
                                <li class="phone-num"><i class="fa fa-phone"></i><span><?= $this->lang->line('call') ?></span> <a href="<?php echo base_url();?>siteadmin/login" class="btn btn-sm btn-primary ml-3"><?= $this->lang->line('signin') ?></a> <?= $this->lang->line('or') ?> <a href="<?php echo base_url();?>siteadmin/register" class="btn btn-sm btn-primary"><?= $this->lang->line('signup') ?></a></li>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <div class="hero-slider">
        <div class="hero-items owl-carousel">
            <?php 
                if(!empty($slider)):
                    foreach ($slider as $s):
            ?>
            <div class="single-hero-item set-bg" data-setbg="<?php echo base_url('public/uploads/').$s->image_url;?>">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-lg-8">
                            <div class="hero-text">
                                <h1><?php echo $s->image_title;?></h1>
                                <a href="<?php echo base_url();?>siteadmin/login" class="btn primary-btn"><?= $this->lang->line('signin') ?></a>  <?= $this->lang->line('or') ?> <a href="<?php echo base_url();?>siteadmin/register" class="btn primary-btn"><?= $this->lang->line('signup') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; endif;?>
            
        </div>
    </div>
    <!-- Hero Section End -->
    <!-- Class Booking Section Begin -->
    <?php 
       
        $service_title = '';
        $service_content = '';

        $about_title = '';
        $about_content = '';
        $about_img_1 = '';
        $about_img_2 = '';
        $about_img_3 = '';
        $about_img_4 = '';

        $get_info_title = '';
        $get_info_content = '';
        $get_info_img_1 = '';
        $get_info_img_2 = '';


        if(!empty($web_blocks)){
            foreach ($web_blocks as $wb) {
                if($wb->id == 1){
                    $service_title = $wb->block_title;
                    $service_title_bn = $wb->block_title_bn;

                    $service_content = $wb->block_content;
                    $service_content_bn = $wb->block_content_bn;
                }elseif($wb->id == 2){
                    $about_title = $wb->block_title;
                    $about_content = $wb->block_content;

                    $about_title_bn = $wb->block_title_bn;
                    $about_content_bn = $wb->block_content_bn;

                    $about_img_1 = $wb->image_url1;
                    $about_img_2 = $wb->image_url2;
                    $about_img_3 = $wb->image_url3;
                    $about_img_4 = $wb->image_url4;
                }elseif($wb->id == 3){
                    $get_info_title = $wb->block_title;
                    $get_info_content = $wb->block_content;

                    $get_info_title_bn = $wb->block_title_bn;
                    $get_info_content_bn = $wb->block_content_bn;

                    $get_info_img_1 = $wb->image_url1;
                    $get_info_img_2 = $wb->image_url2;
                }
            }
        }
    ?>
    <div class="booking-classes">
        <div class="container-fluid">
            <div class="booking-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="booking-heading" data-setbg="<?php echo base_url();?>/public/img/it.png">
                                    <div class="booking-inner-text">

                                        <?php
                                        $language = $this->session->userdata('lang_file');
                                        if ($language == "bn"){
                                            ?>
                                           <h4><?php echo $service_title_bn;?></h4>
                                            <?php echo $service_content_bn;?>
                                        <?php }else{ ?>
                                             <h4><?php echo $service_title;?></h4>
                                            <?php echo $service_content;?>
                                        <?php } ?>


                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="booking-form">
                            <h2 class="pb-3"><?= $this->lang->line('contact_info') ?></h2>
                            <?php echo form_open_multipart('', array('id' => 'contact_form')); ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php echo form_dropdown('office_category_id', office_category(), '', 'id="office_category_id" class="form-control"'); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id='office_dropdown'>
                                            <?php echo form_dropdown('office_id', office(), '', 'id="office_id" class="form-control"'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" value="<?= $this->lang->line('submit') ?>" id="contact_submit" class="submit-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->



    <!-- Class Booking Section End -->
    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <div class="section-title">


                        <?php
                        $language = $this->session->userdata('lang_file');
                        if ($language == "bn"){
                            ?>
                            <h4><?php echo $about_title_bn;?></h4>
                            <?php echo $about_content_bn;?>
                        <?php }else{ ?>
                                <h4><?php echo $about_title;?></h4>
                            <?php echo $about_content;?>
                        <?php } ?>




                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-services" style="background-image: url('<?php echo base_url('public/uploads/').$about_img_1;?>'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 180px;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services" style="background-image: url('<?php echo base_url('public/uploads/').$about_img_2;?>'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 180px;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services" style="background-image: url('<?php echo base_url('public/uploads/').$about_img_3;?>'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 180px;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services" style="background-image: url('<?php echo base_url('public/uploads/').$about_img_4;?>'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 180px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <!-- Client Says Section Begin -->
    <section class="client-says set-bg" data-setbg="<?php echo base_url();?>/public/img/Banner_simple2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="client-text">
                        <h2><?= $this->lang->line('subscribe_to_our_newslatter') ?></h2>
                        <?php echo form_open_multipart('', array('id' => 'newslatter_form')); ?> 
                            <div class="row my-3" style="background-color: #ccc; padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa;">
                                <div class="col-sm-5 ">
                                      <div class="form-group">       
                                             <input type="text" name="subscriber_name" id="subscriber_name" class="form-control" placeholder="<?= $this->lang->line('enter_your_name') ?>">
                                      </div>
                                      <!-- <div id="validation-msg"></div> -->
                                </div>
                                <div class="col-sm-5 ">
                                    <div class="form-group">               
                                            <input type="email" name="subscriber_email" id="subscriber_email" class="form-control" placeholder="<?= $this->lang->line('enter_your_email') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2 ">
                                      <div class="form-group">               
                                        <button class="btn btn-md btn-success" type="submit" id="newslatter_submit"><?= $this->lang->line('subscribe') ?></button>
                                      </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Says Section End -->
    <!-- Lifestyles Section Begin -->
    <section class="lifestyle-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="lifestyle-text">
                        <div class="section-title">
                           
                            <?php
                            $language = $this->session->userdata('lang_file');
                            if ($language == "bn"){
                                ?>
                                <h2><?php echo $get_info_title_bn;?></h2>
                                <?php echo $get_info_content_bn;?>
                            <?php }else{ ?>
                                <h2><?php echo $get_info_title;?></h2>
                                <?php echo $get_info_content;?>
                            <?php } ?>


                            <img src="<?php echo base_url('public/uploads/').$get_info_img_1;?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <img src="<?php echo base_url('public/uploads/').$get_info_img_2;?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lifestyles Section End -->
    <!-- Boxes Section Begin -->
    
    <!-- Boxes Section End -->
    <!-- Call To Section Begin -->
    <section class="callto-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="callto-text">
                        <h2><?= $this->lang->line('register_your_business_now') ?>  </h2>
                        <p><?= $this->lang->line('bscic_ntrepreneur_sign_up_system') ?> </p>
                        <a href="dashboard/pages/user/signup.php" class="primary-btn callto-btn"><?= $this->lang->line('signup') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Section End -->

    <!-- Map Section Begin -->
    <div class="map">
        <div class="container-fluid">
                <h4 style="text-align: center; padding: 15px 0px;"><?= $this->lang->line('reviews') ?></h4>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                            <div class="row text-center">										
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                            
                                            <div class="ratings-icons">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Shuvro Ahamed</h4>
                                            <p>This is Very easy to Use</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                           
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Nadim Mridha</h4>
                                            <p>There is many useful links which is very helpfull</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">
                                            
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Robiul Alam</h4>
                                            <p>This site is very helpful for Entrepreneurs</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                                    
                                
                                </div>
                      </div>
                      <div class="carousel-item">
                            <div class="row text-center">										
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                            
                                            <div class="ratings-icons">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Shuvro Ahamed</h4>
                                            <p>This is Very easy to Use</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                           
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Nadim Mridha</h4>
                                            <p>There is many useful links which is very helpfull</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">
                                            
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Robiul Alam</h4>
                                            <p>This site is very helpful for Entrepreneurs</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                                    
                                
                                </div>
                      </div>
                      <div class="carousel-item">
                            <div class="row text-center">										
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                            
                                            <div class="ratings-icons">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Shuvro Ahamed</h4>
                                            <p>This is Very easy to Use</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">							
                                           
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Nadim Mridha</h4>
                                            <p>There is many useful links which is very helpfull</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                    
                                    <div class="col-sm-6 col-md-4">																		
                                        <div class="testimonial-box">
                                            
                                            <div class="ratings-icons">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            </div>
                                            <h4>Robiul Alam</h4>
                                            <p>This site is very helpful for Entrepreneurs</p>									 							
                                            
                                        </div>					
                                    </div> <!-- End Col -->								
                                                    
                                
                                </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
    </div>
</div>
    <!-- Map Section End -->
    <!-- Footer Section Begin -->
   <!-- Footer Section Begin -->
   <footer class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="reserved">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by BSCIC<br>Technical Support by <img src="<?php echo base_url();?>public/dashboard/images/a2i-new-logo_Aug2018-300x300.png" style="width: 10%;">
                        </div>
                        <div class="social-links text-right">
                            Developed by <a href="#"><img src="<?php echo base_url();?>public/img/syntech-logo.png" style="width: 70%;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
    <!-- Search model end -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('office_information') ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-body"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Js Plugins -->
    <script src="<?php echo base_url();?>/public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/main.js"></script>
    <script src="<?php echo base_url();?>/public/js/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/toastr.min.css">
    <script type="text/javascript">
        $(document).on('change', '#office_category_id', function () {

            var id = $(this).val();

            $.ajax({
                url: "<?php echo base_url() ?>common/getOfficeByCat",
                type: 'POST',
                data: {id: id},
                success: function (response) {
                    $('#office_dropdown').html(response);
                }
            });
        });

        $(function () {
            $('body').on('click', '#contact_submit', function () {
                
                    $('#contact_form').validate({
                        rules: {
                            office_category_id: {
                                required: true,
                            },
                            office_id: {
                                required: true,
                            }                      
                        },
                        submitHandler: function (form) {
                            $("label.error").remove();
                            // e.preventDefault();
                            // var frm = $('#contact_form');
                            // var form = $(this);
                            //debugger;
                            var currentForm = $('#contact_form')[0];
                            var formData = new FormData(currentForm);                        
                            $.ajax({
                                url: "<?php echo base_url() ?>welcome/get_contact",
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    // console.log(response);
                                    $('.contact-body').html(response);
                                    $('#exampleModal').modal('show'); 
                                    // var result = $.parseJSON(response);
                                    // if (result.status != 'success') {
                                    //     $.each(result, function (key, value) {
                                    //       $('[name="' + key + '"]').addClass("error");
                                    //       $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                    //   });
                                    // }else {
                                    //   $('.search_form').show();
                                    //   $('.add_button').show();
                                    //       window.onload = searchFilter(0);
                                    //       toastr.success(result.message);
                                    //   }
                                }
                            });
                        }
                    });
                
            });
        });

        $(function () {
            $('body').on('click', '#newslatter_submit', function () {
                
                    $('#newslatter_form').validate({
                        rules: {
                            subscriber_name: {
                                required: true,
                            },subscriber_email: {
                                required: true,
                            }               
                        },
                        submitHandler: function (form) {
                            $("label.error").remove();
                            var currentForm = $('#newslatter_form')[0];
                            var formData = new FormData(currentForm);                        
                            $.ajax({
                                url: "<?php echo base_url() ?>welcome/newslatter_subscribtion",
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    var result = $.parseJSON(response);
                                    $("#newslatter_form").trigger("reset");
                                    toastr.success(result.message);
                                }
                            });
                        }
                    });
                
            });
        });

        
    </script>
</body>

</html>