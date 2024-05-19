<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BSCIC | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/bsic.png" />
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>

  <style type="text/css">
    .title-img{
      background-image: url('../../../images/handcraft.jpg');
      background-size: cover;
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: brown;">
    <div class="container">
      <a class="navbar-brand" href="#">BSCIC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../blog/blog-single.php">BLOG
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../../index.php">BACK TO HOME</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="card title-img mt-5">
    <div class="card-body">
      <div class="container">
        <img src="../../../images/bsic.png" alt="" style="width: 150px;" class="p-3">
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4 text-right">
              <a href="forum-upload.php" class="btn btn-primary">Creat Topic</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>Topic</th>
                      <th>Posts</th>
                      <th>Views</th>
                      <th>Last Post</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Cottage Industry</td>
                      <td>------------------------------------------------------------------------------------------</td>
                      <td>230</td>
                      <td>3</td>
                  </tr>
                  <tr>
                      <td>Certification</td>
                      <td>------------------------------------------------------------------</td>
                      <td>112</td>
                      <td>56</td>
                  </tr>
                  
              </tbody>
              <tfoot>
                  <tr>
                      <th>Topic</th>
                      <th>Posts</th>
                      <th>Views</th>
                      <th>Last Post</th>
                  </tr>
              </tfoot>
          </table>
        </div>
      </div>
  
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
</body>

</html>
