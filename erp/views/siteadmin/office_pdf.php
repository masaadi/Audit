<?php 
foreach ($offices as $office1):endforeach;
if($wing_id>0){
	$language = $this->session->userdata('lang_file');
      if ($language == "bn"){?>
		  
		 <p style="text-align:center"><?php echo $this->lang->line('wing');?> : <?php echo  $office1['WING_NAME_BN'];?></p> 
		 
		 <?php 
	  }
	  else{?>
	  <p style="text-align:center"><?php echo $this->lang->line('wing');?> : <?php echo  ucfirst($office1['WING_NAME']);?></p> 
	  <?php 
		  
	  }
	
	
}?>
<style>
th,td{ text-align:center; padding:5px}
</style>
<table class="table table-striped table-bordered table-hover" border="1" width="100%" style="border-collapse:collapse">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('sl');?></th>     
      <th><?php echo $this->lang->line('office_type');?></th>
      <th><?php echo $this->lang->line('office_name');?></th>
	  <th><?php echo $this->lang->line('district');?></th>
	  <th><?php echo $this->lang->line('thana');?></th>
	  <th><?php echo $this->lang->line('latitude');?></th>
	  <th><?php echo $this->lang->line('longitude');?></th>
     
    </tr>
  </thead>
  <tbody id='table_data'>
   <?php
   
     $count = $loop_start + 1;
    foreach ($offices as $office):
      $language = $this->session->userdata('lang_file');
      if ($language == "bn"){
        ?>
         <tr>
			  <td ><?php echo Converter::en_to_bn($count) ?></td>         
			  <td ><?php echo $office['OFFICE_TYPE_NAME_BN'] ?></td>
			  <td><?php echo $office['OFFICE_NAME_BN']?></td>
			  <td><?php echo $office['DISTRICT_NAME_BN']?></td>
			  <td><?php echo $office['THANA_NAME_BN']?></td>
			  <td><?php echo $office['LATITUDE']?></td>
			  <td><?php echo $office['LONGITUDE']?></td>
		  </tr>
        
        <?php } else { ?>

          <tr>
            <th scope="row"><?php echo $count; ?></th>
            <td scope="row"><?php echo $office['OFFICE_TYPE_NAME'] ?></td>
            <td><?php echo $office['OFFICE_NAME'];?></td>  
            <td><?php echo $office['DISTRICT_NAME']?></td>
			<td><?php echo $office['THANA_NAME']?></td>
			<td><?php echo $office['LATITUDE']?></td>
			<td><?php echo $office['LONGITUDE']?></td>		
          
           </tr>

              <?php
            }
            $count++;
          endforeach;
       
          ?>
         </tbody>
    </table>
    <div class="clearfix"></div>
  
