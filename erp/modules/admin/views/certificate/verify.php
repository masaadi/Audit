<div class="modal-header">
  <h5 class="modal-title"><?= $this->lang->line('certificate_preview') ?></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <style>
    .container{
        margin: 0 auto;
        max-width: 800px;
        position: relative;
        padding: 5px;
        position: relative;
        box-shadow: 0px 0px 4px #000;
    }
    .container .border{
        margin:20px auto;
        max-width: 750px;
        height: 1050px;
        padding: 3px;
        border: 2px double #27272f;
        position: relative;
    }
    .container .border .content{
        margin:10px auto;
        max-width: 760px;
        height: 1020px;
        padding: 10px;
    }
    .container .border .content .logo{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .container .border .content h1{
        font-size: 25px;
        font-family:fantasy;
        text-transform:capitalize;
        text-align: center;
    }
    .container:after{
        content: "";
        background-image: url('<?= base_url().'public/uploads/'.$heading[0]['right_logo']?>');
        background-size: 50%;
        background-repeat: no-repeat;
        opacity: 0.2;
        position: absolute;
        top: 335px;
        left: 270px;
        bottom: 0;
        right: 0;
    }
    .container .border .content .qrCode{
        display: block;
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;;
        width: 150px;
    }
    .body p span{
        font-weight: bold;
        text-decoration-line: underline;
        text-decoration-style: dotted;
    }
    
    .body p{
        line-height: 30px;
        margin-top: 30px;
        font-size: 13px;
    }
    footer{
        margin-top: 200px;
    }
    .container .border .signboxL{
        width: 140px;
        float: left;
        text-align: center;
        overflow: hidden;
    }
    .container .border .signboxR{
        width: 140px;
        float: right;
        text-align: center;
        overflow: hidden;
    }
    
    .container .border .signbox .sign{
        width: 100px;
    }
    
    .qr img{display: block; width: 100px;}
    .qrcode{
        width: 50px;
        position: absolute;
        top: 775px;
        left: 300px;
    }
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
        font-size: 17px;
        padding: 5px;
    }
    .fixed-assets table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      background-color: #F3F3F3;
      font-size: 12px;

    }

    .fixed-assets td, th {
      text-align: left;
      padding: 1px 0px 1px 0px;
      border: 1px solid #ddd;
    }

    table tr td,th {
        font-size: 12px;
        padding: 1px 0px 1px 0px;
    }
    .my-table tr td,th {
        border: 1px solid #ddd;
    }


  </style>

  <div class="container">
               <div class="border">
                    <div class="content">
                            <?php 
                                $language = $this->session->userdata('lang_file');
                                $head_name=$heading[0]['report_heading_name_bn'];
                                $head_address=$heading[0]['address_bn'];
                            ?>
                        <br>
                        <table width='100%'>
                           <tr>
                              <td style="text-align:center">
                                 <img  src="<?= base_url().'public/uploads/'.$heading[0]['right_logo']?>" alt="" width="80px">
                              </td>
                           </tr>
                        </table>
                        <br>
                        <table width='100%'>
                           <tr>
                              <td style="text-align:center">
                                 <h1 style="font-weight: bold;" class="main-title"> <?=  $head_name ?> </h1>
                              </td>
                           </tr>
                           <tr>
                              <td style="text-align:center">
                                 <h1 style="font-weight: bold;"  class="main-title">( সনদপত্র )</h1>
                              </td>
                           </tr>
                        </table>
                        <br>
                        <div class="body">
                            <p style="margin-left: 10px;">প্রত্যয়ন করা যাচ্ছে যে, প্রস্তাবিত শিল্প কারখানাটি বিসিক কর্তৃক যথাযথভাবে নিবন্ধিত হয়েছে।<br>
                                নিবন্ধন তারিখ: &nbsp;<span></span><br>
                                নিবন্ধন নং: &nbsp;<span></span><br>
                                নিবন্ধিত প্রকল্পের নাম: &nbsp;<span><?= $posts[0]['org_name_bn'] ?></span><br>
                                শিল্পের প্রকৃতি: &nbsp;<span>
                                <?php 
                                    $id = $posts[0]['industry_type'];
                                        $list = getOptionIndustryTypeBangla();
                                        if(isset($list[$id])){
                                        echo $list[$id];
                                    }
                                    ?>
                                </span><br>
                                কারখানার অবস্থান:&nbsp; <span><?= $posts[0]['pro_address_bn'] ?></span><br>

                                প্রস্তাবিত প্রকল্প বাস্তবায়নের সময়সীমা: &nbsp;<span>

                                <?php if(!empty($posts[0]['year']) && $posts[0]['month']>0): ?>

                                <?php 
                                    $month = $posts[0]['month'];
                                    $all_month = monthBangla();
                                    if(isset($all_month[$month])){
                                        echo $all_month[$month];
                                    }
                                ?> /
                                <?php
                                    echo Converter::en_to_bn($posts[0]['year']);
                                ?>
                                <?php endif; ?>
                                 </span>

                                 <br><br>
                                আপনার/আপনাদের ভবিষ্যৎ কর্মপ্রচেষ্টায় সফলতার জন্য আমাদের সক্রিয় সহযোগিতা থাকবে।
                            </p>
                        </div>

                        <footer>
                           <table width='100%'>
                              <tr>
                                 <td style="text-align: center;">
                                    <div id="qrcode"></div>
                                 </td>
                              </tr>
                           </table>
                        </footer>
                        
                    </div>
                </div>
            </div>


<br>

  <div class="container">
     <div class="border">
          <div class="content">
              <?php 
                  $language = $this->session->userdata('lang_file');
                  $head_name=$heading[0]['report_heading_name'];
                  $head_address=$heading[0]['address'];
              ?>
              <br>
              <table width='100%'>
                 <tr>
                    <td style="text-align:center">
                       <img  src="<?= base_url().'public/uploads/'.$heading[0]['right_logo']?>" alt="" width="80px">
                    </td>
                 </tr>
              </table>
              <br>
              <table width='100%'>
                 <tr>
                    <td style="text-align:center">
                       <h1 style="font-weight: bold;font-size: 20px" class="main-title"> <?=  $head_name ?> </h1>
                    </td>
                 </tr>
                 <tr>
                    <td style="text-align:center">
                       <h1 style="font-weight: bold;font-size: 20px"  class="main-title">( Certificate )</h1>
                    </td>
                 </tr>
              </table>
              <br>

              <div class="body">
                  <p style="margin-left: 10px;">
It is to be certified that the  
<?php 
 $hed_text1 = "";
  $hed_text2 = "";
   if($posts[0]['application_type']==1){
      $hed_text = "proposed";
    }
    elseif($posts[0]['application_type']==2){
      $hed_text1 = "existing";
    }
    if($posts[0]['is_renew']){
      $hed_text2 = "renew";
    }
    echo $hed_text1.' '.$hed_text2;
?>
    industrial plant has been duly registered by BSCIC.<br>
                      Registration Date : &nbsp;.</span><br>
                      Registration No : &nbsp;<br>
                      
Name of the Registered Project: &nbsp;<span><?= $posts[0]['org_name'] ?>.</span><br>
                      Industry Type : &nbsp;<span>
                      <?php 
                          $id = $posts[0]['industry_type'];
                              $list = getOptionIndustryTypeEnglish();
                              if(isset($list[$id])){
                              echo $list[$id];
                          }
                          ?>
                      .</span><br>
                      Project Location :&nbsp; <span><?= $posts[0]['pro_address'] ?>.</span><br>
                <?php if(!empty($posts[0]['year']) && $posts[0]['year']>0): ?>

                    Deadline for implementation of the proposed project: &nbsp;<span>
                      <?php 
                          $month = $posts[0]['month'];
                          $all_month = monthEnglish();
                          if(isset($all_month[$month])){
                              echo $all_month[$month];
                          }
                      ?> /
                      <?php
                          echo$posts[0]['year'];
                      ?>                  
                       </span>
                       <?php endif; ?>

                       <br><br>
                      We will have active cooperation for the success of your future endeavors.
                  </p>
              </div>
              <footer>
                 <table width='100%'>
                    <tr>
                       <td style="text-align: center;">
                          <div id="qrcode1"></div>
                          <img id='qrcode_image1' src="">
                       </td>
                    </tr>
                 </table>
              </footer>
          </div>
      </div>
  </div>

<!-- 
      <div class="container">
        <div  class="content">
            <div class="header">
                <table>
                    <tr>
                        <td>
                            <div class="Clogo">
                                <img src="<?= base_url().'public/uploads/'.$heading[0]['right_logo']?>" width="80" alt="">
                            </div>
                        </td>
                        <td>
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
                                <div style="margin-right: auto;">নিবন্ধন সংখা : </div>
                            </td>
                            <td style="text-align:center"> 
                                <div style="font-weight: bold; padding: 0px 5px 0px 5px;">
                                    <?php
                                      $hed_text1 = "";
                                      $hed_text2 = "";
                                      
                                      if($posts[0]['application_type']==1){
                                        $hed_text1 = "প্রস্তাবিত";
                                      }
                                      elseif($posts[0]['application_type']==2){
                                        $hed_text1 = "বিদ্যমান";
                                      }
                                      if($posts[0]['is_renew']){
                                        $hed_text2 = " নবায়নকৃত";
                                      }
                                      $hed_text3 = $hed_text1. " শিল্প প্রকল্পের".$hed_text2." নিবন্ধন পত্র";
                                      echo $hed_text3;
                                    ?>
                                </div>
                            </td>
                            <td style="text-align:right">
                                <div >তারিখ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="fixed-assets">
            <table width='100%' style="margin-top:5px">
                <tr> 
                    <td style="border: 0px;">
                        <div class="">
                           <?php 
                             // $language = $this->session->userdata('lang_file');
                              $org_name=$posts[0]['org_name_bn'];
                           ?>
                            <table style="border-collapse: collapse;background-color: #F3F3F3;">
                                <tr>
                                    <th width='45%'>১। নিবন্ধিত প্রকল্পের নাম (<?= $hed_text1 ?>)</th>
                                    <td><?= $org_name ?></td>
                                </tr>

                                <tr>
                                    <th>২। <?= $hed_text1 ?> প্রকল্পের বাস্তবায়নের সময়সীমা (মাস/বৎসর)</th>
                                    <td>
                                      <?php if(!empty($posts[0]['year']) && $posts[0]['year']>0): ?>
                                        <?php 
                                            $month = $posts[0]['month'];
                                            $all_month = monthBangla();
                                            if(isset($all_month[$month])){
                                                echo $all_month[$month];
                                            }
                                        ?> /
                                        <?php
                                            echo Converter::en_to_bn($posts[0]['year']);
                                        ?>
                                      <?php endif ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>৩। কারখানার অবস্থান (পূর্ণ ঠিকানা)</th>
                                    <td><?= $posts[0]['pro_address_bn'] ?></td>
                                </tr>
                                <tr>
                                    <th>৪। শিল্পের প্রকৃতি</th>
                                    <td>
                                        <?php 
                                        $id = $posts[0]['business_type'];
                                            $list = getOptionIndustryTypeBangla();
                                            if(isset($list[$id])){
                                            echo $list[$id];
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
        <div class="fixed-assets" style="margin-top:5px">
            <h3 class="primary-bg">৫। উৎপন্য পণ্যের বিবরন ও বার্ষিক  উৎপাদন ক্ষমতা</h3>
            <table>
                <tbody>
                  <tr>
                     <th style="text-align: center;" rowspan="2">ক্রমিক নং</th>
                     <th style="text-align: center;" rowspan="2">পণ্য/সেবা</th>
                     <th style="text-align: center;" colspan="2">বার্ষিক  উৎপাদন ক্ষমতা ১০০%</th>
                  </tr>
                  <tr>
                     <th style="text-align: center;" >পরিমাণ</th>
                     <th style="text-align: center;" >মূল্য (টাকা)</th>
                  </tr>

                    <?php  
                        $total_product_amount=0;
                        foreach ($business_description as $key=>$value):
                    ?>

                        <tr>
                            <td style="text-align: center;"><?php echo Converter::en_to_bn($key+1) ?>। </td>
                            <td><?= $value['product'] ?> </td>
                            <td style="text-align: center;"><?= Converter::en_to_bn($value['quantity']) ?></td>
                            <td style="text-align: center;"><?= Converter::en_to_bn($value['rate']) ?>  টাকা</td>
                        </tr>

                    <?php
                        $total_product_amount +=$value['rate'];
                        endforeach;
                    ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <th style="text-align:right;">মোট=</th>
                        <th style="text-align:center"> <?= Converter::en_to_bn( $total_product_amount) ?>  টাকা</th>
                    </tr>
                  
                </tbody>
            </table>
        </div>
        <div class="fixed-assets">
            <h3 class="primary-bg">৬। যন্ত্রপাতির তালিকা </h3>
            <table>
                <tbody>
                  <tr>
                     <th style="text-align: center;">ক্রমিক নং</th>
                     <th style="text-align: center;">যন্ত্রপাতির নাম/ বিবরণী</th>
                     <th style="text-align: center;" >পরিমাণ</th>
                     <th style="text-align: center;" >মূল্য (টাকা)</th>
                  </tr>
                  <tr>
                     <td>(ক) স্থানীয়/আমদানিযোগ্য</td>
                     <td style="text-align: center;"></td>
                     <td style="text-align: center;" ></td>
                     <td style="text-align: center;" ></td>
                  </tr>
                  <?php  
                    $local_qty_total = 0;
                    $local_total = 0;
                    if(!empty($machine_list_local)){
                        foreach ($machine_list_local as $key_m=>$mll) {
                        echo '<tr>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($last_key=$key_m+1).'।</td>';
                        echo '<td>'.$mll['machine_name'].'</td>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($mll['quantity']).'</td>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($mll['estimated_rate']).' টাকা</td>';
                        echo '</tr>';
                       // $local_qty_total += $mll['quantity'];
                        $local_total += $mll['estimated_rate'];
                        }
                    }
                    ?>

                    <?php  
                    $local_for_total = 0;
                    $foreign_total = 0;
                    if(isset($last_key) && $last_key>0 ){
                        $i= $last_key;
                    }else{
                        $i=0;
                    }
                   
                    if(!empty($machineries_imported)){
                        foreach ($machineries_imported as $key=>$iml) {
                        echo '<tr>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($i+1).'।</td>';
                        echo '<td>'.$iml['machine_name'].'</td>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($iml['quantity']).'</td>';
                        echo '<td style="text-align:center">'.Converter::en_to_bn($iml['estimated_rate']).' টাকা</td>';
                        echo '</tr>';
                       // $local_for_total += $iml['quantity'];
                        $foreign_total += $iml['estimated_rate'];
                        }
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th style="text-align:right;">মোট=</th>
                        <th style="text-align:center"> <?= Converter::en_to_bn( $total_mac_amount= $local_total+ $foreign_total) ?> টাকা</th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="fixed-assets">
            <h3 class="primary-bg">৭। কাচামালের বিবরণ (বার্ষিক) উৎপাদন ক্ষমতার ভিত্তিতে;</h3>
            <table>
                <tbody>
                  <tr>
                     <th style="text-align: center;">ক্রমিক নং</th>
                     <th style="text-align: center;">পণ্য/সেবা</th>
                     <th style="text-align: center;" >পরিমাণ</th>
                     <th style="text-align: center;" >মূল্য (টাকা)</th>
                  </tr>
                  <tr>
                     <td>(ক) স্থানীয়/আমদানিযোগ্য</td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
                 
                  <?php  
                    if(!empty($business_raw_materials)){
                        foreach ($business_raw_materials as $key=>$rmv) {
                                ?>
                        <tr>
                            <td style="text-align: center;"><?php echo Converter::en_to_bn($key+1) ?>। </td>
                            <td><?= $rmv['product'] ?> </td>
                            <td><?= Converter::en_to_bn($rmv['quantity']) ?></td>
                            <td><?= Converter::en_to_bn($rmv['rate']) ?> টাকা</td>
                        </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
         <table width='100%' style="margin-top:5px" class="my-table">
            <tbody>
               <tr>
                  <td width='25%'>৮ । বিপণন ;</td>
                  <td>(ক) স্থানীয়</td>
                  <td><?= Converter::en_to_bn($posts[0]['local_market']) ?> %</td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td>(খ) রপ্তানি</td>
                  <td><?= Converter::en_to_bn($posts[0]['export_market']) ?> %</td>
                  <td></td>
                  <td></td>
               </tr>

               <tr>
                  <td rowspan="4"><span style="margin-top: 10px;">৯ । মোট বিনিয়োগ ;</span></td>
                  <td>(ক) ভুমি ভবন</td>
                  <td>টাকা</td>
                  <td>
                  <?php
                        $land_type=$posts[0]['land_type'];

                        if($land_type=='owner'){
                            echo "মালিক";
                        }elseif($land_type=='heirloom'){
                            echo "উত্তরাধিকারী";
                        }else{
                            echo "ভাড়াটে";
                        }

                    ?>     
                  </td>
                  <td></td>
               </tr>
               <tr>
                  <td>(খ) যন্ত্রপাতি</td>
                  <td>টাকা</td>
                  <td><?=  Converter::en_to_bn($total_mac_amount) ?></td>
                  <td></td>
               </tr>

               <tr>
                  <td>(গ) চলতি মুলধন</td>
                  <td>টাকা</td>
                  <td><?= Converter::en_to_bn($posts[0]['total_investment']) ?></td>
                  <td></td>
               </tr>
              
               <tr>
                  <th >মোট</th>
                  <th >টাকা</th>
                  <th ><?= Converter::en_to_bn($total_mac_amount+$posts[0]['total_investment'] ) ?></th>
                  <th ></th>
               </tr>
               <tr>
                  <td >১০ । মুলধন (ইকুইটি) বিনিয়োগ </td>
                  <td>(ক) স্থানীয়</td>
                  <td>টাকা</td>
                  <td><?= Converter::en_to_bn($posts[0]['local_entrep_total']) ?></td>
                  <td><?= Converter::en_to_bn($posts[0]['local_entrepreneur']) ?>%</td>
               </tr>
               <tr>
                  <td></td>
                  <td>(খ) বিদেশি</td>
                  <td>টাকা</td>
                  <td><?= Converter::en_to_bn($posts[0]['foreign_entrep_total']) ?></td>
                  <td><?=  Converter::en_to_bn($posts[0]['foreign_entrepreneur']) ?>%</td>
               </tr>
            </tbody>
         </table>
         <table width='100%' style="margin-top:5px" class="my-table">
            <tbody>
               <tr>
                    <td width="40%">১১ ।  উদ্যোক্তার/ উদ্যোক্তাদের নাম ও জাতীয়তা;</td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>

                   
                <tr>
                    <td style="text-align: center;"> ১। </td>
                    <td>
                        নাম - <?php echo $posts[0]['entre_name_bn'] ?><br>
                        এনআইডিনং - <?php  echo Converter::en_to_bn($posts[0]['nid_no']);?><br>
                        মোবাইল - <?= Converter::en_to_bn($posts[0]['entre_phone_no']) ?>
                    </td>
                    <td>জাতীয়তা</td>
                    <td>বাংলাদেশী</td>
                
                </tr>
              
              
            
                <?php if(!empty($enterpeneur_info) AND count($enterpeneur_info)>0): ?>
                    <?php $sl=1 ?>
                    <?php foreach($enterpeneur_info as $k_ev=>$ev): ?>

                        <tr>
                            <td style="text-align: center;"><?= Converter::en_to_bn( $sl+1) ?> । </td>
                            <td>
                            নাম - <?php echo $ev['entre_name_bn'] ?> <br>
                            এনআইডিনং - <?=  Converter::en_to_bn($ev['nid_no']); ?><br>
                            মোবাইল - <?=   Converter::en_to_bn($ev['entre_phone_no']); ?> 
                            </td>
                            <td>জাতীয়তা</td>
                            <td>বাংলাদেশী</td>
                        </tr>
                      
                    <?php endforeach;?>
                    
                <?php endif; ?>

                <tr>
                  <td width='40%'>১২ ।  কর্মসংস্থান ;</td>
                  <td> 
                    <?php
                        $emp_1=0 ;
                        $emp_2=0;
                        $emp_3=0;
                        $emp_4=0;
                        $emp_5=0;
                        $emp_6=0;
                        $emp_7=0;
                        $emp_8=0;
                        $emp_9=0;
                        $emp_10=0;
                        $emp_11=0;
                        $emp_12=0;

                        if($management_employee){
                            $emp_1=  ($management_employee->local->male)?$management_employee->local->male:0;
                            $emp_2=  ($management_employee->local->female)?$management_employee->local->female:0;
                            $emp_3=  ($management_employee->foreigner->male)?$management_employee->foreigner->male:0;
                            $emp_4=  ($management_employee->foreigner->female)?$management_employee->foreigner->female:0;
                        }
                        if($skilled_sem_skl_emp){
                            $emp_5=  ($skilled_sem_skl_emp->local->male)?$skilled_sem_skl_emp->local->male:0;
                            $emp_6=  ($skilled_sem_skl_emp->local->female)?$skilled_sem_skl_emp->local->female:0;
                            $emp_7=  ($skilled_sem_skl_emp->foreigner->male)?$skilled_sem_skl_emp->foreigner->male:0;
                            $emp_8=  ($skilled_sem_skl_emp->foreigner->female)?$skilled_sem_skl_emp->foreigner->female:0;
                        }
                        if($unskilled_employee){
                            $emp_9= ($unskilled_employee->local->male)?$unskilled_employee->local->male:0;
                            $emp_10= ($unskilled_employee->local->female)?$unskilled_employee->local->female:0;
                            $emp_11= ($unskilled_employee->foreigner->male)?$unskilled_employee->foreigner->male:0;
                            $emp_12= ($unskilled_employee->foreigner->female)?$unskilled_employee->foreigner->female:0;
                        }
                    ?>
                                  
                (<?=   Converter::en_to_bn($emp_1 + $emp_2+ $emp_3+ $emp_4+$emp_5+$emp_6+$emp_7+$emp_8+$emp_9+$emp_10+$emp_11+$emp_12) ?>)  জন
            </td>
            <td></td>
            <td></td>
               
            </tr>

            </tbody>
         </table>
         
         <br>
    </div>
</div> -->


<div class="modal-footer">
      <form id='certificate_add' method="post">
        <input type="hidden" value="<?= $array[0]->id ?>" name="contact_id" id='contact_id'>  
        <input type="hidden" value="<?= $payment_id ?>" name="payment_id" id='payment_id'>  
        <input type="hidden" value="<?= $user_id ?>" name="user_id">  
        <button type="submit" class="btn btn-primary" id="submit"><?php echo $this->lang->line('confirm'); ?></button>
      </form>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script src="<?php echo  base_url().'/public/js/qrcode.js' ?>"></script>
<script>
    <?php
        $qr_text= "Certificate NO : , "."Application Date : ".$posts[0]['created_date']." ,Project Name : ".$posts[0]['org_name'];
    ?>
    $('#qrcode').empty();
    $('#qrcode').qrcode({width: 200,height: 200,text: '<?= $qr_text ?>'});
 $('#qrcode1').empty();
    $('#qrcode1').qrcode({width: 200,height: 200,text: '<?= $qr_text ?>'});


	$(function () {
      $('body').on('click', '#submit', function () {
         $('#certificate_add').validate({
          rules: {
          contact_id: {
              required: true,
          },         
      },
      messages: {      
        contact_id: {
          required: 'Contact id is required',
      },
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#certificate_add');
                    var form = $(this);
                    $.ajax({
                      url: "<?php
                            if($is_import_paymnet == 1){
                                echo base_url().'admin/certificate/confirm_for_import';
                            } else {
                                echo base_url().'admin/certificate/confirm';
                            }
                        ?>",
                      type: 'POST',
                      data: frm.serialize(),
                      beforeSend: function () {
                        $('.crud_load').show()
                      },
                      complete: function () {
                          $('.crud_load').hide();
                      },
                      success: function (response) {
                          var result = $.parseJSON(response);
                          if (result.status != 'success') {
                            $.each(result, function (key, value) {
                              $('[name="' + key + '"]').addClass("error");
                              $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                          });
                        }
                        else {
                              $('#modal_verify').modal('hide');
                              window.onload = searchFilter(0);
                              toastr.success(result.message);
                          }

                      }

                    });


                }
            }); 

    });
  });

</script>