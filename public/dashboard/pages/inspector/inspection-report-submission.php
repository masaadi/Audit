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
    .nav-tabs{
      border: transparent;
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
    <!-- partial:partials/_navbar.html -->
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
                  <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card" style="box-shadow:0px 0px 3px #777">
                            <div class="card-body dashboard-tabs p-0">
                              <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item text-center" style="width: 25%; border-radius: 10px 10px 0px 0px;">
                                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">
                                    
                                    <div class="row">
                                      <div class="col-md-1"><i class="mdi mdi-binoculars" style="font-size: 40px;"></i></div>
                                      <div class="col-md-11 pt-3" style="font-size: 16px;">
                                          Inspection Checklist
                                      </div>
                                    </div>
                                  </a>
                                </li>
                                <li class="nav-item text-center" style="width: 25%; border-radius: 10px 10px 0px 0px;">
                                  <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">
                                      <div class="row">
                                          <div class="col-md-1"><i class="mdi mdi-binoculars" style="font-size: 40px;"></i></div>
                                          <div class="col-md-11 pt-3" style="font-size: 16px;">
                                            Inspected List
                                          </div>
                                        </div>
                                  </a>
                                </li>
                              </ul>
                              <div class="tab-content py-0 px-0">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                  <div class="d-flex flex-wrap justify-content-xl-between">
                                        <h5 class="py-3">Inspection Check List :</h5>
                                        
                                      
                                      <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th style="width: 40px;">SL</th>
                                                  <th>Applicant ID</th>
                                                  <th style="width: 240px;">Name</th>
                                                  <th style="width: 240px;">Area</th>
                                                  <th style="width: 140px;">Address</th>
                                                  <th style="width: 140px;">View Application</th>
                                                  <th style="width: 140px;">Schedule Date</th>
                                                  <th style="width: 140px;">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1</td>
                                                  <td>3111</td>
                                                  <td>Md juwel Khondokar</td>
                                                  <td>Dhaka</td>
                                                  <td>25th Nazrul Avenue</td>
                                                  <td><a href="#">View</a></td>
                                                  <td>25-10-11</td>
                                                  <td>
                                                    <a href="report.php" type="button" class="btn btn-sm btn-danger">Report</a>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>3113</td>
                                                  <td>Faruk Molla</td>
                                                  <td>Chittagong</td>
                                                  <td>6th floor, Nawab Mansion, Agrabad</td>
                                                  <td><a href="#">View</a></td>
                                                  <td>02-07-11</td>
                                                  <td>
                                                      <a href="report.php" type="button" class="btn btn-sm btn-danger">Report</a>
                                                  </td>
                                              </tr>
                                              
                                              
                                              
                                              
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <th style="width: 40px;">SL</th>
                                                  <th>Applicant ID</th>
                                                  <th style="width: 240px;">Name</th>
                                                  <th style="width: 240px;">Area</th>
                                                  <th style="width: 140px;">Address</th>
                                                  <th style="width: 140px;">View Application</th>
                                                  <th style="width: 140px;">Schedule Date</th>
                                                  <th style="width: 140px;">Action</th>
                                              </tr>
                                          </tfoot>
                                      </table>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                                  <div class="d-flex flex-wrap justify-content-xl-between">
                                    
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="card pt-2">
                                          <div class="card-body">
                                            <h5 class="py-3">Inspected List :</h5>
                                                    
                                          <!-- table -->
                                          <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                              <thead>
                                                  <tr>
                                                      <th style="width: 100px;">SL</th>
                                                      <th style="width: 240px;">Application ID</th>
                                                      <th style="width: 340px;">Name</th>
                                                      <th style="width: 240px;">Area</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 240px;">View Application</th>
                                                      <th style="width: 240px;">Schedule Date</th>
                                                      <th style="width: 240px;">Report Category</th>
                                                      <th style="width: 140px;">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>1</td>
                                                        <td>3112</td>
                                                        <td>Rasel Mia</td>
                                                        <td>Cumilla</td>
                                                        <td>BSCIC, Cumilla</td>
                                                        <td><a href="#">View</a></td>
                                                        <td>21-09-19</td>
                                                        <td>---</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal" title="View Info">
                                                              View Report
                                                            </button>
                                                            
                                                        </td>
                                                  </tr>
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                    <th style="width: 100px;">SL</th>
                                                    <th style="width: 240px;">Application ID</th>
                                                    <th style="width: 340px;">Name</th>
                                                    <th style="width: 240px;">Area</th>
                                                    <th style="width: 240px;">Address</th>
                                                    <th style="width: 240px;">View Application</th>
                                                    <th style="width: 240px;">Schedule Date</th>
                                                    <th style="width: 240px;">Report Category</th>
                                                    <th style="width: 140px;">Action</th>
                                                  </tr>
                                              </tfoot>
                                          </table>
                                          <!-- table -->
                                          

                                <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                                  <div class="d-flex flex-wrap justify-content-xl-between">
                                    
                                    
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="card pt-2">
                                          <div class="card-body">
                                              
                                          <!-- table -->
        
                                          <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>ID</label>
                                  <input type="text" placeholder="your id" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Type</label>
                                      <select class="form-control">
                                        <option>Select Type</option>
                                        <option>Leather</option>
                                        <option>Chemical</option>
                                        <option>Medicine</option>
                                        <option>Garments Acc.</option>
                                        <option>Plastic</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" placeholder="name here" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" placeholder="" class="form-control">
                                      </div>
                                    </div>
                              <div class="col-md-1">
                                  <div class="form-group">
                                    <input type="submit" value="search" class="btn btn-sm btn-primary mt-4">
                                  </div>
                                </div>
                        </div>
                                          <!-- table -->
                            <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 40px;">SL</th>
                                        <th>ID</th>
                                        <th style="width: 240px;">Name</th>
                                        <th style="width: 240px;">Submission Date</th>
                                        <th style="width: 140px;">View Application</th>
                                        <th style="width: 140px;">Type</th>
                                        <th style="width: 140px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>2</td>
                                        <td>3115</td>
                                        <td>Robiul Hasan</td>
                                        <td>2011/04/25</td>
                                        <td><a href="#">View</a></td>
                                        <td>Leather</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                inspection
                                              </button>
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 40px;">SL</th>
                                        <th>ID</th>
                                        <th style="width: 240px;">Name</th>
                                        <th style="width: 140px;">Submission Date</th>
                                        <th style="width: 140px;">View Application</th>
                                        <th style="width: 140px;">Type</th>
                                        <th style="width: 140px;">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- table -->
                                          </div>
                                        </div>
                          
                                      </div>
                                      
                                    </div>
                                </div>
                              </div>
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

