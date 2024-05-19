
<?php if($posts[0] !=''){ ?>

<div class='text-center mb-2'>
    <!-- <a href="#" id="hrefPrint" class='btn btn-primary btn-sm' onclick="PrintElem('.print_div')"><?= $this->lang->line('print') ?></a> -->
    <a href="<?= base_url() ?>application/preview-pdf/<?= $posts[0]['id'] ?>" class="btn btn-success btn-sm"><?= $this->lang->line('download') ?></a>
</div>


<section class="print_div">
    <div class="container">
        <div  class="content">
            <div class="header">
                <table>
                    <tr>
                        <td>
                            <div class="Clogo">
                                <img src="<?= base_url().'public/uploads/'.$heading[0]['right_logo']?>" width="100" alt="">
                            </div>
                        </td>
                        <td>
                            <?php 
                                $language = $this->session->userdata('lang_file');
                                $head_name=($language=='bn')?$heading[0]['report_heading_name_bn']:$heading[0]['report_heading_name'];
                                $head_address=($language=='bn')?$heading[0]['address_bn']:$heading[0]['address'];
                            ?>
                            <div class="Cname" style="margin-top:-20px">
                                <h3 class="cnheading"><?= $head_name ?></h3>
                                <h3 class="cnheading"><?= $head_address ?></h3>
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="height: 25px;
            background-color: #580100;
            color: #fff;">
                    <table style="width: 100%;color:white">
                        <tr>
                            <td>
                                <div style="margin-right: auto;"><?= $this->lang->line('form_no')?>:   <?php if($language=='bn'): ?><?= isset($posts[0]['application_id'])?  Converter::en_to_bn($posts[0]['application_id'])    :''?> <?php else: ?> <?= isset($posts[0]['application_id'])?  $posts[0]['application_id']    :''?> <?php endif; ?>  </div>
                            </td>
                            <td style="text-align:center"> 
                                <div style="font-weight: bold; padding: 0px 5px 0px 5px;"><?= $this->lang->line('bscic_registration_form') ?></div>
                            </td>
                            <td style="text-align:right">
                                <div ><?= $this->lang->line('date')?>: <?php if($language=='bn'): ?><?= isset($posts[0]['created_date'])? Converter::en_to_bn($posts[0]['created_date']):''?> <?php else: ?><?= isset($posts[0]['created_date'])?$posts[0]['created_date']:''?> <?php endif; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="fixed-assets">
            <table width='100%'>
                <tr> 
                    <td style="border: 0px; width:2in; padding-right: 10px;">
                            <img src="<?= base_url().'public/uploads/'.$posts[0]['photo1']?>" width="100%" height="200px" alt="">
                    </td>
                    <td style="border: 0px;">
                        <div class="">
                        <?php 
                          $language = $this->session->userdata('lang_file');
                          $org_name=($language=='bn')?$posts[0]['org_name_bn']:$posts[0]['org_name'];
                          ?>
                            <table style="border-collapse: collapse;background-color: #F3F3F3;">
                                <tr>
                                    <th width='45%'><?= $this->lang->line('industrial_organization_name')?></th>
                                    <td>
                                        <?= $org_name ?>
                                        <span style="color: #078a30;">
                                            <?php 
                                                if($posts[0]['application_type']==1){
                                                    echo "(".$this->lang->line('proposed').")";
                                                }
                                                elseif($posts[0]['application_type']==2){
                                                    echo "(".$this->lang->line('existing').")";
                                                }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('phone_no')?></th>
                                    <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['phone_no']) : $posts[0]['phone_no'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('fax')?></th>
                                    <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['fax']) : $posts[0]['fax'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('email')?></th>
                                    <td><?= $posts[0]['email']?></td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('office_address')?></th>
                                    <td><?php echo ($language == "bn")?$posts[0]['off_address_bn']:$posts[0]['off_address']?></td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('division')?></th>
                                    <td>
                                    <?php 
                                    $od = $posts[0]['off_division'];
                                    $do = divisionOption();
                                    if(isset($do[$od])&&$od!=''){
                                        echo $do[$od];
                                    }
                                    ?> 
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('district')?></th>
                                    <td>
                                    <?php 
                                        $odis = $posts[0]['off_district'];
                                        $diso = districtOption();
                                        if(isset($diso[$odis])&&$odis!=''){
                                        echo $diso[$odis];
                                        }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?= $this->lang->line('upazila')?></th>
                                    <td>
                                    <?php 
                                        $addr_id = $posts[0]['off_upazila'];
                                        $addr_list = upazilaOption();
                                        if(isset($addr_list[$addr_id])&&$addr_id!=''){
                                        echo $addr_list[$addr_id];
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('project_address')?></h3>
            <table>
                <tbody>
                <tr>
                    <th width='30%'><?= $this->lang->line('project_address')?></th>
                    <td><?php echo ($language == "bn")?$posts[0]['pro_address_bn']:$posts[0]['pro_address']?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('division')?></th>
                    <td>
                    <?php 
                    $od = $posts[0]['pro_division'];
                    $do = divisionOption();
                    if(isset($do[$od])&&$od!=''){
                        echo $do[$od];
                    }
                    ?> 
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('district')?></th>
                    <td>
                    <?php 
                        $odis = $posts[0]['pro_district'];
                        $diso = districtOption();
                        if(isset($diso[$odis])&&$odis!=''){
                        echo $diso[$odis];
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('upazila')?></th>
                    <td>
                    <?php 
                        $addr_id = $posts[0]['pro_upazila'];
                        $addr_list = upazilaOption();
                        if(isset($addr_list[$addr_id])&&$addr_id!=''){
                        echo $addr_list[$addr_id];
                        }
                    ?>
                    </td>
                </tr>
                    <tr>
                        <th> <?= $this->lang->line('industry_type')?></th>
                        <td>
                            <?php 
                            $id = $posts[0]['industry_type'];
                            $list = getOptionIndustryType();
                            if(isset($list[$id])){
                            echo $list[$id];
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <th><?= $this->lang->line('business_type')?></th>
                        <td>
                            <?php 
                            $id = $posts[0]['business_type'];
                            $list = getOptionBusinessType();
                            if(isset($list[$id])){
                            echo $list[$id];
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('entrepreneur_info')?></h3>
            <table>
                <tbody>
                <tr>
                    <th width='30%'><?= $this->lang->line('entrepreneur_no')?></th>
                    <td>
                        <?php 
                        if ($language == "bn"){
                            echo Converter::en_to_bn($posts[0]['no_of_entrepreneur']);
                        }else{
                            echo $posts[0]['no_of_entrepreneur'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('entrepreneur_name')?></th>
                    <td><?php echo ($language == "bn")?$posts[0]['entre_name_bn']:$posts[0]['entre_name']?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('email')?></th>
                    <td><?= $posts[0]['entre_email']?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('phone_no')?></th>
                    <td><?= ($language=='bn') ?Converter::en_to_bn($posts[0]['entre_phone_no']): $posts[0]['entre_phone_no'] ?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('fax')?></th>
                    <td><?= ($language=='bn') ?Converter::en_to_bn($posts[0]['entre_fax']): $posts[0]['entre_fax'] ?></td>
                </tr>

                <tr>
                    <th><?= $this->lang->line('address')?></th>
                    <td><?php echo ($language == "bn")?$posts[0]['entre_off_address_bn']:$posts[0]['entre_off_address']?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('division')?></th>
                    <td>
                    <?php 
                        $od = $posts[0]['entre_division'];
                        $do = divisionOption();
                        if(isset($do[$od])&&$od!=''){
                            echo $do[$od];
                        }
                    ?> 
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('district')?></th>
                    <td>
                    <?php 
                        $odis = $posts[0]['entre_district'];
                        $diso = districtOption();
                        if(isset($diso[$odis])&&$odis!=''){
                        echo $diso[$odis];
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('upazila')?></th>
                    <td>
                    <?php 
                        $addr_id = $posts[0]['entre_upazila'];
                        $addr_list = upazilaOption();
                        if(isset($addr_list[$addr_id])&&$addr_id!=''){
                        echo $addr_list[$addr_id];
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('nid_number')?></th>
                    <td>
                        <?php 
                        if ($language == "bn"){
                            echo Converter::en_to_bn($posts[0]['nid_no']);
                        }else{
                            echo $posts[0]['nid_no'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('birth_certificate_no')?></th>
                    <td>
                        <?php 
                        if ($language == "bn"){
                            echo Converter::en_to_bn($posts[0]['birth_certificate_no']);
                        }else{
                            echo $posts[0]['birth_certificate_no'];
                        }
                        ?>
                        </td>
                    </tr>
                    <?php if(!empty($enterpeneur_info) AND count($enterpeneur_info)>0): ?>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <?php $ic = 1; ?>
                    <?php foreach($enterpeneur_info as $ev): ?>
                        <tr>
                            <th><?= $this->lang->line('name_of_enterprenure')?></th>
                            <td>
                                <?php echo ($language == "bn")?$ev['entre_name_bn']:$ev['entre_name']?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('email')?></th>
                            <td><?= $ev['entre_email']?></td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('phone_no')?></th>
                            <td>
                                <?php 
                                    if ($language == "bn"){
                                        echo Converter::en_to_bn($ev['entre_phone_no']);
                                    }else{
                                        echo $ev['entre_phone_no'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('fax')?></th>
                            <td><?= $ev['entre_fax']?></td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('address')?></th>
                            <td><?php echo ($language == "bn")?$ev['entre_off_address_bn']:$ev['entre_off_address']?></td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('division')?></th>
                            <td>
                                <?php 
                                    $od = $ev['entre_division'];
                                    $do = divisionOption();
                                    if(isset($do[$od])&&$od!=''){
                                        echo $do[$od];
                                    }
                                ?> 
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('district')?></th>
                            <td>
                                <?php 
                                    $odis = $ev['entre_district'];
                                    $diso = districtOption();
                                    if(isset($diso[$odis])&&$odis!=''){
                                    echo $diso[$odis];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('upazila')?></th>
                            <td>
                            <?php 
                                $addr_id = $ev['entre_upazila'];
                                $addr_list = upazilaOption();
                                if(isset($addr_list[$addr_id])&&$addr_id!=''){
                                echo $addr_list[$addr_id];
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('nid_number')?></th>
                            <td>
                                <?php 
                                if ($language == "bn"){
                                    echo Converter::en_to_bn($ev['nid_no']);
                                }else{
                                    echo $ev['nid_no'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('birth_certificate_no')?></th>
                            <td>
                            <?php 
                                if ($language == "bn"){
                                    echo Converter::en_to_bn($ev['birth_certificate_no']);
                                }else{
                                    echo$ev['birth_certificate_no'];
                                }
                            ?>
                            </td>
                        </tr>
                        <?php if(count($enterpeneur_info) != $ic): ?>
                            <tr><td colspan="">&nbsp;</td></tr>
                        <?php endif; ?>

                        <?php $ic++; ?>
                    <?php endforeach;?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if(!empty($posts[0]['year']) && $posts[0]['year']>0): ?>

        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('implementation_time')?></h3>
            <table>
                <tr>
                    <th width='30%'><?= $this->lang->line('month')?></th>
                    <td>
                        <?php 
                        $month = $posts[0]['month'];
                        $all_month = month();
                        if(isset($all_month[$month])){
                            echo $all_month[$month];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('year')?></th>
                    <td>
                        <?php 
                        if ($language == "bn"){
                            echo Converter::en_to_bn($posts[0]['year']);
                        }else{
                            echo $posts[0]['year'];
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?php endif; ?>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('product_discription')?></h3>
            <table>
                <thead>
                    <tr>
                        <th width='30%'><?= $this->lang->line('product_service')?></th>
                        <th><?= $this->lang->line('quantity')?></th>
                        <th><?= $this->lang->line('rate')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach ($business_description as $value) {
                    echo '<tr>';
                    echo '<td>'.$value['product'].'</td>';
                    if($language=='bn'):
                      echo '<td class="">'.Converter::en_to_bn($value['quantity']).'</td>';
                      echo '<td class="">'.Converter::en_to_bn($value['rate']).'</td>';
                    else:
                      echo '<td class="">'.$value['quantity'].'</td>';
                      echo '<td class="">'.$value['rate'].'</td>';

                    endif;
                    echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('annual_raw_material_details')?></h3>
            <table>
                <thead>
                    <tr>
                        <th><?= $this->lang->line('product_service')?></th>
                        <th><?= $this->lang->line('quantity')?></th>
                        <th><?= $this->lang->line('rate')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        if(!empty($business_raw_materials)){
                            foreach ($business_raw_materials as $rmv) {
                            echo '<tr>';
                            echo '<td>'.$rmv['product'].'</td>';
                            if($language=='bn'):
                            echo '<td>'.Converter::en_to_bn($rmv['quantity']).'</td>';
                            echo '<td>'.Converter::en_to_bn($rmv['rate']).'</td>';
                            else:
                            echo '<td >'.$rmv['quantity'].'</td>';
                            echo '<td >'.$rmv['rate'].'</td>';

                            endif;
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div style='page-break-after:always'></div>
    <br>
    <div class="container">
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('marketing')?></h3>
            <table>
                <tr>
                    <th width="50%"><?= $this->lang->line('local_market')?></th>
                    <td><?=    ($language=='bn')?   Converter::en_to_bn($posts[0]['local_market']) : $posts[0]['local_market'] ?></td>
                </tr>
                <tr>
                    <th><?= $this->lang->line('export_market')?></th>
                    <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['export_market']) : $posts[0]['export_market'] ?></td>
                </tr>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('fixed_assets')?></h3>
            <table >
            <thead>
                <tr>
                    <th width="33%"><?=$this->lang->line('item')?></th>
                    <th  width="33%"><?=$this->lang->line('quantity')?></th>
                    <th width="33%"><?=$this->lang->line('total')?></th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    foreach ($business_asset as $value) {
                    echo '<tr>';
                    echo '<td>'.$value['product'].'</td>';
                    if($language=='bn'):
                        echo '<td >'.Converter::en_to_bn($value['quantity']).'</td>';
                    else:
                        echo '<td>'.$value['quantity'].'</td>';
                    endif;

                    if($language=='bn'):
                        echo '<td >'.Converter::en_to_bn($value['total_amt']).'</td>';
                    else:
                        echo '<td >'.$value['total_amt'].'</td>';
                    endif;
                    echo '</tr>';
                    }
                ?>
                <tr>
                    <th colspan="2" style="text-align: right;"><?= $this->lang->line('total')?>:  </th>
                    <td><span><?=   ($language=='bn')? Converter::en_to_bn($posts[0]['fixed_asset_total'])  : $posts[0]['fixed_asset_total']?></span></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg  "><?= $this->lang->line('current_capital')?></h3>
            <table>
                <thead>
                    <tr>
                        <th width="33%"><?=$this->lang->line('item')?></th>
                        <th width="33%" ><?=$this->lang->line('quantity')?></th>
                        <th width="33%" ><?=$this->lang->line('total')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach ($business_capital as $value) {
                    echo '<tr>';
                    echo '<td>'.$value['product'].'</td>';

                    if($language=='bn'):
                        echo '<td >'.Converter::en_to_bn($value['quantity']).'</td>';
                    else:
                        echo '<td>'.$value['quantity'].'</td>';
                    endif;

                    if($language=='bn'):
                        echo '<td >'.Converter::en_to_bn($value['total_amt']).'</td>';
                    else:
                        echo '<td >'.$value['total_amt'].'</td>';
                    endif;
                    echo '</tr>';
                    }
                    ?>
                    <tr>
                        <th colspan="2" style="text-align: right;"><?=$this->lang->line('total')?>: &nbsp; </th>

                        <td><span><?=   ($language=='bn')? Converter::en_to_bn($posts[0]['current_capital_total'])  : $posts[0]['current_capital_total']?></span></td>

                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Add for machine =============================
        ================================================ -->
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('machineries_list')?></h3>
            <h6 class="primary-bg" style="font-size: 17px !important;"><?= $this->lang->line('collected_collectible_from_local')?></h6>
            <table>
                <thead>
                    <tr>
                        <th width="33%"><?=$this->lang->line('machine_name')?></th>
                        <th width="33%" ><?=$this->lang->line('quantity')?></th>
                        <th width="33%" ><?=$this->lang->line('estimated_rate')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $local_qty_total = 0;
                    $local_total = 0;
                    if(!empty($machine_list_local)){
                        foreach ($machine_list_local as $mll) {
                        echo '<tr>';
                        echo '<td>'.$mll['machine_name'].'</td>';

                        if($language=='bn'):
                            echo '<td >'.Converter::en_to_bn($mll['quantity']).'</td>';
                        else:
                            echo '<td>'.$mll['quantity'].'</td>';
                        endif;

                        if($language=='bn'):
                            echo '<td >'.Converter::en_to_bn($mll['estimated_rate']).'</td>';
                        else:
                            echo '<td >'.$mll['estimated_rate'].'</td>';
                        endif;
                        echo '</tr>';
                       // $local_qty_total += $mll['quantity'];
                        $local_total += $mll['estimated_rate'];
                        }
                    }
                    ?>
                    <tr>
                        <th style="text-align: right;"><?=$this->lang->line('total')?>: &nbsp;</th>
                        <td>
                            <span>
                               <!-- ($language=='bn')? Converter::en_to_bn($local_qty_total) : $local_qty_total -->
                            </span>
                        </td>
                        <td>
                            <span>
                                <?=($language=='bn')? Converter::en_to_bn($local_total) : $local_total?>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h6 class="primary-bg" style="font-size: 17px !important;"><?= $this->lang->line('imported_importable')?></h6>
            <table>
                <thead>
                    <tr>
                        <th width="33%"><?=$this->lang->line('machine_name')?></th>
                        <th width="33%" ><?=$this->lang->line('quantity')?></th>
                        <th width="33%" ><?=$this->lang->line('estimated_rate')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $local_for_total = 0;
                    $foreign_total = 0;
                    if(!empty($machineries_imported)){
                        foreach ($machineries_imported as $iml) {
                        echo '<tr>';
                        echo '<td>'.$iml['machine_name'].'</td>';

                        if($language=='bn'):
                            echo '<td >'.Converter::en_to_bn($iml['quantity']).'</td>';
                        else:
                            echo '<td>'.$iml['quantity'].'</td>';
                        endif;

                        if($language=='bn'):
                            echo '<td >'.Converter::en_to_bn($iml['estimated_rate']).'</td>';
                        else:
                            echo '<td >'.$iml['estimated_rate'].'</td>';
                        endif;
                        echo '</tr>';
                       // $local_for_total += $iml['quantity'];
                        $foreign_total += $iml['estimated_rate'];
                        }
                    }
                    ?>
                    <tr>
                        <th style="text-align: right;"><?=$this->lang->line('total')?>: &nbsp;</th>
                        <td>
                            <span>
                                <!-- ($language=='bn')? Converter::en_to_bn($local_for_total) : $local_for_total?> -->
                            </span>
                        </td>
                        <td>
                            <span>
                                <?=($language=='bn')? Converter::en_to_bn($foreign_total) : $foreign_total?>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End add for machine -->
            <!-- start add for manpower -->
            <h3 class="primary-bg"><?= $this->lang->line('total_manpower_of_the_project_if_running')?></h3>
            <h6 class="primary-bg" style="font-size: 17px !important;"><?= $this->lang->line('management')?></h6>
            <table>
                <tbody>
                    <tr>
                        <td style="border: none !important;">
                            <table>
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('local')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($management_employee)?$management_employee->local->male:''?>
                                        </td>
                                        <td class="text-center"><?=($management_employee)?$management_employee->local->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none !important;">
                            <table style="border: none !important;">
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('foreigner')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($management_employee)?$management_employee->foreigner->male:''?>
                                        </td>
                                        <td class="text-center"><?=($management_employee)?$management_employee->foreigner->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h6 class="primary-bg" style="font-size: 17px !important;"><?= $this->lang->line('skilled_semi_skilled_workers_employee')?></h6>
            <table>
                <tbody>
                    <tr>
                        <td style="border: none !important;">
                            <table>
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('local')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($skilled_sem_skl_emp)?$skilled_sem_skl_emp->local->male:''?>
                                        </td>
                                        <td class="text-center"><?=($skilled_sem_skl_emp)?$skilled_sem_skl_emp->local->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none !important;">
                            <table style="border: none !important;">
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('foreigner')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($skilled_sem_skl_emp)?$skilled_sem_skl_emp->foreigner->male:''?>
                                        </td>
                                        <td class="text-center"><?=($skilled_sem_skl_emp)?$skilled_sem_skl_emp->foreigner->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h6 class="primary-bg" style="font-size: 17px !important;"><?= $this->lang->line('unskilled')?></h6>
            <table>
                <tbody>
                    <tr>
                        <td style="border: none !important;">
                            <table>
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('local')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($unskilled_employee)?$unskilled_employee->local->male:''?>
                                        </td>
                                        <td class="text-center"><?=($unskilled_employee)?$unskilled_employee->local->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none !important;">
                            <table style="border: none !important;">
                                <thead>
                                    <th colspan="2" class="text-center"><?= $this->lang->line('foreigner')?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <?=($unskilled_employee)?$unskilled_employee->foreigner->male:''?>
                                        </td>
                                        <td class="text-center"><?=($unskilled_employee)?$unskilled_employee->foreigner->female:''?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End manpower show -->
        </div>
        <!-- End for machine and manpower=================
        ================================================ -->

        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('stpf')?></h3>
                <table>
                    <thead>
                        <tr>
                            <th width="33%"><?= $this->lang->line('title')?></th>
                            <th width="33%">(%)</th>
                            <th width="33%"><?=$this->lang->line('total')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><?= $this->lang->line('total_investment')?></th>
                            <td>100</td>
                            <td class=''><?=  ($language=='bn')? Converter::en_to_bn($posts[0]['total_investment']) :$posts[0]['total_investment'] ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('local_entrepreneur')?></th>
                            <td class=""><?=  ($language=='bn')? Converter::en_to_bn($posts[0]['local_entrepreneur']) :$posts[0]['local_entrepreneur'] ?></td>
                            <td class=""><?=  ($language=='bn')? Converter::en_to_bn($posts[0]['local_entrep_total']) : $posts[0]['local_entrep_total']?></td>
                        </tr>
                        <tr>
                            <th><?= $this->lang->line('foregin_entrepreneur')?></th>
                            <td class=""><?= ($language=='bn')?  Converter::en_to_bn($posts[0]['foreign_entrepreneur']) :$posts[0]['foreign_entrepreneur'] ?></td>
                            <td class=""><?= ($language=='bn')? Converter::en_to_bn($posts[0]['foreign_entrep_total']) : $posts[0]['foreign_entrep_total']?></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="fixed-assets"> 
            <h3 class="primary-bg"><?= $this->lang->line('upload')?> <?= $this->lang->line('document')?></h3>
            <table>
                <thead>
                    <tr>
                        <th width='40%'><?= $this->lang->line('document_type')?></th>
                        <th width='40%'><?= $this->lang->line('text')?></th>
                        <th width='20%' class="text-center"><?= $this->lang->line('file')?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><?= $this->lang->line('nid')?></th>
                        <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['nid_owner_name']) : $posts[0]['nid_owner_name']?></td>
                        <td class="text-center"><?php echo ($posts[0]['photo2']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('birth_certificate')?></th>
                        <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['birth_certificate_no']) : $posts[0]['birth_certificate_no'] ?></td>
                        <td class="text-center"><?php echo ($posts[0]['photo3']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('trade_license')?></th>
                        <td><?= ($language=='bn')? Converter::en_to_bn($posts[0]['license_no']) : $posts[0]['license_no'] ?></td>
                        <td class="text-center"><?php echo ($posts[0]['photo4']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('m_a')?></th>
                        <td>&nbsp;</td>
                        <td class="text-center"><?php echo ($posts[0]['photo5']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('incorporation_certificate')?></th>
                        <td>&nbsp;</td>
                        <td class="text-center"><?php echo ($posts[0]['photo6']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('partnership_agreement')?></th>
                        <td>&nbsp;</td>
                        <td class="text-center"><?php echo ($posts[0]['photo7']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('addtional_document')?></h3>
            <table >
                <thead>
                    <tr>
                        <th><?= $this->lang->line('text')?></th>
                        <th class="text-center"><?= $this->lang->line('file')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($document_additional as $value) {
                            $file=($value['file_name']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>';
                            echo '<tr>';
                            echo '<td>'.$value['title'].'</td>';
                            echo '<td class="text-center">'. $file.'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg"><?= $this->lang->line('land_building_information')?></h3>
            <table>
                <tbody>
                    <tr>
                        <th><?= $this->lang->line('document_type')?></th>
                        <th><?= $this->lang->line('text')?></th>
                        <th class="text-center"><?= $this->lang->line('file')?></th>
                        <th><?= $this->lang->line('document_type')?></th>
                        <th><?= $this->lang->line('text')?></th>
                        <th class="text-center"><?= $this->lang->line('file')?></th>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('land_type')?>(<?php

                            $land_type=$posts[0]['land_type'];

                            if($land_type=='owner'){
                                if($language=='bn'){
                                    echo "মালিক";
                                }else{
                                    echo "Owner";
                                }
                            }elseif($land_type=='heirloom'){
                                if($language=='bn'){
                                    echo "উত্তরাধিকারী";
                                }else{
                                    echo "Heirloom";
                                }
                            }else{
                                if($language=='bn'){
                                    echo "ভাড়াটে";
                                }else{
                                    echo "Tenant";
                                }
                            }

                            ?>)</th>
                        <td><?= $posts[0]['land_type_title']?></td>
                        <td class="text-center"><?php echo ($posts[0]['file_land']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                        <th><?= $this->lang->line('other_aditional_land_document')?></th>
                        <td><?= $posts[0]['land_additional_documents']?></td>
                        <td class="text-center"><?php echo ($posts[0]['file_land_documents']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->lang->line('building_type')?>(<?php

                        $building_type=$posts[0]['building_type'];

                        if($building_type=='owner'){
                            if($language=='bn'){
                                echo "মালিক";
                            }else{
                                echo "Owner";
                            }
                        }elseif($building_type=='heirloom'){
                            if($language=='bn'){
                                echo "উত্তরাধিকারী";
                            }else{
                                echo "Heirloom";
                            }
                        }else{
                            if($language=='bn'){
                                echo "ভাড়াটে";
                            }else{
                                echo "Tenant";
                            }
                        }

                        ?>)</th>
                        <td><?= $posts[0]['building_type_title']?></td>
                        <td class="text-center"><?php echo ($posts[0]['file_building']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                        <th><?= $this->lang->line('other_aditional_building_document')?></th>
                        <td><?= $posts[0]['building_additional_documents']?></td>
                        <td class="text-center" ><?php echo ($posts[0]['file_building_documents']=='')?'<span class="no">✖</span>':'<span class="yes">✔</span>' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p class="text-center text-italic mt-3" style="font-family:italic"><?= $this->lang->line('preview_footer') ?></p>
</section>
<?php } ?>                   

<style type="text/css">
  .content{padding: 0px !important;}
  h1,h2,h3,h4,h5,h6{margin: 5px 0px 3px 0px;}
  h3{
    margin-top: 5px !important;
  }
  .yes{
        font-size:20px;
        color:green;
      }
      .no{
        font-size:20px;
        color:red
      }
    .container{
        max-width: 800px;
        border: 1px solid #580100;
        overflow: hidden;
        padding: 10px;
    }
    .header{
    width: 100%;
    border: 1px solid #580100;
    }
    .Clogo{
    width: 120px;
    float: left;
    padding:8px;
    }
    .Cname{
    padding-top: 20px;
    width: 100%;
    height: 80px;
    }
    .cnheading{
    margin: 2px;
    font-size: 19px;
    font-weight: bold;
    }
    .ftitle{
    width: 100%;
    height: 25px;
    background-color: #580100;
    color: #fff;
    display:flex;
    justify-content: space-around;
    align-items: center;
    }

    .ftitle > div{
    display: inline-block;
    }
    .userSec{
    max-width: 800px;
    height: auto;
    display: flex;
    }

    .primary-bg{
    background-color: #B2B2B2;
    font-size: 20px;
    }
    .fixed-assets table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    background-color: #F3F3F3;
    }

    .fixed-assets td, th {
    text-align: left;
    padding: 1px 0px 1px 0px;
    border: 1px solid #ddd;
    }

</style>

<script type="text/javascript">
  function PrintElem(elem) {
      Popup(jQuery(elem).html());
  }

  function Popup(data) {
      var mywindow = window.open('', 'my div', 'height=1200,width=1000');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="<?= base_url() ?>public/css/preview.css" type="text/css" />');  
      mywindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">');  
      mywindow.document.write('<style type="text/css">.test { color:red; } </style></head><body>');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.print();                        
  }

</script>
<link rel="stylesheet" href="<?= base_url() ?>public/css/preview.css" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
