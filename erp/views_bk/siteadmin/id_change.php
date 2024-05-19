<script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
<style>
td, th {
    padding: 5px;
}
p{color:red}
</style>

<p class="statusMsg"></p>
<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h4 class="boxbdr">
                        
                       ID Change                     </h4>
                </div>


<div class="body table-responsive" id="officeList">
   <?php
$old_id = array(
  'name' => 'old_id',
  'id' => 'old_id',
  'class' => 'form-control', 
  'value' => set_value('old_id'),
);
$new_id = array(
  'name' => 'new_id',
  'id' => 'new_id',
  'class' => 'form-control', 
  'value' => set_value('new_id'),
);


?>
<?php echo form_open_multipart($this->uri->uri_string()); ?>

<?php echo $this->session->flashdata("message");?>
<div class="modal-body">
  <div class="row clearfix">

    <div class="col-sm-6">
      <label for="" class="req">Old ID</label>
       <?php echo form_input($old_id); ?>
	   <?php echo form_error("old_id");?>

   </div>
 </div>
 <br>
 <div class="row clearfix">

  <div class="col-sm-6">
    <label for="" class="req">New ID</label>
    <?php echo form_input($new_id); ?>
	<?php echo form_error("new_id");?>

  </div>
</div>
<br>
<div class="row clearfix">

  <div class="col-sm-12">
    <input type="submit" value="Submit">

  </div>
</div>
</form>
<br>
</div>
</div>

</div>
</div>
</div>
</div>










