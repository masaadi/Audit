<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card"> <h2 class="add_button">
                      <button onclick="javascript:location.reload(true)" type="button"
                      class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                      data-backdrop="static"
                      data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?></button>
                    </h2> 
                <div class="card-body p-5">
                    <div class="text-center">
                      <?php foreach($complain_users as $key=>$user): ?>
                        <span class="badge    <?=($user->chain_status == 1 ? 'badge-danger' : ($user->chain_status == 2 ? 'badge-success' : ($user->chain_status == 3 ? 'badge-warning' : 'badge-secondary'))) ?>"><?php echo $user->full_name ?></span>
                          <?php if(count($complain_users)-1!=$key): ?>
                            <img width="30px" src="<?= base_url() ?>/public/dashboard/images/arrow.png">
                          <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                    <p class="card-description">
                       <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					             <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    <br>
                    <div class="row ">
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-12 col-form-label" style="font-weight: bold;"><u><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('title'); ?> </u></label>
                          <div class="col-sm-12">
                            <?php echo $array[0]->complain_title; ?>
                          </div>
                        </div>
                      </div>
                     
                      
                      <div class="col-md-12">
                        <div class="form-group row">
                        <label class="col-sm-12 col-form-label" style="font-weight: bold;"><u><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('description'); ?> </u></label>
                          <div class="col-sm-12">
                            <?php echo $array[0]->complain_content; ?>

                            <p class="mt-3"><i class="fa fa-calendar text-primary" aria-hidden="true"></i>  <?= date("d F Y", strtotime($array[0]->created_date))  ?></p>

                          </div>
                        </div>
                      </div>
                    </div>
                    <h4 class="mt-2"><u> <?= $this->lang->line('all_replies') ?> :</u></h4>
                      
                      <?php foreach($comments as $comment): ?>
                        <h4 class="badge badge-success mt-3"><?= $comment->full_name ?></h4>
                        <p><i class="fa fa-commenting-o text-primary" aria-hidden="true"></i> <?=  $comment->reply ?></p>
                        <p><i class="fa fa-calendar text-primary" aria-hidden="true"></i>  <?= date("d F Y", strtotime($comment->created_date))  ?></p>
                      <?php endforeach; ?>

                </div>
              </div>
            </div>
          </div>
          
        </div>
