<!-- Left Sidebar -->
<script type="text/javascript">
    $(document).ready(function () {

        $(document).on("click", ".Refresh", function (event) {
            var module_id = $(this).data("module_id");
            var sub_module_id = $(this).data("sub_module_id");
            var menu_id = $(this).data("menu_id");
            $.post("<?=base_url('language/unseturi');?>",
                {
                    module_id: module_id,
                    sub_module_id: sub_module_id,
                    menu_id: menu_id
                },
                function (data, status) {
                    //$("#ContentView").html(data);
                    window.location.replace(url);
                });

        });


        $(document).on("click", ".menuSelection", function (event) {
            var module_id = $(this).data("module_id");
            var sub_module_id = $(this).data("sub_module_id");
            var menu_id = $(this).data("menu_id");

            $.post("<?=base_url('language/seturi');?>",
                {
                    module_id: module_id,
                    sub_module_id: sub_module_id,
                    menu_id: menu_id
                },
                function (data, status) {
                    //$("#ContentView").html(data);
                });
        });


    });
</script>
<?php
$module_id = $this->session->userdata('module_id');
$sub_module_id = $this->session->userdata('sub_module_id');
$menu_id = $this->session->userdata('menu_id');
?>

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo base_url(); ?>/public/images/user.png" width="48" height="48" alt="User"/></div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
            <div class="email">admin@example.com</div>
        </div>
    </div>

    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span></span></a>
            </li>

            <!--	-----start----->

            <!------end----->
            <?php
            $activeTab = "";
            $module_array = $this->Shows->getThisValue("STATUS = 1", "MASTER_MODULE", "", "", "ID ASC");
            foreach ($module_array as $temp) {
                ?>
                <li <?php if (isset($module_id) && ($module_id == $temp->ID)): ?> class="active" <?php endif; ?>>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons"><?php echo $temp->MATERIAL_ICON; ?></i>
                        <span><?php echo $temp->MODULE_NAME; ?> </span> </a>
                    <?php $sub_module_array = $this->Shows->getThisValue("MODULE_ID = '$temp->ID'", "MASTER_SUB_MODULE","","","SORTING_ORDER ASC");?>
                     <ul class="ml-menu">
                         <?php
                    // echo "<pre>";print_r($sub_module_array);
                    foreach ($sub_module_array as $temp_1) {
                        ?>

                            <li <?php if (isset($sub_module_id) && ($sub_module_id == $temp_1->ID)): ?> class="active" <?php endif; ?>>
                                <a href="#" class="menu-toggle">
                                    <span><?php echo $temp_1->SUB_MODULE_NAME; ?></span></a>

                                <ul class="ml-menu">
                                    <?php
                                    $menu_array = $this->Shows->getThisValue("SUB_MODULE_ID = '$temp_1->ID'", "MASTER_MENU","","","SORTING_ORDER ASC");
                                    //echo "<pre>";print_r($menu_array);
                                    foreach ($menu_array as $temp_2) {
                                        ?>
                                        <li <?php if (isset($menu_id) && ($menu_id == $temp_2->ID)): ?> class="active" <?php endif; ?>>
                                            <a class="menuSelection" data-module_id="<?php echo $temp->ID; ?>"
                                               data-sub_module_id="<?php echo $temp_1->ID; ?>"
                                               data-menu_id="<?php echo $temp_2->ID; ?>"
                                               href="<?php echo base_url() . $temp_2->URL; ?>"><?php echo $temp_2->MENU_TITLE; ?></a>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </li>



                    <?PHP } ?>
                     </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="www.syntechbd.com">Syntech Solution Ltd.</a></div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->

