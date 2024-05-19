<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teletalk Bangladesh Limited</title>
    <!-- Google Font -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/dashboard/images/bsic.png" />
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/toastr.min.css">

    <script src="<?php echo base_url();?>/public/dashboard/vendors/base/vendor.bundle.base.js"></script>

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

<body >
    <div id='ajaxload' class='load-css d-none'></div>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    


<?php
    $this->load->view($main_content);  
?>







    <!-- Footer Section Begin -->
    <footer class="footer-section" style="padding-top:0px; padding-bottom:0px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class=" text-right">
                            <span style="font-size:10px">Developed by: </span> <a href="#" target="blank" style="width:70%; color: #0c99d5">IT & Billing, Teletalk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
   


    <script src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/main.js"></script>
    <script src="<?php echo base_url();?>/public/js/toastr.min.js"></script>

<!-- Date picker -->

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) {?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('error')) {?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } else if ($this->session->flashdata('warning')) {?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) {?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php }?>


</script>

  

    
</body>

</html>


