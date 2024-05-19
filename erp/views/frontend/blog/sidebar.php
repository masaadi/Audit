<div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          	<h5 class="card-header"><?= $this->lang->line('search') ?></h5>
          	<div class="card-body">
				<?php echo form_open_multipart('', array('id' => 'union_search')); ?>
					<div class="input-group md-form form-sm form-2 pl-0">
						<input  name="div_name" id="div_name" class="form-control my-0 py-1 red-border" type="text" placeholder="<?= $this->lang->line('search') ?>" aria-label="Search">
						<div class="input-group-append">
							<span style='cursor: pointer' onclick="searchFilter()" class="input-group-text red lighten-3" id="basic-text1"><?= $this->lang->line('search') ?></span>
						</div>
					</div>
				</form>
          	</div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
         	<h5 class="card-header"><?= $this->lang->line('recent_blogs') ?></h5>
          	<div class="card-body">
				<?php
								
					$this->load->model('blog_model');
					$recents=$this->load->blog_model->get_user_data(array('limit' => 3));
				if (!empty($recents)):
					$language = $this->session->userdata("lang_file");
					foreach ($recents as $data):?>
						<?php
						if($language =="bn"):?>
								
								<div class="card mb-4"  style='min-height:300px'>
									<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
										<img style="height: 150px;" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
									</a>
									<div class="card-body">
										<span><?= $this->lang->line('topic') ?>  :  </span>
										<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
										<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
											<h2 style='font-size:17px' class="card-title mt-2 text-primary"><?php echo text_format($data->post_title_bn,200) ?></h2>
										</a>
										<p  class="card-text">
											<?php 
												$stringCut = substr($data->post_content_bn, 0, 300);
												$endPoint = strrpos($stringCut, ' ');
												
												$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
												//echo  $string ;
												?>
										</p>
									</div>
									<div class="card-footer" style='border-top:0px'>
										<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>" class="btn btn-primary"><?= $this->lang->line('read_more') ?> &rarr;</a>
									</div>
									<div class="card-footer text-muted">
										<?= $this->lang->line('posted_on') ?> : <?php echo $data->post_datetime ?>
									</div>
								</div>
								<?php else: ?>
								<div class="card mb-4"  style='min-height:300px'>
									<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
									<img style="height: 150px;" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
									</a>
									<div class="card-body">
										<span><?= $this->lang->line('topic') ?>  :  </span>
										<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
										<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
											<h2 style='font-size:17px' class="card-title mt-2  text-primary"><?php echo text_format($data->post_title,200)  ?></h2>
										</a>
										<p class="card-text">
											<?php 
												$stringCut = substr($data->post_content, 0, 300);
												$endPoint = strrpos($stringCut, ' ');
												
												$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
												//echo  $string ;
												?>
										</p>
									</div>
									<div class="card-footer" style='border-top:0px'>
										<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>" class="btn btn-primary"><?= $this->lang->line('read_more') ?> &rarr;</a>
									</div>
									<div class="card-footer text-muted">
										<?= $this->lang->line('posted_on') ?> :<?php echo $data->post_datetime ?>
									</div>
								</div>

						<?php endif;?>
					<?php 
						endforeach;
						else:
					?>
					<tr>
						<p class='text-center text-danger'><b><?= $this->lang->line('post_not_found') ?></b></p>
					</tr>
				<?php endif; ?>
          	</div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          	<h5 class="card-header"><?= $this->lang->line('popular_blogs') ?></h5>
          	<div class="card-body">
                
        	<?php
              
            $this->load->model('blog_model');
            $recents=$this->load->blog_model->get_user_data(array('limit' => 2));
         	if (!empty($recents)):
			$language = $this->session->userdata("lang_file");
			
				foreach ($recents as $data):?>
			
                <?php if($language =="bn"): ?>
                        
					<div class="card mb-4"  style='min-height:300px'>
						<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
						<img style="height: 150px;" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
						</a>
						<div class="card-body">
							<span><?= $this->lang->line('topic') ?>  :  </span>
							<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
							<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
								<h2 style='font-size:17px' class="card-title mt-2 text-primary"><?php echo text_format($data->post_title_bn,200) ?></h2>
							</a>
							<p  class="card-text">
								<?php
									$stringCut = substr($data->post_content_bn, 0, 300);
									$endPoint = strrpos($stringCut, ' ');
									$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
								//	echo  $string ;
									?>
							</p>
						</div>
						<div class="card-footer" style='border-top:0px'>
							<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>" class="btn btn-primary"><?= $this->lang->line('read_more') ?> &rarr;</a>
						</div>
						<div class="card-footer text-muted">
							<?= $this->lang->line('posted_on') ?> : <?php echo $data->post_datetime ?>
						</div>
					</div>
					<?php else: ?>
					<div class="card mb-4"  style='min-height:300px'>
						<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
						<img style="height: 150px;" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
						</a>
						<div class="card-body">
							<span><?= $this->lang->line('topic') ?>  :  </span>
							<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
							<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
								<h2 style='font-size:17px' class="card-title mt-2  text-primary"><?php echo text_format( $data->post_title,200) ?></h2>
							</a>
							<p class="card-text">
								<?php
									$stringCut = substr($data->post_content, 0, 300);
									$endPoint = strrpos($stringCut, ' ');
									$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
								//	echo  $string ;
								?>
							</p>
						</div>
						<div class="card-footer" style='border-top:0px'>
							<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>" class="btn btn-primary"><?= $this->lang->line('read_more') ?> &rarr;</a>
						</div>
						<div class="card-footer text-muted">
							<?= $this->lang->line('posted_on') ?> :<?php echo $data->post_datetime ?>
						</div>
					</div>
        
                <?php endif;?>
        
            <?php 
				endforeach;
				else:
            ?>
                <tr>
                  <p class='text-center text-danger'><b><?= $this->lang->line('post_not_found') ?></b></p>
                </tr>
            <?php endif; ?>
                  
          	</div>
        </div>

    </div>