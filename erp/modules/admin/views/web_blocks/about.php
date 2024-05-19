<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body " >
          <h4 class="text-center"><?php echo $this->lang->line('about'); ?></h4>                   
          <?php 
            if(!empty($about)){
              $this->load->view('about_edit');
            }else{
              $this->load->view('about_entry');
            }
          ?>  
        </div>
      </div>          
    </div>
  </div>
</div>  

