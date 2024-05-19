<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body " >
          <h4 class="text-center"><?php echo $this->lang->line('get_info'); ?></h4>                   
          <?php 
            if(!empty($get_info)){
              $this->load->view('get_info_edit');
            }else{
              $this->load->view('get_info_entry');
            }
          ?>  
        </div>
      </div>          
    </div>
  </div>
</div>  

