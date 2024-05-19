
 <?php
    $this->load->view('frontend/blog/header');
  ?>

  <div class="card title-img mt-5">
    <div class="card-body">
      <div class="container">
        <img src="<?php echo base_url();?>public/dashboard/images/bsic.png" alt="" style="width: 150px;" class="p-3">
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        

        <div class="row">
          <div class="col-md-8">
            <h3 class="my-4"><?= $this->lang->line('blog') ?>
              <small><?= $this->lang->line('latest') ?></small>
            </h3>
          </div>
        </div>

        <div  id="blogList">
            <?php
            $this->load->view('frontend/blog/posts');
            ?>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php
        $this->load->view('frontend/blog/sidebar');
        ?>

    </div>

  </div>


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