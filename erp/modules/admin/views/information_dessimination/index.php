
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?= $this->lang->line('information_desimination')?></h4>

                    <div class="row">
                      <div class='col-md-12'>
                        <ul class="nav nav-tabs" role="tablist">

                          <?php 
                            $this->load->model('admin/information_dessimination_model', 'ID_model');
                            $office_categories=$this->ID_model->get_office_categories();

                            foreach($office_categories as $cat){
                              ?>
                              <li class="nav-item text-center" style="width: 25%;">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#headOffice" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                                  <div class="row">
                                    <div class="col-md-1"><i class="mdi mdi-application" style="font-size: 30px;"></i></div>
                                    <div  onclick="searchFilter('',<?php echo $cat['id']?>)" class="col-md-10 pt-3" style="font-size: 12px;">
                                        <?php
                                            $language = $this->session->userdata('lang_file');
                                          if ($language == "bn"){
                                        ?>
                                        <?php echo $cat['office_category_name_bn'] ?>

                                        <?php }else{ ?>
                                          <?php echo $cat['office_category_name'] ?>

                                        <?php } ?>
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <?php
                            }
                          ?>
                        </ul>
                      </div>
                    </div>

                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
				
                <div class="card search_form">
                  <div class="card-body">

                    <div class='row'>
                        <div class='col-md-6'>
                        
                        </div>
                        <div class='col-md-6'>
                            <form action='<?php echo base_url() . 'admin/office/generateListPdf' ?>' method='post'>
                            <input type="hidden" class='pdf_cat' name="pdf_cat" id='pdf_cat' value="">
                            <input type="submit" class="btn btn-success btn-sm pull-right mr-1" value="<?= $this->lang->line('download') ?>">
                            </form> 
                        </div>
                    </div>
                  </div>
                </div>
				
				        <div  id="officeList">
                    <?php
                    $this->load->view('admin/information_dessimination/home');
                    ?>
                </div>

                <!-- table -->
                
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
		
		<script type="text/javascript">
       function searchFilter(page_num,off_cat='') {
        page_num = page_num ? page_num : 0;
        $('#pdf_cat').val(off_cat);


        if(off_cat==''){
          let off_cat=$('.pdf_cat').val();
        }
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/information_dessimination/paginate_data/' + page_num,
            data: 'page=' + page_num + '&off_cat=' + off_cat,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				//$("#office_search").trigger("reset");

                $('#officeList').html(html);

                
            }
        });
    }
	
	
		
		</script>