<!DOCTYPE html>
<html lang="en">
<head>
  <?php
      $language = $this->session->userdata("lang_file");
      $this->load->model('admin/report_heading_model');
      $con = "id = 1";
      $report_head= $this->Shows->getThisValue($con, "master_report_heading");  
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <style>
      #header_table tr td{
          font-size: 12px;
      }
      #header_table tr th{
          font-size: 13px;
      }
      #list_table td, th {  
        border: 1px solid #ddd;
        text-align: left;
      }

      #list_table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }

      #list_table th {
        padding: 5px;
        <?php if($language =="bn"): ?>
          font-size: 12px !important;
        <?php else: ?>
          font-size: 10px !important;
        <?php endif; ?>
        font-weight: bold;
      }
      #list_table td {
        padding: 5px;
        <?php if($language =="bn"): ?>
          font-size: 14px !important;
        <?php else: ?>
          font-size: 11px !important;
        <?php endif; ?>
      }
      /*new*/
      .row {
          /*display: -ms-flexbox;*/
          display: flex;
          /*-ms-flex-wrap: wrap;*/
          flex-wrap: wrap;
          margin-right: -15px;
          margin-left: -15px;
      }
      .text-center {
          text-align: center!important;
      }
      .col-12 {
          -ms-flex: 0 0 100%;
          flex: 0 0 100%;
          max-width: 100%;
      }
      h5 {
          font-size: 18px;
      }
      h1, h2, h3, h4, h5, h6 {
          margin: 0;
          color: #111111;
          font-weight: 500;
          <?php if($language !="bn"): ?>
            font-family: "PT Sans", sans-serif;
          <?php endif; ?>
      }

      .p_lcass{
          font-size: 16px;
          color: #858585;
          <?php if($language !="bn"): ?>
            font-family: "PT Sans", sans-serif;
          <?php endif; ?>
          font-weight: 400;
          line-height: 28px;
          margin: 0 0 15px 0;
      }
  </style>
</head>
<body>


            <div class="row">
                <div class="col-12 text-center">
                    <table width='100%' id="header_table" style='border: none !important;'>
                        <tr>
                            <td class='text-right' style="text-align:right">
                                <img width='70px' src='<?php echo base_url() ?>public/uploads/<?= $report_head[0]->logo_url ?>'>
                            </td>
                            <td class='text-center' style="width:320px">
                                <h5 class="mb-0"><?= $report_head[0]->report_heading_name ?></h5>
                                <p class="p_lcass">
                                      <?= $report_head[0]->address ?>
                                </p>
                                <h5 class="mt-1"><?= $this->lang->line('office_report') ?></h5>
                            </td>
                            <td class='text-left' style="text-align:left">
                                <img width='80px' src='<?php echo base_url() ?>public/uploads/<?= $report_head[0]->right_logo ?>'>
                            </td>
                        </tr>
                    </table>
				</div>
            </div>

			<div class="row mt-4">
				<div class="col-sm-12 mt-2">

                <table id="list_table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10%"><?= $this->lang->line('sl')?></th>
                                <th style=""><?= $this->lang->line('division')?></th>
                                <th style=""><?= $this->lang->line('district')?></th>
                                <th style=""><?= $this->lang->line('upazila')?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($wings)):
                        $count = $loop_start + 1;
                        foreach ($wings as $data):
                        $language = $this->session->userdata("lang_file");
                        ?>
                            <tr>
                            <?php
                            if($language =="bn"):?>
                                <td><?php echo Converter::en_to_bn($count);?></td>
                                <td><?php echo $data['division_name_bn'] ?></td>                           
                                <td><?php echo $data['district_name_bn'] ?></td> 
                                <td><?php echo $data['upazila_name_bn'] ?></td> 
                                <?php else:?>
                                <td><?php echo $count;?></td>
                                <td><?php echo $data['division_name'] ?></td>                           
                                <td><?php echo $data['district_name'] ?></td> 
                                <td><?php echo $data['upazila_name'] ?></td>
                                <?php endif;?>
                            </tr>
                            <?php 
                            $count++;
                            endforeach;
                            else:
                            ?>
                            <tr>
                                <td colspan="3" style="text-align: center;"><b>No data found</b></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>
</html>
		