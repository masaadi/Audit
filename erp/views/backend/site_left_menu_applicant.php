<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>applicant/home">
                <i class="menu-icon"><img src="<?php echo base_url('public/images/house.png')?>" class="menu-icon" style="width: 18px !important;"></i>
                <span class="menu-title">Dashboard</span>
              </a>
          </li>

        <li class="nav-item active">
          <a class="nav-link" data-toggle="collapse" href="#module_" aria-expanded="false" aria-controls="">
            <!-- <i class="<?php echo $m_icn; ?> menu-icon"></i> -->
            <i class="menu-icon"><img src="<?php echo base_url('public/images/profile.png')?>" class="menu-icon" style="width: 18px !important;"></i>
            <span class="menu-title">Profile</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse show" id="">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/personal_info">Personal Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/job_info">Job Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/seniority_info">Seniority Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/family_info">Family Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/education_info">Education Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/training_info">Training Information</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/qualification_info">Extra Qualification</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" data-toggle="collapse" href="" aria-expanded="false" aria-controls="">
            <i class="menu-icon"><img src="<?php echo base_url('public/images/service.png')?>" class="menu-icon" style="width: 18px !important;"></i>
            <span class="menu-title">Service</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse show" id="">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/service_registration">Service Registration</a></li>

                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()?>applicant/service_request">Service Request</a></li>
            </ul>
          </div>
        </li>
        
        </ul>
      </nav>