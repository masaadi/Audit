<?php
    $this->load->view('frontend/blog/header');
  ?>

  <div class="card title-img ">
    <div class="card-body">
      <div class="container">
        <img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="" style="width: 150px;" class="p-3">
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
              <div class="col-md-8">
                <b><h3 class="my-4"><?= $this->lang->line('post') ?>
                  <small><?= $this->lang->line('details') ?></small>
                </h3></b>
              </div>
            </div>
            <div id='blogList'>

          <!-- Title -->
            <?php 
            $language = $this->session->userdata("lang_file");
            if($language =="bn"):?>
                <h1 class="mt-4"  style='font-size:28px'><?= $data[0]->post_title_bn ?></h1>
            <?php else: ?>
                <h1 class="mt-4"  style='font-size:28px'><?= $data[0]->post_title ?></h1>
            <?php endif; ?>


            <hr>
            <div class='row'>
                <div class='col-md-6'><p><span class='text-primary'> <?= $this->lang->line('posted_on') ?> : </span><?= $data[0]->post_datetime ?></p></div>
                <div class='col-md-6'><p><span class='text-primary'><?= $this->lang->line('posted_by') ?> : </span> <?= ($language=='bn')? $data[0]->full_name_bn : $data[0]->full_name ?></p></div>
            </div>

            <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" width='100%' src="<?php echo base_url('public/uploads/').$data[0]->post_img ?>" alt="">

          <hr>
          <?php 
          $language = $this->session->userdata("lang_file");
          if($language =="bn"):?>
              <p><?= $data[0]->post_content_bn ?></p>
          <?php else: ?>
              <p><?= $data[0]->post_content ?></p>
          <?php endif; ?>
        </div>
      
      </div>
        <?php
          $this->load->view('frontend/blog/sidebar');
        ?>
    </div>
  </div>
  <!-- /.container -->



  <script>

function searchFilter(page_num) {
       page_num = page_num ? page_num : 0;
       var div_name = $('#div_name').val();	
  
      $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>blog/paginate_data/' + page_num,
          data: 'page=' + page_num + '&div_name=' + div_name,
          beforeSend: function() {
                    $("#ajaxload").addClass('d-block');
          },
          complete: function () {
            $("#ajaxload").removeClass('d-block');
          }, 
          success: function (html) {
              $('#blogList').html(html);
          }
      });
  }

      


  </script>
