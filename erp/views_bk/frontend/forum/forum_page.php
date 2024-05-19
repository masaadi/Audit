
 <?php
    $this->load->view('frontend/forum/header_forum');
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
          <div id='forum_create_id'>
            <div class="row">
              <div class="col-md-8">
                <h3 class="my-4"><?= $this->lang->line('forum') ?>
                  <small><?= $this->lang->line('latest') ?></small>
                </h3>
              </div>
              <div class="col-md-4">
                  <button onclick='forum_master()' class='btn btn-primary mt-4'><?php echo $this->lang->line('forum') ?> <?php echo $this->lang->line('create') ?></button>
              </div>

            </div>

            <div id='forumList'>


            <div class="row">
                <?php if (!empty($wings)):
                    foreach ($wings as $data):
                    
                    ?>
                <div class="col-md-12 mt-2">
                      <div class="card">
                          <div class="card-body">
                                <div class="row">
                                <div class="col-md-9">
                                    <a href="<?php echo base_url('forum/post').'/'.$data->id ?>">
                                        <h4 style='font-size:16px'  class="text-primary"><?= $data->post_title ?></h4>
                                    </a>
                                    <p>
                                    <?php 
                                    $stringCut = substr($data->post_content, 0, 280);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    echo  $string ;
                                    ?>...
                                        <a href="<?php echo base_url('forum/post').'/'.$data->id ?>"><?= $this->lang->line('read_more') ?></a>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <ul style="list-style: none;">
                                        <li><i class="mdi mdi-eye"></i> 
                                        
                                        <?php
                                            echo number_format_short($data->views);
                                        ?>
                                        view</li>
                                        <li>
                                            <a href="<?php echo base_url('forum/post').'/'.$data->id ?>"><i class="mdi mdi-message-reply"></i> 
                                                Reply
                                                <?php
                                                    $query = $this->db->query("SELECT * FROM forum_comment where post_id=".$data->id."");
                                                    echo '('.$query->num_rows().')';
                                                ?>
                                            </a>
                                        </li>
                                        <li><i class="mdi mdi-timetable"></i><?= $data->post_datetime ?></li>
                                    </ul>
                                </div>
                                </div>
                          </div>
                      </div>
                  </div>
                  <?php 
                    endforeach;
                    else:
                    ?>
                        <div class='col-md-12'>
                        <hr>
                          <p class='text-center text-danger'><b><?= $this->lang->line('post_not_found') ?></b></p>
                        <hr>
                        </div>
                    <?php endif; ?>
                    <div class='col-md-12 text-center'>
                        <hr>
                        <?= $links ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <?php
        $this->load->view('frontend/forum/sidebar');
        ?>
    </div>

  </div>
  <br>





  <script>
     function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;
         var div_name = $('#div_name').val();	
		
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>forum/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name,
            beforeSend: function() {
                $("#ajaxload").addClass('d-block');
            },
            complete: function () {
              $("#ajaxload").removeClass('d-block');
            }, 
            success: function (html) {
                $('#forumList').html(html);
            }
        });
    }



        function forum_master(){
            $.ajax({
                url: "<?php echo base_url() ?>forum/create",
                type: 'POST',
                data: {},
                beforeSend: function() {
                    $("#ajaxload").addClass('d-block');
                },
                complete: function () {
                  $("#ajaxload").removeClass('d-block');
                }, 
                success: function (response) {
                    $('#forum_create_id').html(response)
                }
            });
                
            
        }


    $(function () {
        $('body').on('click', '#submit', function () {
            
                $('#forum_add').validate({
                    rules: {
                        post_title: {
                            required: true,
                        },
                        
                        post_content: {
                            required: true,
                        },                    
                    },
                    messages: {
                        post_title: {
                            required: 'Post title is required',
                        },
                        
                        post_content: {
                            required: 'Post content is required',
                        },
                        
                    },
                    submitHandler: function (form) {
                        $("label.error").remove();
                        // e.preventDefault();
                        var form = $(this);
                        //debugger;
                        var currentForm = $('#forum_add')[0];
                        var formData = new FormData(currentForm);                        
                        $.ajax({
                            url: "<?php echo base_url() ?>forum/added",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function() {
                                $("#ajaxload").addClass('d-block');
                            },
                            complete: function () {
                              $("#ajaxload").removeClass('d-block');
                            }, 
                            success: function (response) {
                                var result = $.parseJSON(response);
                                if (result.status != 'success') {
                                    $.each(result, function (key, value) {
                                      $('[name="' + key + '"]').addClass("error");
                                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                  });
                                }else {
                                    location.reload();
                                    toastr.success(result.message);

                                  }
                                }
                        });
                    }
                });
            
        });
    });

</script>