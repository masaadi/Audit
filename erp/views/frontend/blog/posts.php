
 <div class="row">

  <?php if (!empty($wings)):
    $language = $this->session->userdata("lang_file");
    foreach ($wings as $data):?>
        <?php
        if($language =="bn"):?>
              
			  <div class="col-md-6">
				<div class="card mb-4" style='min-height:300px'>
					<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
						<img height="150px" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
					</a>
					<div class="card-body">
						<span><?= $this->lang->line('topic') ?>  :  </span>
						<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
						<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
							<h2 style='font-size:17px' class="card-title mt-2 text-primary"><?php echo text_format($data->post_title_bn,200)  ?></h2>
						</a>
						<div  class="card-text">
							<?php 
								$stringCut = substr($data->post_content_bn, 0, 200);
								$endPoint = strrpos($stringCut, ' ');
								$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
								//echo  $string ;
							?>
						</div>
					</div>
					<div class="card-footer" style='border-top:0px'>
						<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>" class="btn btn-primary"><?= $this->lang->line('read_more') ?> &rarr;</a>
					</div>
					<div class="card-footer text-muted">
						<?= $this->lang->line('posted_on') ?> : <?php echo $data->post_datetime ?>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="col-md-6">
				<div class="card mb-4"  style='min-height:300px'>
					<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
						<img height="150px" class="card-img-top" src="<?php echo base_url('public/uploads/').$data->post_img;?>" alt="Card image cap">
					</a>
					<div class="card-body">
						<span><?= $this->lang->line('topic') ?>  :  </span>
						<span class='badge badge-success'><?= ($language =="bn")? $data->topic_name_bn : $data->topic_name ?></span>
						<a href="<?php echo base_url('blog/posts').'/'.$data->id ?>">
							<h2 style='font-size:17px' class="card-title mt-2  text-primary"><?php echo text_format($data->post_title,200) ?></h2>
						</a>
						<p class="card-text">
							<?php 
								$stringCut = substr($data->post_content, 0, 200);
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
			</div>


        <?php endif;?>
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
				<?= (isset($links))? $links : '' ?>
			<hr>
		</div>
</div>

