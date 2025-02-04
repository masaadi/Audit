<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/bsic.png" />
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
<style>
    
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }
    .card .card-body {
      padding: .5rem 0.875rem!important;
    }
    ul li, ol li, dl li{
      line-height: 1;
    }
    .nav-tabs .nav-link{
      padding: .2rem 1.5rem .2rem 1.5rem!important;
    }
    .sidebar{
      display: none;
    }
    .main-panel{
      width: 100%;
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="inspection-report-submission.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="inspection-report-submission.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button> -->
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <span style="font-size: 20px; color:#520e00 ;">BSCIC E-Registration System</span>
            <!-- <img src="images/bsic.png" style="width: 50px;"> -->
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face4.jpg" alt="profile"/>
              <span class="nav-profile-name">Inspector</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../../../index.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              
              
              <li class="nav-item">
                  <a class="nav-link" href="#">
                      <i class="mdi mdi-table-edit menu-icon"></i>
                      <span class="menu-title">Inspection Report Submission</span>
                    </a>
              </li>
               
            </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a class="btn btn-sm btn-success" href="inspection-report-submission.php">Back to Home</a>
                  </div>
                </div>
                  <div class="row">
                      <div class="col-md-12">
                          <h5 class="pt-5">Inspection Report :</h5>
      
                          <ul class="list-star">
                            <li class="py-2">Entereprenuer Name : Md juwel Khondokar</li>
                            <li class="py-2">Entereprenuer ID : 3111</li>
                            <li class="py-2">Address : 25th Nazrul Avenue</li>
                            <li class="py-2">Inspection Date : 25-10-11</li>
                          </ul>
                      </div>
                    </div>
                    <h5>A list of all the information mentioned in the Application forum
                        during the Inspection was not found or Evidence of Incorrect information
                        has been served</h5>
                    <div class="row py-3" style="width: 100%;">
                        <div class="col-md-6">
                            <h5 class="">Information/Evidence Served</h5>
                            <div class="row">		
                                <div class="col-sm-12 form-group">
                                    <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                </div>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="">Information Received</h5>
                            <div class="row">		
                                <div class="col-sm-12 form-group">
                                    <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                </div>	
                            </div>
                        </div>
                        <div class="col-md-12 py-3 text-right">
                            <button class="btn btn-sm btn-primary">Add More</button>
                        </div>
                        <div class="col-md-12">
                            <h5 class="">Opinion of Visiting Officer</h5>
                            <div class="row">		
                                <div class="col-sm-12 form-group">
                                    <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                </div>	
                            </div>
                        </div>
                      </div>
                      <h5>Name and Signature of the owner or representative of the Industrial Company</h5>
                      <div class="row py-3" style="width: 100%;">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-sm-12 form-group">
                                    <label>Name :</label>
                                    <input type="text" placeholder="Enter Name Here.." class="form-control">
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                      <label>Designation :</label>
                                      <input type="text" placeholder="Enter Designation Here.." class="form-control">
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-12 form-group">
                                        <label>Signature :</label>
                                        <input type="text" placeholder="Signature" class="form-control">
                                      </div>
                                    </div>
                          </div>
                          <div class="col-md-6">
                              <h5 class="">GPS/Auto Locate</h5>
                              <div class="row">		
                                  <div class="col-sm-12 form-group">
                                      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29220.932887045616!2d90.4187599!3d23.7253814!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1575972705282!5m2!1sen!2sbd" width="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                  </div>	
                              </div>
                          </div>
                          <div class="col-md-12 text-right">
                              <button class="btn btn-sm btn-primary">Save</button>
                          </div>
                        </div>
              </div>
            </div>
          </div>
           

              
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by <a href="http://syntechbd.com">Syntech Solutions Ltd.</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/data-table.js"></script>
  <script src="../../js/jquery.dataTables.js"></script>
  <script src="../../js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="../../js/chart.js"></script>
  <script>
  $(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>
</body>

</html>

