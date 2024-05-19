<!DOCTYPE html>
<html lang="en">  

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Teletalk Bangladesh Limited</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/css/style.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>public/dashboard/images/bsic.png" />

  <link rel="shortcut icon" href="../../images/bsic.png" />
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  

  <!-- End plugin css for this page -->
  
  <link href="<?php echo base_url();?>public/dashboard/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dashboard/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <script src="<?php echo base_url(); ?>public/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>var URL = '<?= base_url(); ?>';</script>

<style>
label.error {
    font-size: 12px;
    display: block;
    margin-top: 5px;
    font-weight: normal;
    color: #F44336;
}
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }

    ul.nav li a, ul.nav li a:visited {
    color: #anycolor !important;
    }

    ul.nav li a:hover, ul.nav li a:active {
        color: #anycolor !important;
    }

    ul.nav li.active a {
        color: #anycolor !important;
    }
    
    .linked{
      box-shadow: 0px 0px 3px #777;
      transition: 0.7s;
    }
     .linked a:hover {
      color: #0056b3!important;
      text-decoration: none!important;
    }
    .linked:hover {
      box-shadow: 1px 2px 3px #777!important;
      transition: 0.7s;
      text-decoration: none!important;
    }
    .card{
      border: transparent!important;
    }
	
	


	
</style>
</head>
<body style="position: relative;" >
<div style='display:none;z-index:10000' class='load-css  crud_load'></div>

  <div class="container-scroller">

     {SITE_BACKEND_TOP_HEADER}

     <div class="container-fluid page-body-wrapper">
		{SITE_BACKEND_LEFT_MENU}

        <div class="main-panel">
		{SITE_BACKEND_MIDDLE_CONTENT}
		<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©2020 All rights reserved by DOT</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by <br><a href="http://syntechbd.com">Syntech Solutions Ltd.</a></span>
          </div>
        </footer>
		</div>
	</div>

</div>
<div class="modal fade" id="CommonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CommonHead"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <div id="CommonData"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
        </div>
      </div>
    </div>
  </div>

<div class="preloader" style="display: none; position: absolute; top: 0%; z-index:9999;background-color:rgba(255, 255, 255, 0.67); width: 100%; height: 100%!important; position: fixed;">
      <div style="width: 60px; height: auto; margin: 250px auto; position: relative;">
          <div class="loader"></div>
          <div style="position: absolute; top: 4px; left: 4px;"><img src="<?= base_url().'public/images/loader.png'?>" width="53px" alt=""></div>
      </div>
  </div>

 <script src="<?php echo base_url();?>public/dashboard/vendors/base/vendor.bundle.base.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url();?>public/dashboard/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/chart.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/dashboard/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>public/dashboard/js/dashboard.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/data-table.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>public/dashboard/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>public/js/toastr.min.js"></script>
  <script src="<?= base_url() ?>public/js/jquery-function.js"></script>



<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/toastr.min.css">
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
  <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  })
  </script>

  <script type="text/javascript">
    $(document).on('change', '#division_id', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getDistrict",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                // console.log(response);
                $('#district_id').html(response);
            }
        });
    });

    $(document).on('change', '#district_id', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getThana",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('#upazila_id').html(response);
            }
        });
    });


    

    
  </script>


</body>
</html>