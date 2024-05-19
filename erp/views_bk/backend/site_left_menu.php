<?php 
  $empty_module = false;
  $language = $this->session->userdata("lang_file");
  // $privileges = $this->session->userdata('user_privileges');

  $user_id = $this->session->userdata('DX_user_id'); 
  $this->load->model("admin/user_model");
  $user_privilege = $this->user_model->get_user_wise_privilege($user_id);

  $user_privileges = array();
  $m_index = 'module_name';
  if($this->session->userdata("lang_file")=='bn'){
      $m_index = 'module_name_bn';
  }
  if($user_privilege){
      foreach ($user_privilege as $k => $v) {
          $user_privileges[$v[$m_index]."~".$v['module_icon']][] = $v;
      }
  }
  $privileges = $user_privileges;
  //$this->session->set_userdata('user_privileges', $user_privileges);
  $is_inspector = $this->session->userdata('DX_is_inspector');
  $current_url = uri_string(); // for acitve menu Application & reg

?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>admin/home">
        <i class="menu-icon"><img style="width:20px; height:20px" src="<?php echo base_url();?>public/uploads/module_icon/house.png"></i>
        <span class="menu-title"><?php echo ($language =="bn") ? 'ড্যাশবোর্ড' : 'Dashboard';?></span>
      </a>
    </li>

  <?php
    if($privileges):
  ?>
    <?php
      $to_avoid = 1;
      foreach($privileges as $k => $v):
    ?>

      <?php if($k != '~'): ?>
        <?php 
          $explode_key = explode('~', $k); 
          $m_n = $explode_key[0];
          $m_icn = $explode_key[1];

          $module_st_name = 'module_'.$to_avoid;
        ?>
        <li class="nav-item<?php if(($m_n=='Application & Reg.' || $m_n=='আবেদন ও নিবন্ধ') && ($current_url=='admin/new-application' || $current_url=='admin/renew-application' || $current_url=='admin/resubmission' || $current_url=='admin/application-management' || $current_url=='admin/approved-application')) echo ' active'?>">
          <a class="nav-link" data-toggle="collapse" href="#<?php echo $module_st_name; ?>" aria-expanded="false" aria-controls="<?php echo $module_st_name; ?>">
            <!-- <i class="<?php echo $m_icn; ?> menu-icon"></i> -->
            <i class="menu-icon"><img src="<?php echo file_url('module_icon/'.$m_icn)?>" class="menu-icon" style="width: 18px !important;"></i>
            <span class="menu-title"><?php echo $m_n; ?></span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse<?php if(($m_n=='Application & Reg.' || $m_n=='আবেদন ও নিবন্ধ') && ($current_url=='admin/new-application' || $current_url=='admin/renew-application' || $current_url=='admin/resubmission' || $current_url=='admin/application-management' || $current_url=='admin/approved-application')) echo ' show'?>" id="<?php echo $module_st_name; ?>">
            <ul class="nav flex-column sub-menu">
              <?php foreach($v as $k1 => $v1): ?>
                <li class="nav-item"> <a class="nav-link<?php if($m_n=="Application & Reg." || $m_n=="আবেদন ও নিবন্ধ") { if(($current_url=='admin/new-application' || $current_url=='admin/renew-application' || $current_url=='admin/resubmission') && $v1['url']=='admin/application/new') echo ' active'; elseif(($current_url=='admin/application-management' || $current_url=='admin/approved-application') && $v1['url']=='admin/application-management') echo ' active'; }?>" href="<?php echo base_url();?><?php echo $v1['url'];?>"> <?php echo ($language =="bn") ? $v1['menu_name_bn'] : $v1['menu_name'];?> </a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>

      <?php else: ?>
        <?php $empty_module = true; ?>
      <?php endif; ?>

      <?php $to_avoid++; ?>
    <?php endforeach; ?>

    <?php if($empty_module): ?>
      <?php foreach($privileges['~'] as $k1 => $v1): ?>

        <?php if($v1['menu_name'] != 'Dashboard'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?><?php echo $v1['url'];?>">
              <i class="<?php echo $v1['icon']; ?> menu-icon"></i>
              <span class="menu-title"><?php echo ($language =="bn") ? $v1['menu_name_bn'] : $v1['menu_name'];?></span>
            </a>
          </li>
        <?php endif; ?>

      <?php endforeach; ?>
    <?php endif; ?>

  <?php endif; ?>

  <!-- if is inspector  -->
  <?php if($is_inspector == 1): ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>inspector/inspection">
        <i class="mdi mdi-binoculars menu-icon"></i> 
        <span class="menu-title"><?php echo ($language =="bn") ? 'পরিদর্শন তালিকা' : 'Inspection List' ;?></span>
      </a>
    </li>
  <?php endif; ?>

  </ul>
</nav>