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
<style>
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }
    ul li{
      line-height: 1!important;
    }
    .nav-tabs .nav-link{
      padding: .2rem 1.5rem .2rem 1.5rem!important;
    }
    .form-group label {
    font-size: 16!important;
    line-height: 1!important;
    vertical-align: top;
    margin-bottom: 0!important;
  }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
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
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/user-img.png" alt="profile"/>
              <span class="nav-profile-name">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a href="../../../index.php" class="dropdown-item">
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
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#generalCon" aria-expanded="false" aria-controls="generalCon">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">General Configuration</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="generalCon">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-1.php"> Organogram </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-2.php"> Service office<br>Registration </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-3.php"> User Registration </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-4.php"> User Verification </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-6.php"> Access Control </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-7.php"> User Account<br>Recovery </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-8.php"> Profile </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-10.php"> Notification </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-11.php"> Document </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-13.php"> Payment </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-1-sub-14.php"> Service & Application<br>Tracking </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#infoService" aria-expanded="false" aria-controls="infoService">
              <i class="mdi mdi-information menu-icon"></i>
              <span class="menu-title">Information Service</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="infoService">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-1.php"> Information<br>Dissemination </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-2.php"> User Subscription </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-3.php"> Feedback & Review </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-4.php"> Complaints<br>Management </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-2-sub-5.php"> Blog and User Forum </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#applicationReg" aria-expanded="false" aria-controls="applicationReg">
              <i class="mdi mdi-application menu-icon"></i>
              <span class="menu-title">Application & Reg.</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="applicationReg">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-1.php"> User Registration </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-2.php"> New/Renew<br>Application </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-3-sub-3.php"> Application<br>Management </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#inspectionApproval" aria-expanded="false" aria-controls="inspectionApproval">
              <i class="mdi mdi-binoculars menu-icon"></i>
              <span class="menu-title">Inspection & Approval</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="inspectionApproval">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-1.php"> Inspector Management </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-2.php"> Inspection Schedule </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-4-sub-3.php"> Inspection Report </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#paymentCer" aria-expanded="false" aria-controls="paymentCer">
              <i class="mdi mdi-currency-usd menu-icon"></i>
              <span class="menu-title">Payment & Certificate</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="paymentCer">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-5-sub-1.php"> Payment </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-5-sub-2.php"> Registration Certificate<br>Delivery </a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ekshopMan" aria-expanded="false" aria-controls="ekshopMan">
              <i class="mdi mdi-shopping menu-icon"></i>
              <span class="menu-title">Ekshop Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ekshopMan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/modules/mod-6-sub-4.php"> Profile Update<br>Sync </a></li>
                </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body p-5">
                  <h4 class="card-title">Information Desimination</h4>
                  <div class="row">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item text-center" style="width: 25%;">
                          <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#headOffice" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                            
                            <div class="row">
                              <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                              <div class="col-md-10 pt-1" style="font-size: 12px;">
                                  BSCIC Head Office
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="nav-item text-center" style="width: 25%;">
                          <a class="nav-link" id="sales-tab" data-toggle="tab" href="#trainingIns" role="tab" aria-controls="sales" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                              <div class="row">
                                  <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                  <div class="col-md-10 pt-1" style="font-size: 12px;">
                                      BSCIC Training Institute
                                  </div>
                                </div>  
                          </a>
                        </li>
                        <li class="nav-item text-center" style="width: 25%;">
                            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#designCenter" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                <div class="row">
                                    <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                    <div class="col-md-10 pt-1" style="font-size: 12px;">
                                        BSCIC Design Center
                                    </div>
                                  </div>   
                            </a>
                          </li>
                          <li class="nav-item text-center" style="width: 25%;">
                              <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#departmentHead" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                  <div class="row">
                                      <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                      <div class="col-md-10 pt-1" style="font-size: 12px;">
                                          Departmental Head(HQ)
                                      </div>
                                    </div>    
                              </a>
                            </li>
                            <li class="nav-item text-center" style="width: 25%;">
                                <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#dhaka" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                    <div class="row">
                                        <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                        <div class="col-md-10 pt-1" style="font-size: 12px;">
                                            Dhaka Office
                                        </div>
                                      </div>    
                                </a>
                              </li>
                              <li class="nav-item text-center" style="width: 25%;">
                                  <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#khulna" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                      <div class="row">
                                          <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                          <div class="col-md-10 pt-1" style="font-size: 12px;">
                                              Khulna Office
                                          </div>
                                        </div>    
                                  </a>
                                </li>
                                <li class="nav-item text-center" style="width: 25%;">
                                    <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#chittagong" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                        <div class="row">
                                            <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                            <div class="col-md-10 pt-1" style="font-size: 12px;">
                                                Chittagong Office
                                            </div>
                                          </div>    
                                    </a>
                                  </li>
                                  <li class="nav-item text-center" style="width: 25%;">
                                      <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#rajshahi" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                          <div class="row">
                                              <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                              <div class="col-md-10 pt-1" style="font-size: 12px;">
                                                  Rajshahi Office
                                              </div>
                                            </div>    
                                      </a>
                                    </li>
                      </ul>
                  </div>
                  <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card" style="box-shadow: 0px 0px 3px #777;">
                            <div class="card-body dashboard-tabs p-0">
                              
                              <!-- <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">New Applications</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">Re-new Applications</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">Resubmission</a>
                                </li>
                              </ul> -->
                              <div class="tab-content py-0 px-0">
                                <div class="tab-pane fade show active" id="headOffice" role="tabpanel" aria-labelledby="overview-tab">
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="card pt-2">
                                          <div class="card-body">
                                            
                                            
                                              
                                          <!-- table -->
                                          <div class="row">
                                            <h5 class="p-3">BSCIC Head Office</h5>
                                      <div class="col-md-12">
                                          <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                              <thead>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>1</td>
                                                      <td>---</td>
                                                      <td>Head Office</td>
                                                      <td>137-38, Motijhil C/A, Dhaka - 1000</td>
                                                      <td>02-9556191-92</td>
                                                  </tr>
                                                  
                                                 
                                                  
                                                  
                                                  
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </tfoot>
                                          </table>
                                          <!-- table -->
        
                                          <div class="row p-3">
                                            <div class="col-md-9">
                                              
                                            </div>
                                            <div class="col-md-3">
                                              <nav aria-label="Page navigation example" class="">
                                                <ul class="pagination justify-content-center">
                                                  <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                  </li>
                                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                  <li class="page-item">
                                                    <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                  </li>
                                                </ul>
                                              </nav>
                                            </div>
                                          </div>
                                          
                                          </div>
                                        </div>
                          
                                      </div>
                                      
                                    </div>
                                          
                          
                                      </div>
                                      
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="trainingIns" role="tabpanel" aria-labelledby="sales-tab">
                                  
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="card pt-2">
                                          <div class="card-body">
                                            
                                            
                                              
                                          <!-- table -->
                                          <div class="row">
                                              <h5 class="p-3">BSCIC Training Institute</h5>
                                      <div class="col-md-12">
                                          <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                              <thead>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>1</td>
                                                      <td>---</td>
                                                      <td>Training Center</td>
                                                      <td>House No:24/A, Road No: 13/A, Sector : 6, Uttora Model Town, Dhaka - 1230</td>
                                                      <td>02-8913684</td>
                                                  </tr>
                                                  
                                                 
                                                  
                                                  
                                                  
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </tfoot>
                                          </table>
                                          <!-- table -->
        
                                          <div class="row p-3">
                                            <div class="col-md-9">
                                              
                                            </div>
                                            <div class="col-md-3">
                                              <nav aria-label="Page navigation example" class="">
                                                <ul class="pagination justify-content-center">
                                                  <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                  </li>
                                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                  <li class="page-item">
                                                    <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                  </li>
                                                </ul>
                                              </nav>
                                            </div>
                                          </div>
                                          
                                          </div>
                                        </div>
                          
                                      </div>
                                      
                                    </div>
                                          
                          
                                      </div>
                                      
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="designCenter" role="tabpanel" aria-labelledby="purchases-tab">
                                  
                                  <div class="row">
                                      
                                      <div class="col-md-12">
                                        <div class="card pt-2">
                                          <div class="card-body">
                                              <h5 class="p-3">BSCIC Design Center</h5>
                                          <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                              <thead>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td>1</td>
                                                      <td>Chief Designer</td>
                                                      <td>Design Center</td>
                                                      <td>BSCIC Head Office, 137-38, Motijhil C/A, 2nd Floor, Dhaka-1000</td>
                                                      <td>02-9553112</td>
                                                  </tr>
                                                  
                                                 
                                                  
                                                  
                                                  
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                      <th style="width: 40px;">SL</th>
                                                      <th style="width: 140px;">Contact Person</th>
                                                      <th style="width: 240px;">Office Type</th>
                                                      <th style="width: 240px;">Address</th>
                                                      <th style="width: 140px;">Phone No.</th>
                                                  </tr>
                                              </tfoot>
                                          </table>
                                          <!-- table -->
        
                                          <div class="row p-3">
                                            <div class="col-md-9">
                                              
                                            </div>
                                            <div class="col-md-3">
                                              <nav aria-label="Page navigation example" class="">
                                                <ul class="pagination justify-content-center">
                                                  <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                  </li>
                                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                  <li class="page-item">
                                                    <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                  </li>
                                                </ul>
                                              </nav>
                                            </div>
                                          </div>
                                          
                                          </div>
                                        </div>
                          
                                      </div>
                                      
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="departmentHead" role="tabpanel" aria-labelledby="purchases-tab">
                                    
                                    <div class="card-body ">
                                        <h5 class="mt-3 mb-3">Departmental Head</h5>
                                        <div class="row">
                                          <div class="col-md-12">
                                              <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1" title="View Info">
                                                  Add New Officer
                                                </button>
                                          </div>
                                          
                                          
                                        </div>
                                        <div class="row text-right">
                                            <div class="col-md-12"><h6 class="mt-3 mb-3">(Seniority is not in Order)</h6></div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        
                                          
                                          
                                      <!-- table -->
                                      
                                      <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th style="width: 40px;">SL</th>
                                                  <th style="width: 240px;">Office Name</th>
                                                  <th style="width: 140px;">Contact Person</th>
                                                  <th style="width: 240px;">Designation</th>
                                                  <th style="width: 240px;">Address</th>
                                                  <th style="width: 140px;">Phone No.</th>
                                                  <th style="width: 140px;">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1</td>
                                                  <td>Head Office</td>
                                                  <td>Md Mustaq Hasan</td>
                                                  <td>Chairman, Additional Secretary</td>
                                                  <td>---</td>
                                                  <td>02-9565612</td>
                                                  <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                      </button>
                                                      
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body" style="text-align: center;">
                                                              <h4>Md juwel Khondokar</h4>
                                                              <span>
                                                                <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                <i class="mdi mdi-star-half icon-lg mr-3 text-success"></i>
                                                                <i class="mdi mdi-star-outline icon-lg mr-3 text-success"></i>
                                                                <h4>3.5</h4>
                                                              </span>
                                                              <br>
                                                              <div class="badge text-wrap p-3" style="width: 400px; font-size: 18px;">
                                                                  This text should wrap.This text should wrap.This text should wrap.This text should wrap.
                                                                </div>
                                                            
                                                              <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" style="border: 1px solid blue;"></textarea>
                                                                    <button type="button" class="btn btn-lg btn-primary mt-2" data-dismiss="modal">Feedback</button>
                                                                </div>
                                                              </form>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>Head Office</td>
                                                  <td>Md Abdul Mannan</td>
                                                  <td>Director(Planning & Development), Additional Secretary</td>
                                                  <td>---</td>
                                                  <td>02-9553466</td>
                                                  <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                      </button>
                                                      
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>3</td>
                                                  <td>Head Office</td>
                                                  <td>D. Mohammad Abdus salam</td>
                                                  <td>Director(Technology), Joint Secretary</td>
                                                  <td>---</td>
                                                  <td>02-9553466</td>
                                                  <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                      </button>
                                                      
                                                  </td>
                                              </tr>
                                              
                                              
                                              
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <th style="width: 40px;">SL</th>
                                                  <th style="width: 240px;">Office Name</th>
                                                  <th style="width: 140px;">Contact Person</th>
                                                  <th style="width: 240px;">Designation</th>
                                                  <th style="width: 240px;">Address</th>
                                                  <th style="width: 140px;">Phone No.</th>
                                                  <th style="width: 140px;">Action</th>
                                              </tr>
                                          </tfoot>
                                      </table>
                                      <!-- table -->
    
                                      <div class="row p-3">
                                        <div class="col-md-9">
                                          
                                        </div>
                                        <div class="col-md-3">
                                          <nav aria-label="Page navigation example" class="">
                                            <ul class="pagination justify-content-center">
                                              <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                              </li>
                                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                                              <li class="page-item">
                                                <a class="page-link" href="#" style="width: 80px;">Next</a>
                                              </li>
                                            </ul>
                                          </nav>
                                        </div>
                                      </div>
                                      
                                      </div>
                                  </div>
                                <div class="tab-pane fade" id="dhaka" role="tabpanel" aria-labelledby="purchases-tab">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                          <div class="card pt-2">
                                            <div class="card-body">
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1" title="View Info">
                                                  Add New Office
                                                </button>
                                                
                                              <div class="card">
                                                  <div class="card-body">
                                                     
                                                      
                                                    <div class="row">
                                                      <div class="col-md-4"> <h5 class="p-3">Dhaka Office</h5></div>
                                                      <div class="col-md-2"></div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label>Office Name</label>
                                                                <input type="text" placeholder="office name" class="form-control">
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <label>Office Type</label>
                                                                  <select class="form-control">
                                                                    <option>Select Type</option>
                                                                    <option>Regional Office</option>
                                                                    <option>Divisional Office</option>
                                                                    <option>District Office</option>
                                                                    <option>Upazila Office</option>
                                                                    <option>Union Office</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label></label>
                                                                <input type="submit" value="search" class="btn btn-sm btn-primary mt-3">
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                            <!-- table -->
                                            
                                            <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Dhaka Regional Office</td>
                                                        <td>Md Ahsan Hakim</td>
                                                        <td>Regional</td>
                                                        <td>---</td>
                                                        <td>02-9560797</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" style="text-align: center;">
                                                                    <h4>Md juwel Khondokar</h4>
                                                                    <span>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-half icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-outline icon-lg mr-3 text-success"></i>
                                                                      <h4>3.5</h4>
                                                                    </span>
                                                                    <br>
                                                                    <div class="badge text-wrap p-3" style="width: 400px; font-size: 18px;">
                                                                        This text should wrap.This text should wrap.This text should wrap.This text should wrap.
                                                                      </div>
                                                                  
                                                                    <form>
                                                                      <div class="form-group">
                                                                          <textarea class="form-control" style="border: 1px solid blue;"></textarea>
                                                                          <button type="button" class="btn btn-lg btn-primary mt-2" data-dismiss="modal">Feedback</button>
                                                                      </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Dhaka</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>128, Motijhil, C/A, Dhaka-1000</td>
                                                        <td>02-9555313</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Maymanshing</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Maskanda, Maymanshing</td>
                                                        <td>091-66853</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- table -->
          
                                            <div class="row p-3">
                                              <div class="col-md-9">
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <nav aria-label="Page navigation example" class="">
                                                  <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                    </li>
                                                  </ul>
                                                </nav>
                                              </div>
                                            </div>
                                            
                                            </div>
                                          </div>
                            
                                        </div>
                                        
                                      </div>
                                  </div>
                                <div class="tab-pane fade" id="khulna" role="tabpanel" aria-labelledby="purchases-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="card pt-2">
                                            <div class="card-body">
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1" title="View Info">
                                                  Add New Office
                                                </button>
                                                
                                              <div class="card">
                                                  <div class="card-body">
                                                     
                                                      
                                                    <div class="row">
                                                      <div class="col-md-4"> <h5 class="p-3">Khulna Office</h5></div>
                                                      <div class="col-md-2"></div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label>Office Name</label>
                                                                <input type="text" placeholder="office name" class="form-control">
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <label>Office Type</label>
                                                                  <select class="form-control">
                                                                    <option>Select Type</option>
                                                                    <option>Regional Office</option>
                                                                    <option>Divisional Office</option>
                                                                    <option>District Office</option>
                                                                    <option>Upazila Office</option>
                                                                    <option>Union Office</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label></label>
                                                                <input type="submit" value="search" class="btn btn-sm btn-primary mt-3">
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                            <!-- table -->
                                            
                                            <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Khulna Office</td>
                                                        <td>---</td>
                                                        <td>Regional</td>
                                                        <td>334, Sher-e-Bangla Road, Khulna</td>
                                                        <td>041-720373</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" style="text-align: center;">
                                                                    <h4>Md juwel Khondokar</h4>
                                                                    <span>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-half icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-outline icon-lg mr-3 text-success"></i>
                                                                      <h4>3.5</h4>
                                                                    </span>
                                                                    <br>
                                                                    <div class="badge text-wrap p-3" style="width: 400px; font-size: 18px;">
                                                                        This text should wrap.This text should wrap.This text should wrap.This text should wrap.
                                                                      </div>
                                                                  
                                                                    <form>
                                                                      <div class="form-group">
                                                                          <textarea class="form-control" style="border: 1px solid blue;"></textarea>
                                                                          <button type="button" class="btn btn-lg btn-primary mt-2" data-dismiss="modal">Feedback</button>
                                                                      </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Jesore</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Jhumjhumpur, Jesore</td>
                                                        <td>0421-66806</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Kushtiya</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Kumargara, Kushtiya</td>
                                                        <td>071-61974</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Potuakhali</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Majhgram, Potuakhali</td>
                                                        <td>0441-62148</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- table -->
          
                                            <div class="row p-3">
                                              <div class="col-md-9">
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <nav aria-label="Page navigation example" class="">
                                                  <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                    </li>
                                                  </ul>
                                                </nav>
                                              </div>
                                            </div>
                                            
                                            </div>
                                          </div>
                            
                                        </div>
                                        
                                      </div>
                                  </div>
                                <div class="tab-pane fade" id="chittagong" role="tabpanel" aria-labelledby="purchases-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="card pt-2">
                                            <div class="card-body">
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1" title="View Info">
                                                  Add New Office
                                                </button>
                                                
                                              <div class="card">
                                                  <div class="card-body">
                                                    
                                                      
                                                    <div class="row">
                                                      <div class="col-md-4"><h5 class="p-3">Chittagong Office</h5></div>
                                                      <div class="col-md-2"></div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label>Office Name</label>
                                                                <input type="text" placeholder="office name" class="form-control">
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <label>Office Type</label>
                                                                  <select class="form-control">
                                                                    <option>Select Type</option>
                                                                    <option>Regional Office</option>
                                                                    <option>Divisional Office</option>
                                                                    <option>District Office</option>
                                                                    <option>Upazila Office</option>
                                                                    <option>Union Office</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label></label>
                                                                <input type="submit" value="search" class="btn btn-sm btn-primary mt-3">
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                            <!-- table -->
                                            
                                            <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Chittagong Office</td>
                                                        <td>---</td>
                                                        <td>Regional</td>
                                                        <td>17 Agrabad B/A, Chottogram</td>
                                                        <td>031-714918</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" style="text-align: center;">
                                                                    <h4>Md juwel Khondokar</h4>
                                                                    <span>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-half icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-outline icon-lg mr-3 text-success"></i>
                                                                      <h4>3.5</h4>
                                                                    </span>
                                                                    <br>
                                                                    <div class="badge text-wrap p-3" style="width: 400px; font-size: 18px;">
                                                                        This text should wrap.This text should wrap.This text should wrap.This text should wrap.
                                                                      </div>
                                                                  
                                                                    <form>
                                                                      <div class="form-group">
                                                                          <textarea class="form-control" style="border: 1px solid blue;"></textarea>
                                                                          <button type="button" class="btn btn-lg btn-primary mt-2" data-dismiss="modal">Feedback</button>
                                                                      </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Cumilla</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Ashoktala, Cumilla</td>
                                                        <td>0821-2870374</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Noakhali</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Maizdi Bazar, Noakhali</td>
                                                        <td>0373-8000316</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- table -->
          
                                            <div class="row p-3">
                                              <div class="col-md-9">
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <nav aria-label="Page navigation example" class="">
                                                  <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                    </li>
                                                  </ul>
                                                </nav>
                                              </div>
                                            </div>
                                            
                                            </div>
                                          </div>
                            
                                        </div>
                                        
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="rajshahi" role="tabpanel" aria-labelledby="purchases-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="card pt-2">
                                            <div class="card-body">
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1" title="View Info">
                                                  Add New Office
                                                </button>
                                                
                                              <div class="card">
                                                  <div class="card-body">
                                                    
                                                      
                                                    <div class="row">
                                                      <div class="col-md-4"><h5 class="p-3">Rajshahi Office</h5></div>
                                                      <div class="col-md-2"></div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label>Office Name</label>
                                                                <input type="text" placeholder="office name" class="form-control">
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <label>Office Type</label>
                                                                  <select class="form-control">
                                                                    <option>Select Type</option>
                                                                    <option>Regional Office</option>
                                                                    <option>Divisional Office</option>
                                                                    <option>District Office</option>
                                                                    <option>Upazila Office</option>
                                                                    <option>Union Office</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label></label>
                                                                <input type="submit" value="search" class="btn btn-sm btn-primary mt-3">
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                            <!-- table -->
                                            
                                            <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Rajshahi</td>
                                                        <td>---</td>
                                                        <td>Regional</td>
                                                        <td>Sopura, Rajshahi</td>
                                                        <td>01721-760514</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" style="text-align: center;">
                                                                    <h4>Md juwel Khondokar</h4>
                                                                    <span>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-half icon-lg mr-3 text-success"></i>
                                                                      <i class="mdi mdi-star-outline icon-lg mr-3 text-success"></i>
                                                                      <h4>3.5</h4>
                                                                    </span>
                                                                    <br>
                                                                    <div class="badge text-wrap p-3" style="width: 400px; font-size: 18px;">
                                                                        This text should wrap.This text should wrap.This text should wrap.This text should wrap.
                                                                      </div>
                                                                  
                                                                    <form>
                                                                      <div class="form-group">
                                                                          <textarea class="form-control" style="border: 1px solid blue;"></textarea>
                                                                          <button type="button" class="btn btn-lg btn-primary mt-2" data-dismiss="modal">Feedback</button>
                                                                      </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Pabna</td>
                                                        <td>---</td>
                                                        <td>District Office</td>
                                                        <td>Hemayetpur, Pabna</td>
                                                        <td>01731-65708</td>
                                                        <td>
                                                          <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Edit Info">
                                                              <i class="mdi mdi-tooltip-edit"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 40px;">SL</th>
                                                        <th style="width: 240px;">Office Name</th>
                                                        <th style="width: 140px;">Contact Person</th>
                                                        <th style="width: 240px;">Office Type</th>
                                                        <th style="width: 240px;">Address</th>
                                                        <th style="width: 140px;">Phone No.</th>
                                                        <th style="width: 140px;">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- table -->
          
                                            <div class="row p-3">
                                              <div class="col-md-9">
                                                
                                              </div>
                                              <div class="col-md-3">
                                                <nav aria-label="Page navigation example" class="">
                                                  <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" style="width: 80px;">Next</a>
                                                    </li>
                                                  </ul>
                                                </nav>
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

                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©2020 All rights reserved by BSCIC <br>
              Technical Support by <img src="../../images/a2i-new-logo_Aug2018-300x300.png" style="width: 40px;"> </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by <br><a href="http://syntechbd.com">Syntech Solutions Ltd.</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Add Office Here</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                              <div class="row">
                                                                <div class="col-md-5 mx-3">
                                                                    <div class="form-group row">
                                                                        <label for="message-text" class="col-form-label">Office Name</label>
                                                                        <input type="text" class="form-control" id="recipient-name" placeholder="office name">
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="message-text" class="col-form-label">Address</label>
                                                                          <textarea class="form-control"  placeholder="address here"></textarea>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-5 mx-3">
                                                                    <div class="form-group row">
                                                                        <label for="recipient-name" class="col-form-label">Contact Person</label>
                                                                        <input type="text" class="form-control"  placeholder="ontact person">
                                                                      </div>
                                                                      
                                                                        <div class="form-group row">
                                                                            <label for="message-text" class="col-form-label">Designation</label>
                                                                            <input type="text" class="form-control"  placeholder="designation">
                                                                          </div>
                                                                          <div class="form-group row">
                                                                              <label for="message-text" class="col-form-label">Phone No.</label>
                                                                              <input type="text" class="form-control"  placeholder="0192*****87">
                                                                            </div>
                                                                </div>
                                                              </div>
                                                                
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <input type="submit" value="submit" class="btn btn-sm btn-primary ml-2">
                                                                  </div>
                                                              </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
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
</body>

</html>

