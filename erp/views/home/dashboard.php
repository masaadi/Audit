<style type="text/css">
    .event
    {
        color: white;
    }
    .event:hover
    {
        color: white;
        cursor:pointer;
    }
</style>
<div class="container-fluid">   
            <div class="block-header">
                <h2>MODULES</h2>
            </div>
            <div class="row">
            <?php
             $user_id = $this->userId;
              if($this->office_id>0){               
               if($this->division_head==1){
                   $flag = 1;
                   $param = $this->office_id;
                   $tname = "ADD_WING_WISE_PRIVILEGE";
                   $cond = "OFFICE_ID = '$this->office_id'";              
                   
               }
               else if($this->office_head==1){
                   $flag = 2;
                   $param = $this->office_id;
                   $cond = "OFFICE_ID = '$this->office_id'";
                   $tname = "ADD_OFFICE_HEAD_PRIVILEGE";                   
                   
               }
               else if($this->e_role_id>0){
                   $flag = 3;
                   $param = $this->e_role_id;
                   $cond = "ROLE_ID = '$this->e_role_id'";
                   $tname = "ADD_ROLE_WISE_PRIVILEGE";                 
               }
               else{
                  $flag = 4;
                  $param = $user_id;
                  $cond = "USER_ID = '$user_id'";
                  $tname = "USER_MENU_PRIVILEGE";
               }
                
            }
            else{
                $flag = 4;
                $param = $user_id;
                $cond = "USER_ID = '$user_id'";
                $tname = "USER_MENU_PRIVILEGE";
               
            }

            $module_array = usermodule_by_id($param,$flag); 
           //  $module_array = usermodule_by_id($user_id,4);             
            //echo "<pre>";print_r($module_array);die();            
             foreach ($module_array as $temp){
                $icon_name = $this->Shows->getNameById("ID = '$temp->ID'","MASTER_MODULE","ICON_NAME") ;
                $icon_class = $this->Shows->getNameById("ID = '$temp->ID'","MASTER_MODULE","ICON_CLASS") ;
                 ?>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-<?php echo $icon_class;?>"><?php echo $icon_name;?></i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:8px">
                            <?php 
                            $language = $this->session->userdata('lang_file');
                             if ($language == "bn") { echo ucfirst($temp->SHORT_NAME_BN); }
                             else{ echo ucfirst($temp->SHORT_NAME); }                       
                             ?> 
                            
                            </div> 
                        </div>
                    </div>
                 </div>             
                 
            <?php    
             }
            
            ?>          
             
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>NOTICE <span style="color:green;">(<?php echo count($unread_notice);?>)</span></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOTICE</th>
                                            <th>Notice Date</th>
                                            <th>Action</th>
<!--                                             <th>Progress</th>
 -->                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($notice){?>
                                        <?php foreach($notice as $key=>$row_notice){?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <td><span class="label bg-green"><a class="event" onclick="view_notice(<?php echo $row_notice['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"><?php echo $row_notice['NOTICE_TITLE'];?></a></span></td>
    
                                            <td><?php echo $row_notice['NOTICE_DATE'];?></td>
                                            <td><button   type="button" class="btn btn-primary waves-effect" title="View"  onclick="view_notice(<?php echo $row_notice['ID']?>)"  data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                                                    data-keyboard="false"><i class="material-icons" >visibility</i></button></td>
                                            
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>EVENT <span style="color: green;">(<?php echo count($unread_event);?>)</span></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Event Title</th>
                                            <th>Start Date</th>
                                            <!-- <th>Event Time</th> -->
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($event){?>
                                        <?php foreach($event as $key=>$row_event){?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <td><span class="label bg-green"><a class="event" onclick="view_event(<?php echo $row_event['ID']?>)" data-toggle="modal" data-target="#targetModal" data-backdrop="static"><?php echo $row_event['EVENT_TITLE'];?></a></span></td>
                                            <td><?php echo $row_event['START_DATE'];?></td>
                                           <!--  <td><?php echo $row_event['EVENT_TIME'];?></td> -->
                                            <td><button   type="button" class="btn btn-primary waves-effect" title="View"  onclick="view_event(<?php echo $row_event['ID']?>)"  data-toggle="modal" data-target="#targetModal" data-backdrop="static"
                data-keyboard="false"><i class="material-icons" >visibility</i></button></td>
                                            
                                        </tr>
                                    <?php } ?>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
               <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Pie Chart</h2>
                        </div>
                        <div class="body">
                            <div class="flotchart-container">
                                <div id="pie"></div>

                                <script src="<?php echo base_url();?>/public/js/d3chart/d3min.js"></script>
                                <script src="<?php echo base_url();?>/public/js/d3chart/d3pie.js"></script>

                                <script>
                                    var pie = new d3pie("pie", {
                                        size: {
                                            pieOuterRadius: "100%",
                                            canvasWidth: 485,
                                            canvasHeight: 275
                                        },
                                        data: {
                                            sortOrder: "value-asc",
                                            smallSegmentGrouping: {
                                                enabled: true,
                                                value: 2,
                                                valueType: "percentage",
                                                label: "Other birds",
                                                color: "#999999"
                                            },
                                            content: [
                                                {
                                                    label: "Head Office",
                                                    value: 3
                                                                    },
                                                {
                                                    label: "Sub Office",
                                                    value: 2
                                                                    },
                                                {
                                                    label: "Wing 1",
                                                    value: 1
                                                                    },
                                                {
                                                    label: "Wing 2",
                                                    value: 1
                                                                    },
                                                {
                                                    label: "Wing 3",
                                                    value: 1
                                                                    },
                                                {
                                                    label: "Wing 4",
                                                    value: 1
                                                                    },
                                                {
                                                    label: "Wing 5",
                                                    value: 1
                                                                    },
                                            ]
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- #END# Browser Usage -->
            </div>
            </div>

             <div class="modal" id="targetModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">

                            <div id="load_modal_content">
                                <!-- dynamic content go here... -->
                            </div>

                        </div>
                    </div>
            </div>
            <script>
    // load dynamic view for adding section master 
      function view_event(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/welcome/view_event_data/' + id,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    console.log('ok');
                     //$('#eventList').html("");
                     $('#basic_info').modal('show');
                    $('#load_modal_content').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        //return false;
    }
    function view_notice(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/welcome/view_notice_data/' + id,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    console.log('ok');
                     //$('#eventList').html("");
                     $('#basic_info').modal('show');
                    $('#load_modal_content').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        //return false;
    }


    function view_event_modal_close(id) {
        location.reload();
    }
    function view_notice_modal_close(id) {
        location.reload();
    }

</script>
       