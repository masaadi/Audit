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
              <div class="card" style="box-shadow:0px 0px 3px #777">
                <div class="card-body p-5">
                  <h4 class="card-title">Add Inspector</h4>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">ID</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="id here" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Name</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" placeholder="name here"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Designation</label>
                            <div class="col-sm-8">
                              <select class="form-control">
                                <option>Select Designation</option>
                                <option>Deputy Manager</option>
                                <option>Extenstion Officer</option>
                                <option>Executive Officer</option>
                              </select>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Department</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                  <option>Department 1</option>
                                  <option>Department 2</option>
                                  <option>Department 3</option>
                                  <option>Department 4</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="mail@gmail.com" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Address</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" placeholder="address here!" />
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Phone</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" placeholder="+88 019 283 3832" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Note</label>
                              <div class="col-sm-8">
                                  <textarea class="form-control"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>Select Type</option>
                                        <option>All</option>
                                        <option>Leather</option>
                                        <option>Chemical</option>
                                        <option>Medicine</option>
                                        <option>Garments Acc.</option>
                                        <option>Plastic</option>
                                      </select>
                                </div>
                              </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Area</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                  <option>Dhaka</option>
                                  <option>Chittagong</option>
                                  <option>Narayanganj</option>
                                  <option>Gazipur</option>
                                  <option>Cumilla</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label"></label>
                              <div class="col-sm-8">
                                <input type="submit" class="btn btn-sm btn-primary">
                              </div>
                            </div>
                          </div>
                      </div>
                   
                  </form>
                  <hr>
                  <h4 class="card-title">Inspector List</h4>
                  <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Id</label>
                            <input type="text" placeholder="your id" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" placeholder="your name" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                <label>Area</label>
                                <select class="form-control">
                                  <option>Select Area</option>
                                  <option>Dhaka</option>
                                  <option>Gazipur</option>
                                  <option>Chittagong</option>
                                  <option>Narayanganj</option>
                                  <option>Cumilla</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Category</label>
                                  <select class="form-control">
                                    <option>Select Category</option>
                                    <option>All</option>
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
                              <label></label>
                              <input type="submit" value="search" class="btn btn-sm btn-primary mt-4">
                            </div>
                          </div>
                  </div>

                  <div class="row">
                    
                    <table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;">SL</th>
                                <th>ID</th>
                                <th style="width: 240px;">Name</th>
                                <th style="width: 240px;">Area</th>
                                <th style="width: 240px;">Category</th>
                                <th style="width: 240px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>006</td>
                                <td>Abul Khayer</td>
                                <td>Chittagong</td>
                                <td>All</td>
                                <td>
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-sm btn-danger btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Delete Info">
                                      <i class="mdi mdi-delete"></i>
                                    </button>
                                  <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="View Info">
                                      <i class="mdi mdi-view-list"></i>
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
                                <td>007</td>
                                <td>Masud Rana</td>
                                <td>Dhaka</td>
                                <td>Plastic</td>
                                <td>
                                  <button type="button" class="btn btn-sm btn-danger btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="Delete Info">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
                                <button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal" title="View Info">
                                    <i class="mdi mdi-view-list"></i>
                                  </button>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 40px;">SL</th>
                                <th>ID</th>
                                <th style="width: 240px;">Name</th>
                                <th style="width: 140px;">Area</th>
                                <th style="width: 140px;">Category</th>
                                <th style="width: 140px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>
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
  <script>
     $(document).ready(function() {
      $('#example').DataTable();
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
} );
  </script>
</body>

</html>

