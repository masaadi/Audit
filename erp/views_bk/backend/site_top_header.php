 <!-- partial:partials/_navbar.php -->
    <?php 
    $role_id=$this->session->userdata('DX_role_id');
    $language = $this->session->userdata('lang_file');

    if($role_id==1){
      $link= base_url().'admin/home';
    }
    else if($role_id==2 || $role_id==3){
      $link= base_url().'applicant/home';
    }else {
      $link= base_url().'admin/home';
    }
    ?>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="<?php echo $link;?>"><img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo $link;?>"><img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <span style="font-size: 20px; color:#520e00 ;">Teletalk Bangladesh Limited</span>
            <!-- <img src="images/bsic.png" style="width: 50px;"> -->
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <?php
            $user_id=$this->session->userdata('DX_user_id');
            $emp_info = $this->db->select('job_info.employee_id')->where('users.id',$user_id)->join('job_info','job_info.employee_id = users.employee_id','left')->get('users')->row();
            $employee_id  = $emp_info->employee_id;
            
          ?>
          <!-- notification start -->
          <li class="nav-item dropdown mr-4">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell mx-0"></i> 
                <span class="count text-light">
                  <?php $total_notifi = $this->db->where('employee_id',$employee_id)->where('status',0)->get('notification')->result();
                  echo count($total_notifi);
                  ?>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                
              <?php $total_notifi1 = $this->db->where('employee_id',$employee_id)->where('status',0)->order_by('id','desc')->get('notification')->result();
                $a= 1;
                foreach($total_notifi1 as $val):
              ?>
                <div id="notif_view_<?= $a?>" onclick="change_status('<?= $val->id?>','<?= $a?>')">
                  <a class="dropdown-item" href='<?= base_url() ?>applicant/service_request'>
                    <div class="item-thumbnail">
                      <div class="item-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                    </div>
                    <div class="item-content">
                      <h6 class="font-weight-normal"> Service Notice</h6>
                    </div>
                  </a>
                </div>
              <?php $a++; endforeach;?>
              </div>
            </li>
          
          <!-- notification end -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo base_url();?>public/dashboard/images/user-img.png" alt="profile"/>
              <span class="nav-profile-name">
                <?php //echo ucfirst($this->userName);?>
                <?php 
                  if($this->session->userdata('lang_file')=='bn'){
                    echo ($this->session->userdata('DX_full_name_bn')) ? $this->session->userdata('DX_full_name_bn') : $this->session->userdata('DX_full_name');
                  } else {
                    echo ucfirst($this->session->userdata('DX_full_name'));
                  }
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
             <?php if($role_id==1): ?>
              <a class="dropdown-item"  href="<?php echo base_url();?>admin/change_password">
              <i class="mdi mdi-textbox-password text-primary"></i>
                <?= ($language=='bn')? 'পাসওয়ার্ড পরিবর্তন' : 'Change Password' ?>
              </a>
             <?php else: ?>
              <a class="dropdown-item"  href="<?php echo base_url();?>applicant/change_password">
              <i class="mdi mdi-textbox-password text-primary"></i>
                <?= ($language=='bn')? 'পাসওয়ার্ড পরিবর্তন' : 'Change Password' ?>
              </a>
             <?php endif; ?>

              <a href="<?php echo base_url();?>siteadmin/logout" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                <?= ($language=='bn')? 'লগআউট' : 'Logout' ?>
              </a>
			
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

<script type="text/javascript">
  function change_status(notif_id,row){
      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>applicant/service_registration/change_notifi_status/' + notif_id,
      success: function (result) {
        //alert(result)
      },
      error: function (error) {
        //alert(error)
      }
    });
  }
</script>