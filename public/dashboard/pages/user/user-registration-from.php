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

    .progressbar {
      margin: 0;
      padding: 0;
      counter-reset: step;
      z-index: 1!important;
      padding: 30px;
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
    }
    .progressbar li.active + li:after {
      background-color: #55b776;
    }
    .stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 20px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.stepwizard-step{
  width: 25%;
}
.btn-circle {
  width: 40px;
  height: 40px;
  text-align: center;
  padding: 6px;
  font-size: 12px;
  line-height: 1.428571429;
  background: #4d83ff;
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

            <div class="container">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="mdi mdi-account-location"></i></a>
                            <p>1. Contact Information</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="mdi mdi-information-variant"></i></a>
                            <p>2. Business Information</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="mdi mdi-file-document"></i></a>
                            <p>3. Document</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="mdi mdi-eye"></i></a>
                            <p>4. Preview</p>
                        </div>
                    </div>
                </div>
                <form role="form">
                  <!-- step 1 -->
                    <div class="row setup-content" id="step-1" style="width: 100%;">
                      <div class="col-md-12">
                          <div class="card p-3 mb-3" style="background-color: #cbccc6; border-radius: 5px; box-shadow: 0px 0px 3px #3c3c3c;">
                            
                          <h3 class="card-title"> Step 1</h3>
                            <div class="card-body">
                                <div class="row px-5">
                                    <form action="" method="" style="width: 100%;">
                                      <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-sm-12 form-group">
                                            <label>Industrial Organization Name :</label>
                                            <input type="text" placeholder="Enter Organization Name Here.." class="form-control">
                                          </div>
                                        </div>		
                                        <div class="row">
                                          <div class="col-sm-6 form-group">
                                            <label>Phone No :</label>
                                            <input type="text" placeholder="Enter Phone No Here.." class="form-control">
                                          </div>	
                                          <div class="col-sm-6 form-group">
                                            <label>Fax :</label>
                                            <input type="text" placeholder="Enter Fax Here.." class="form-control">
                                          </div>			
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                              <label>Email :</label>
                                              <input type="text" placeholder="Enter Email Address Here.." class="form-control">
                                            </div>
                                          </div>
                                        	<hr>
                                        <div class="row">		
                                            <div class="col-sm-12 form-group">
                                                <label> Office Address</label>
                                                <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                            </div>	
                                        </div>
                                          <div class="row">		
                                              <div class="col-sm-6 form-group">
                                                <label>State</label>
                                                <select class="form-control">
                                                    <option>Select State</option>
                                                    <option>Dhaka</option>
                                                    <option>Chittagong</option>
                                                    <option>Khulna</option>
                                                    <option>Barishal</option>
                                                    <option>Rajshahi</option>
                                                    <option>Sylhet</option>
                                                    <option>Maymansingh</option>
                                                  </select>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                                <label>City</label>
                                                <select class="form-control">
                                                  <option>Select City</option>
                                                  <option>Narayanganj</option>
                                                  <option>Gazipur</option>
                                                  <option>Feni</option>
                                                  <option>Cumilla</option>
                                                  <option>Jessore</option>
                                                  <option>Bagerhat</option>
                                                  <option>Foridpur</option>
                                                  <option>Gaibandha</option>
                                                  <option>Dinazpur</option>
                                                </select>
                                              </div>	
                                            </div>	
                                            <hr>
                                            <div class="row">		
                                                <div class="col-sm-12 form-group">
                                                    <label> Project Address</label>
                                                    <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                                </div>	
                                            </div>
                                            <div class="row">		
                                                <div class="col-sm-6 form-group">
                                                  <label>State</label>
                                                  <select class="form-control">
                                                      <option>Select State</option>
                                                      <option>Dhaka</option>
                                                      <option>Chittagong</option>
                                                      <option>Khulna</option>
                                                      <option>Barishal</option>
                                                      <option>Rajshahi</option>
                                                      <option>Sylhet</option>
                                                      <option>Maymansingh</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                  <label>City</label>
                                                  <select class="form-control">
                                                    <option>Select City</option>
                                                    <option>Narayanganj</option>
                                                    <option>Gazipur</option>
                                                    <option>Feni</option>
                                                    <option>Cumilla</option>
                                                    <option>Jessore</option>
                                                    <option>Bagerhat</option>
                                                    <option>Foridpur</option>
                                                    <option>Gaibandha</option>
                                                    <option>Dinazpur</option>
                                                  </select>
                                                </div>	
                                              </div>
                                              
                                          <hr>
                                        <div class="row">		
                                            <div class="col-sm-6 form-group">
                                              <label>Industry Type</label>
                                              <input type="text" placeholder="Enter Industry Type Here.." class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Business Type</label>
                                                <select class="form-control">
                                                    <option>Select Type</option>
                                                    <option>Limited Company</option>
                                                    <option>Parntership Company</option>
                                                    <option>Single Owner</option>
                                                  </select>
                                            </div>	
                                          </div>	
                                          <hr>
                                          <div class="row">		
                                              <div class="col-sm-6 form-group">
                                                <label>No Of Enterprenure</label>
                                                <select class="form-control">
                                                    <option>Select No</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                  </select>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                                  
                                              </div>	
                                            </div>	
                                            <hr>
                                            <div class="row">		
                                              <div class="col-sm-6 form-group">
                                                <label>Name Of Enterprenure</label>
                                                <input type="text" placeholder="Enter First Name Here.." class="form-control">
                                              </div>
                                              <div class="col-sm-6 form-group">
                                                  <label>.</label>
                                                  <input type="text" placeholder="Enter Last Name Here.." class="form-control">
                                              </div>	
                                            </div>
                                            <div class="row">		
                                              <div class="col-sm-6 form-group">
                                                <label>NID Number</label>
                                                <input type="text" placeholder="Enter NID No Here.." class="form-control">
                                              </div>
                                              <div class="col-sm-6 form-group">
                                                  <label>Birth Certificate No</label>
                                                  <input type="text" placeholder="Enter Birth Certificate No Here.." class="form-control">
                                              </div>	
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                  <label>Phone No :</label>
                                                  <input type="text" placeholder="Enter Phone No Here.." class="form-control">
                                                </div>	
                                                <div class="col-sm-6 form-group">
                                                  <label>Fax :</label>
                                                  <input type="text" placeholder="Enter Fax Here.." class="form-control">
                                                </div>			
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-12 form-group">
                                                    <label>Email :</label>
                                                    <input type="text" placeholder="Enter Email Address Here.." class="form-control">
                                                  </div>
                                                </div>
                                                <div class="row">		
                                                    <div class="col-sm-12 form-group">
                                                        <label> Office Address</label>
                                                        <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                                    </div>	
                                                </div>
                                                <div class="row">		
                                                    <div class="col-sm-6 form-group">
                                                      <label>State</label>
                                                      <select class="form-control">
                                                          <option>Select State</option>
                                                          <option>Dhaka</option>
                                                          <option>Chittagong</option>
                                                          <option>Khulna</option>
                                                          <option>Barishal</option>
                                                          <option>Rajshahi</option>
                                                          <option>Sylhet</option>
                                                          <option>Maymansingh</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                      <label>City</label>
                                                      <select class="form-control">
                                                        <option>Select City</option>
                                                        <option>Narayanganj</option>
                                                        <option>Gazipur</option>
                                                        <option>Feni</option>
                                                        <option>Cumilla</option>
                                                        <option>Jessore</option>
                                                        <option>Bagerhat</option>
                                                        <option>Foridpur</option>
                                                        <option>Gaibandha</option>
                                                        <option>Dinazpur</option>
                                                      </select>
                                                    </div>	
                                                  </div>
                                              

                                      </div>
                                    </form> 
                                    </div>
                            </div>
                          </div>
                          <button class="btn btn-success btn-lg pull-right" type="button" >Save</button>
                          <button class="btn btn-secondary btn-lg pull-right" type="button" >Cancel</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Save and Continue</button>
                      </div>
                    </div>
                  <!-- Step 1 -->

                  <!-- Step 2 -->
                  <div class="row setup-content" id="step-2" style="width: 100%;">
                      <div class="col-md-12">
                          <div class="card p-3 mb-3" style="background-color: #cbccc6; border-radius: 5px; box-shadow: 0px 0px 3px #3c3c3c;">
                            
                          <h3 class="card-title"> Step 2</h3>
                            <div class="card-body">
                                <div class="row px-5">
                                    <form action="" method="" style="width: 100%;">
                                      <div class="col-sm-12">
                                        
                                        <h5>Implementation Time</h5>
                                        <div class="row">
                                          <div class="col-sm-6 form-group">
                                            <label>Month :</label>
                                            <select class="form-control">
                                                <option>Select Month</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                              </select>
                                          </div>	
                                          <div class="col-sm-6 form-group">
                                            <label>Year :</label>
                                            <select class="form-control">
                                                <option>Select Year</option>
                                                <option>1990</option>
                                                <option>1991</option>
                                                <option>1992</option>
                                                <option>1993</option>
                                                <option>1994</option>
                                                <option>1995</option>
                                                <option>1996</option>
                                                <option>1997</option>
                                                <option>1998</option>
                                                <option>1999</option>
                                                <option>2000</option>
                                                <option>2001</option>
                                                <option>2002</option>
                                                <option>2003</option>
                                                <option>2004</option>
                                                <option>2005</option>
                                                <option>2006</option>
                                                <option>2007</option>
                                                <option>2008</option>
                                                <option>2009</option>
                                                <option>2010</option>
                                                <option>2011</option>
                                                <option>2012</option>
                                                <option>2013</option>
                                                <option>2014</option>
                                                <option>2015</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                              </select>
                                          </div>			
                                        </div>
                                        <hr>
                                        <h5>Product Discription</h5>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                              <label>Product/Service :</label>
                                              <input type="text" placeholder="Product/Service" class="form-control">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label>Quantity :</label>
                                                <input type="text" placeholder="Enter Quantity Here.." class="form-control">
                                              </div>
                                              <div class="col-sm-2 form-group">
                                                  <label></label>
                                                  <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6 form-group">
                                                <label>Product/Service :</label>
                                                <input type="text" placeholder="Enter Product/Service Here.." class="form-control">
                                              </div>
                                              <div class="col-sm-4 form-group">
                                                  <label>Quantity :</label>
                                                  <input type="text" placeholder="Enter Quantity Here.." class="form-control">
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label></label>
                                                    <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                  </div>
                                            </div>
                                          <hr>
                                          <h5>Marketing</h5>
                                          <div class="row">
                                              <div class="col-sm-6 form-group">
                                                <label>Local Market :</label>
                                                <input type="text" placeholder="Enter Local Market Here.." class="form-control">
                                              </div>	
                                              <div class="col-sm-6 form-group">
                                                <label>Export Market :</label>
                                                <input type="text" placeholder="Enter Export Market Here.." class="form-control">
                                              </div>			
                                            </div>	
                                            <hr>
                                            <h5>Investment</h5>
                                            <h6 class="pt-3">A. Fixed Assets</h6>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                  <label>Product/Service :</label>
                                                  <input type="text" placeholder="Enter Product/Service Here.." class="form-control">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Quantity :</label>
                                                    <input type="text" placeholder="Quantity" class="form-control">
                                                  </div>
                                                  <div class="col-sm-2 form-group">
                                                      <label></label>
                                                      <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-6 form-group">
                                                    <label>Product/Service :</label>
                                                    <input type="text" placeholder="Product/Service" class="form-control">
                                                  </div>
                                                  <div class="col-sm-4 form-group">
                                                      <label>Quantity :</label>
                                                      <input type="text" placeholder="Quantity" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <label></label>
                                                        <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                      <label>Total Ammount :</label>
                                                      <input type="text" readonly value="000000" class="form-control">
                                                    </div>
                                                  </div>
                                                  <h6 class="pt-3">B. Current Capital</h6>
                                                  <div class="row">
                                                      <div class="col-sm-6 form-group">
                                                        <label>Product/Service :</label>
                                                        <input type="text" placeholder="Enter Product/Service Here.." class="form-control">
                                                      </div>
                                                      <div class="col-sm-4 form-group">
                                                          <label>Quantity :</label>
                                                          <input type="text" placeholder="Enter Quantity Here.." class="form-control">
                                                        </div>
                                                        <div class="col-sm-2 form-group">
                                                            <label></label>
                                                            <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                          </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group">
                                                          <label>Product/Service :</label>
                                                          <input type="text" placeholder="Enter Product/Service Here.." class="form-control">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label>Quantity :</label>
                                                            <input type="text" placeholder="Enter Quantity Here.." class="form-control">
                                                          </div>
                                                          <div class="col-sm-2 form-group">
                                                              <label></label>
                                                              <button class="btn btn-sm btn-primary mt-4">Add More</button>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-sm-12 form-group">
                                                            <label>Total Ammount :</label>
                                                            <input type="text" readonly value="000000" placeholder="Enter Email Address Here.." class="form-control">
                                                          </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group">
                                                              <label>Total Investment :</label>
                                                              <input type="text" readonly value="000000" placeholder="Enter Email Address Here.." class="form-control">
                                                            </div>
                                                          </div>
                                                          <hr>
                                                          <h5>Source & Type of Project Finance :</h5>
                                                          <div class="row">
                                                              <div class="col-sm-6 form-group">
                                                                <label>Local Enterprenure :</label>
                                                                <input type="text" placeholder="Enter Local Enterprenure Here.." class="form-control">
                                                              </div>
                                                              <div class="col-sm-6 form-group">
                                                                  <label>Foregin Enterprenure :</label>
                                                                  <input type="text" placeholder="Enter Foregin Enterprenure Here.." class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 form-group">
                                                                  <label>Total Investment :</label>
                                                                  <input type="text" readonly value="000000" placeholder="" class="form-control">
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-1 form-group">
                                                                    <input type="checkbox" placeholder="" class="form-control">
                                                                </div>
                                                                <div class="col-sm-11 form-group">
                                                                  <label>
                                                                      I/We hereby declare that all of the Information described above is correct, No Information
                                                                      has been Concealed. If any information incorrect the authority I can be cancle the registration
                                                                      and take any kind of administrative and legal action. I/We further declare that we will be obliged to cooperate in all manner of Inspection by the authority.
                                                                  </label>
                                                                </div>
                                                              </div>
                                         
                                      </div>
                                    </form> 
                                    </div>
                            </div>
                          </div>
                          <button class="btn btn-success btn-lg pull-right" type="button" >Save</button>
                          <button class="btn btn-secondary btn-lg pull-right" type="button" >Cancel</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Save and Continue</button>
                      </div>
                    </div>
                  <!-- Step 2 -->

                    <div class="row setup-content" id="step-3" style="width: 100%;">
                            <div class="col-md-12">
                                <div class="card p-3 mb-3" style="background-color: #cbccc6; border-radius: 5px; box-shadow: 0px 0px 3px #3c3c3c;">
                            
                                    <h3 class="card-title"> Step 3</h3>
                                      <div class="card-body">
                                        
                                          <div class="row px-5">
                                              <form action="" method="" style="width: 100%;">
                                                <div class="col-sm-12">
                                                    <h5 class="mb-3">Upload Documents</h5>
                                                  <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                      <label> Passport Size Photo (1 Copy) :</label>
                                                      <div class="row">
                                                        <div class="col-1"><input type="radio" class="form-control"></div>
                                                        <div class="col-5"><input type="text" placeholder="Owner Name" class="form-control"></div>
                                                        <div class="col-3"><input type="file" class=""></div>
                                                        <div class="col-3"><button class="btn btn-sm btn-primary">Add More</button></div>
                                                      </div>
                                                    </div>
                                                  </div>	
                                                  <div class="row">
                                                      <div class="col-sm-12 form-group">
                                                        <label> NID/Smart Card Copy (Verified Copy) : </label>
                                                        <div class="row">
                                                          <div class="col-1"><input type="radio" class="form-control"></div>
                                                          <div class="col-5"><input type="text" placeholder="Owner Name" class="form-control"></div>
                                                          <div class="col-3"><input type="file" class=""></div>
                                                          <div class="col-3"><button class="btn btn-sm btn-primary">Add More</button></div>
                                                        </div>
                                                      </div>
                                                    </div>	
                                                    <div class="row">
                                                        <div class="col-sm-12 form-group">
                                                          <label> Copy of Trade License (Valid) :</label>
                                                          <div class="row">
                                                            <div class="col-1"><input type="radio" class="form-control"></div>
                                                            <div class="col-5"><input type="text" placeholder="License No" class="form-control"></div>
                                                            <div class="col-3"><input type="file" class=""></div>
                                                            <div class="col-3"><button class="btn btn-sm btn-primary">Add More</button></div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-sm-12 form-group">
                                                            <label> M&A (If Limited Company) :</label>
                                                            <div class="row">
                                                              <div class="col-1"><input type="radio" class="form-control"></div>
                                                              <div class="col-5"></div>
                                                              <div class="col-3"><input type="file" class=""></div>
                                                              <div class="col-3"></div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group">
                                                              <label> Incorporation Certificate (If Limited Company) : </label>
                                                              <div class="row">
                                                                <div class="col-1"><input type="radio" class="form-control"></div>
                                                                <div class="col-5"></div>
                                                                <div class="col-3"><input type="file" class=""></div>
                                                                <div class="col-3"></div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-sm-12 form-group">
                                                                <label>  Partnership Agreement (If Partnership Company) :</label>
                                                                <div class="row">
                                                                  <div class="col-1"><input type="radio" class="form-control"></div>
                                                                  <div class="col-5"></div>
                                                                  <div class="col-3"><input type="file" class=""></div>
                                                                  <div class="col-3"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 form-group">
                                                                  <label> Additional Documents :</label>
                                                                  <div class="row">
                                                                    <div class="col-1"><input type="radio" class="form-control"></div>
                                                                    <div class="col-5"><input type="text" placeholder="Document Name" class="form-control"></div>
                                                                    <div class="col-3"><input type="file" class=""></div>
                                                                    <div class="col-3"><button class="btn btn-sm btn-primary">Add More</button></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <h5 class="mt-5">Land & Building Information :</h5>
                                                              <h6 class="mt-5">Land Type</h6>
                                                              <div class="row">
                                                                  <div class="col-sm-12 form-group">
                                                                    <label> Land Type :</label>
                                                                    <div class="row">
                                                                      <div class="col-6"><input type="text" placeholder="Master" class="form-control"></div>
                                                                      <div class="col-6">(Owner/ Heirloom/ Tenant)</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 form-group">
                                                                      <label> Khatian No ( If Owner ) :</label>
                                                                      <div class="row">
                                                                        <div class="col-6"><input type="text" placeholder="Khatian No" class="form-control"></div>
                                                                        <div class="col-6"><input type="file" class=""></div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                      <div class="col-sm-12 form-group">
                                                                        <label>NOC From Heirs ( If Heirloom ) :</label>
                                                                        <div class="row">
                                                                          <div class="col-6"><input type="text" placeholder="No of Heirs" class="form-control"></div>
                                                                          <div class="col-6"><input type="file" class=""></div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-group">
                                                                          <label>Tenantial Agreement ( If Tenant ) :</label>
                                                                          <div class="row">
                                                                            <div class="col-6"><input type="text" placeholder="No Of Year" class="form-control"></div>
                                                                            <div class="col-6"><input type="file" class=""></div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-group">
                                                                          <label>Other Additional Land Documents :</label>
                                                                          <div class="row">
                                                                            <div class="col-6"><input type="text" placeholder="Type of Document" class="form-control"></div>
                                                                            <div class="col-6"><input type="file" class=""></div>
                                                                          </div>
                                                                        </div>
                                                                      </div>

                                                                      <h6 class="mt-5">b) Building Type :</h6>
                                                              <div class="row">
                                                                  <div class="col-sm-12 form-group">
                                                                    <label> Building Type :</label>
                                                                    <div class="row">
                                                                      <div class="col-6"><input type="text" placeholder="Master" class="form-control"></div>
                                                                      <div class="col-6">(Owner/ Heirloom/ Tenant)</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 form-group">
                                                                      <label> Khatian No ( If Owner ) :</label>
                                                                      <div class="row">
                                                                        <div class="col-6"><input type="text" placeholder="Khatian No" class="form-control"></div>
                                                                        <div class="col-6"><input type="file" class=""></div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                      <div class="col-sm-12 form-group">
                                                                        <label>NOC From Heirs ( If Heirloom ) :</label>
                                                                        <div class="row">
                                                                          <div class="col-6"><input type="text" placeholder="No of Heirs" class="form-control"></div>
                                                                          <div class="col-6"><input type="file" class=""></div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-group">
                                                                          <label>Tenantial Agreement ( If Tenant ) :</label>
                                                                          <div class="row">
                                                                            <div class="col-6"><input type="text" placeholder="No Of Year" class="form-control"></div>
                                                                            <div class="col-6"><input type="file" class=""></div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-group">
                                                                          <label>Other Additional Land Documents :</label>
                                                                          <div class="row">
                                                                            <div class="col-6"><input type="text" placeholder="Type of Document" class="form-control"></div>
                                                                            <div class="col-6"><input type="file" class=""></div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                  
                                                  
                                                    
                                                        
                                                        
          
                                                </div>
                                              </form> 
                                              </div>
                                      </div>
                                    </div>
                                <button class="btn btn-success btn-lg pull-right" type="button" >Save</button>
                                <button class="btn btn-secondary btn-lg pull-right" type="button" >Cancel</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Save and Continue</button>
                            </div>
                    </div>
                    <div class="row setup-content" id="step-4" style="width: 100%;">
                            <div class="col-md-12">
                                <div class="card p-3 mb-3">
                            
                                    <h3 class="card-title"> Step 4</h3>
                                      <div class="card-body">
          
                                      </div>
                                    </div>
                                <button class="btn btn-success btn-lg pull-right" type="button" >Save</button>
                                <button class="btn btn-secondary btn-lg pull-right" type="button" >Cancel</button>
                                <button class="btn btn-primary btn-lg pull-right" type="submit" data-toggle="modal" data-target="#exampleModal">Submit</button>
                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <h4>Pay your Application fee : 100 Tk</h4>
                                            <button class="btn btn-sm btn-warning">Pay by Ekpay</button>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                    </div>
                </form>
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

