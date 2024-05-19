<?php $language = $this->session->userdata("lang_file"); ?>
<div class="content-wrapper">
          
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card"  style="background-color: rgba(75, 280, 120, 0.1); box-shadow: 0px 0px 3px #777;">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Total Summury</a>
            </li>
          </ul>
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                
                

                <div class="d-none d-xl-flex border-left border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item" >
                  <i class="mdi mdi-format-float-left icon-lg mr-3 text-primary"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Completed Service</small>
                    <h5 class="mr-2 mb-0" id="total_application_ds" attrv='' user-data-id="<?= $this->userId ?>" user-data-cat-id=""><?= $complete_service->total;?></h5>
                  </div>
                </div>

                <div class="d-flex border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-format-float-left icon-lg mr-3 text-primary"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total On Process Service</small>
                    <h5 class="mr-2 mb-0"> <?= $process_service->total;?></h5>
                  </div>
                </div>



                <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-format-float-left icon-lg mr-3 text-primary"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted" id="total_renew" attrv='<?= str_pad($array["total_renew"],2,"0", STR_PAD_LEFT) ?>'>Total Pending Service</small>
                    <h5 class="mr-2 mb-0"><?= $pending_service->total;?></h5>
                  </div>
                </div>

                <div class="d-flex py-3 border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account mr-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Employee</small>
                    <h5 class="mr-2 mb-0"><?= $total_emp->total;?></h5>
                  </div>
                </div>

                <div class="d-flex py-3 border-left border-right border-bottom flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-bank mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Company</small>
                    <h5 class="mr-2 mb-0"><?= $total_company->total;?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card linked">
                <a href="<?php echo base_url('admin/profile')?>" style="color: #46c35f;">
              <div class="card-body text-center">
                  <span style="font-size: 78px"><i class="mdi mdi-account-multiple"></i></span>
                  <h5>User Management</h5>
              </div>
              </a>
            </div>
          </div>
            

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card linked" >
            <a href="<?php echo base_url('service/service_type')?>" style="color: #E91E63;">
              <div class="card-body text-center">
                  <span style="font-size: 78px"><i class="mdi mdi-settings"></i></span>
                  <h5>Service Definition</h5>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card linked">
                <a href="<?php echo base_url('reports/tracking_report')?>" style="color: #6a008a;">
              <div class="card-body text-center">
                  <span style="font-size: 78px"><i class="mdi mdi-library"></i></span>
                  <h5>Reports</h5>
              </div>
              </a>
            </div>
          </div>
            
    </div>
  </div>
  
      
  </div>
</div>
<!-- content-wrapper ends -->

<script type="text/javascript">
  
</script>