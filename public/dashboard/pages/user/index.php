<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/bsic.png" />
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  
  <link href="../../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
<style>
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand img{
        width: inherit;
    }

    .progressbar {
      margin: 0;
      padding: 0;
      counter-reset: step;
      z-index: 1!important;
      padding: 10px;
    }
    .progressbar li {
      list-style-type: none;
      width: 12.5%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
    }
    .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
      z-index: 2;
    }
    .progressbar li:after {
      width: 77%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -39%;
      z-index: 1;
    }
    .progressbar li:first-child:after {
      content: none;
    }
    .progressbar li.active {
      color: green;
    }
    .progressbar li.active:before {
      border-color: #55b776;
      background-color: #55b776;
      color: #fff;
    }
    .progressbar li.active + li:after {
      background-color: #55b776;
    }
    .card .card-title{
      margin-bottom: 0px;
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><img src="../../images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/bsic.png" alt="logo"/></a>
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
              <img src="../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">User</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                    <i class="mdi mdi-logout text-primary"></i>
                    Subscribe
                  </a>
                  <a class="dropdown-item">
                      <i class="mdi mdi-logout text-primary"></i>
                      Print Certificate
                    </a>
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
          <li class="nav-item py-3 text-center">
                <div class="button-group">
                  <a href="../user/blog/blog.php" class="btn btn-sm btn-primary">Blog</a>
                  <a href="../user/forum/forum.php" class="btn btn-sm btn-danger">Forum</a>
                </div>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" href="user-registration-from.php">
                <i class="mdi mdi-table menu-icon"></i>
                <span class="menu-title">Register Your Business</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="update-business-info.php">
                  <i class="mdi mdi-table-edit menu-icon"></i>
                  <span class="menu-title">Update Business Information</span>
                </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="user-renew-registration.php">
                  <i class="mdi mdi-sync menu-icon"></i>
                  <span class="menu-title">Apply For Renew</span>
                </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="payment.php">
                  <i class="mdi mdi-currency-usd menu-icon"></i>
                  <span class="menu-title">Payment</span>
                </a>
          </li>
           
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4">
                <a href="needed-contact.php" class="btn btn-sm btn-warning">Contact</a>
            </div>
            <div class="col-md-8 text-right pb-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" title="View Info">
                Review
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
                    <div class="modal-body">
                      <h4>Rate This System</h4>
                      <form>
                        <input id="input-21b" value="4" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg"
                               required title="">
                        <div class="clearfix"></div>
                        <textarea style="width: 100%; padding: 10px; border-radius: 3px;" placeholder="write somthing..."></textarea>
                        <div class="form-group" style="margin-top:10px">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal2" title="View Info">
                Suggestion
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suggestions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <h4>Write a valuable suggestion</h4>
                      <form>
                        
                        <textarea style="width: 100%; padding: 10px; border-radius: 3px;" placeholder="write somthing..."></textarea>
                        <div class="form-group" style="margin-top:10px">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <a href="complaint.php" class="btn btn-sm btn-danger">Complaint</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card " style="box-shadow: 0px 0px 3px #777;">
                <div class="row p-2">
                  <div class="col-md-4">
                      <h4 class="card-title">Tracking Application ID : 345300</h4>
                  </div>
                  <div class="col-md-4 text-center">
                      <h4 class="card-title">Project Name : Golden Moon Bd</h4>
                  </div>
                  <div class="col-md-4 text-right">
                      <button style="font-size: 12px;" title="View Details">View</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <ul class="progressbar">
                      <li class="active">Applied</li>
                      <li>Reviewed</li>
                      <li>Approched for Inspection</li>
                      <li>Inspector Assigned</li>
                      <li>Inspected</li>
                      <li>Approve Review</li>
                      <li>Payment</li>
                      <li>Delivered</li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card " style="box-shadow: 0px 0px 3px #777;">
                  <div class="row p-2">
                    <div class="col-md-4">
                        <h4 class="card-title">Tracking Application ID : 345212</h4>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="card-title">Project Name : TZED Wood Polish Manufacturing Industries</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button style="font-size: 12px;" title="View Details">View</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="progressbar">
                        <li class="active">Applied</li>
                        <li class="active">Reviewed</li>
                        <li class="active">Approched for Inspection</li>
                        <li class="active">Inspector Assigned</li>
                        <li class="active">Inspected</li>
                        <li class="active">Approve Review</li>
                        <li class="active">Payment</li>
                        <li class="active">Delivered</li>
                    </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card" style="box-shadow: 0px 0px 3px #777; height: 300px;">
                <div class="card-title pt-3 pl-3">
                  <h5>Application Checklist</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="../../images/img0.png" style="width: 100%;">
                    </div>
                    <div class="col-md-8">
                      <ul class="list-ticked">
                        <li>Passport Size Photo 1 Copy</li>
                        <li>Copy of valid NID/Smart Card (Verified)</li>
                        <li>Copy of Valid Trade License</li>
                        <li>Existing Industry
                          <ul>
                            <li>M&A, Incorporation Certificate (If Limited Company)</li>
                            <li>Partnership Agreement (If Partnership Company)</li>
                          </ul>
                        </li>
                      </ul>
                      <div class="row">
                        <div class="col-md-12 text-right">
                            <button style="font-size: 12px;">View All</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card" style="box-shadow: 0px 0px 3px #777; height: 300px;">
                <div class="card-title pt-3 pl-3">
                  <h5>Notice Board</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                          <img src="../../images/img00.png" style="width: 100%;">
                        </div>
                        <div class="col-md-8">
                          <ul class="list-ticked">
                            <li>Bijoy Mela 2019</li>
                            <li>Notice for Participating in Bidhannagar Mela (UTSAB) at Kolkata</li>
                            <li>Inviting Application for Allotment of Stall in BSCIC Stall for...</li>
                            <li>Office Order Memo no : 2919</li>
                            <li>Perticipants for Production Improvement and Management Programme...</li>
                          </ul>
                          <div class="row">
                            <div class="col-md-12 text-right">
                                <button style="font-size: 12px;">View All</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>

          

          <div class="row mt-3">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-title p-3">
                  <h5>Application Log Info</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th>
                              Sl
                            </th>
                            <th>Project Name</th>
                            <th>
                                Application ID
                              </th>
                            <th>
                              Application Date
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Reg. ID
                            </th>
                            <th>
                              Expire Date
                            </th>
                            <th>
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1
                            </td>
                            <td>
                              TZED Wood Polish Manufacturing Industries
                            </td>
                            <td>
                                345212
                              </td>
                            <td>
                              10-07-19
                            </td>
                            <td>
                              Registered
                            </td>
                            <td>
                              302638-khudro-1225/2019
                            </td>
                            <td>09-07-23</td>
                            <td>
                              <div class="btn-group">
                                  <button class="" style="font-size: 12px;">Update Info</button><button class="" style="font-size: 12px;">Certificate</button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                              <td>
                                1
                              </td>
                              <td>
                                Golden Moon Bd
                              </td>
                              <td>
                                  345300
                                </td>
                              <td>
                                07-12-19
                              </td>
                              <td>
                                Pending
                              </td>
                              <td>
                                ---
                              </td>
                              <td>---</td>
                              <td>
                                <div class="btn-group">
                                    <button class="" style="font-size: 12px;" disabled>Update Info</button><button class="" style="font-size: 12px;" disabled>Certificate</button>
                                </div>
                              </td>
                            </tr>
                        </tbody>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
  <script src="../../js/dataTables.bootstrap4.js"></script>
  <script src="../../js/star-rating.js" type="text/javascript"></script>
  <script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function (val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function (val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        var $inp = $('#rating-input');

        $inp.rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'lg',
            showClear: false
        });

        $('#btn-rating-input').on('click', function () {
            $inp.rating('refresh', {
                showClear: true,
                disabled: !$inp.attr('disabled')
            });
        });


        $('.btn-danger').on('click', function () {
            $("#kartik").rating('destroy');
        });

        $('.btn-success').on('click', function () {
            $("#kartik").rating('create');
        });

        $inp.on('rating.change', function () {
            alert($('#rating-input').val());
        });


        $('.rb-rating').rating({
            'showCaption': true,
            'stars': '3',
            'min': '0',
            'max': '3',
            'step': '1',
            'size': 'xs',
            'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
        });
        $("#input-21c").rating({
            min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
        });
    });
</script>
</body>

</html>

