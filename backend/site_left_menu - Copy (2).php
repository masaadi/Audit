<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo base_url(); ?>/public/images/user.png" width="48" height="48" alt="User" />                </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
            <div class="email">admin@example.com</div>
        </div>
    </div>
    <?php
    $module_id = 1;
    $sub_module_id = 1;
    $active_tab = "poll";
    ?>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span></a>
            </li>
           
		<!--	-----start----->
		 <li>
            <a href="#" class="menu-toggle">
                <i class="material-icons">access_alarm</i>
                <span>Administration Management  </span>                        </a>
            <ul class="ml-menu">
                <li>
                    <a href="#" class="menu-toggle">
                        <span>User</span></a>
                       <ul class="ml-menu">
							<li><a href="<?php echo base_url();?>super/user/add">User Create</a></li>
							<li> <a href="manage-duty-schedule.php">User List</a></li>
                       </ul>
                </li>
               
            </ul>
        </li>
		<!------end----->	
		<?php $module_array = $this->Shows->getThisValue("","MODULE");
		foreach($module_array as $temp):?>
		 <li class="active">
            <a href="#" class="menu-toggle">
                <i class="material-icons">access_alarm</i>
                <span><?php echo $temp->MODULE_NAME;?> </span> </a>
				<?php $sub_module_array = $this->Shows->getThisValue("MODULE_ID = '$temp->ID'","SUB_MODULE");
				foreach($sub_module_array as $temp_1):
				  ?>
					<ul class="ml-menu">
						<li class="active">
							<a href="#" class="menu-toggle">
								<span><?php echo $temp_1->SUB_MENU_NAME;?></span></a>
								
							    <ul class="ml-menu">
								<?php
								$menu_array = $this->Shows->getThisValue("SUB_MODULE_ID = '$temp_1->ID'","MENU");
								//echo "<pre>";print_r($menu_array);
				foreach($menu_array as $temp_2):?>
									<li class="active"><a href="<?php echo base_url().$temp_2->URL;?>"><?php echo $temp_2->MENU_NAME;?></a></li>
									
									<?php endforeach;?>
							   </ul>
						</li>
					   
					</ul>
					
					<?PHP endforeach;?>
        </li>
		
		
		
		<?php endforeach;?>
		
		
			

         </ul>
    </div>    
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="www.syntechbd.com">Syntech Solution Ltd.</a> </div>
        <div class="version">
            <b>Version: </b> 1.0.0 </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->

