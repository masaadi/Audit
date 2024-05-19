<?php
    $language = $this->session->userdata('lang_file');
    $this->load->model('forum_model');
    $comments=$this->load->forum_model->get_comments($post_id);
    
    if (!empty($comments)):
    foreach ($comments as $data):
?>  
<div class='row'>
    <div class='col-12'>
        <img src='<?php echo base_url();?>/public/images/user_logo.png' width='20px'  height='20px' class='mr-4'>
        <?php if($language=='bn'): ?>
            <?php  echo ($data['full_name_bn'] !='') ?   $data['full_name_bn'] :  $this->lang->line('guest');  ?>
        <?php else: ?>
            <?php  echo ($data['full_name'] !='') ?   $data['full_name'] :  $this->lang->line('guest');  ?>
        <?php endif; ?>
        <hr class='p-0 m-1'>
    </div>
    <div class='col-12'>
        <p>
            <?php
                if(isset($data['comment']))
                {
                    echo $data['comment'];
                }
            ?>
        </p>
        <form action='' id='form_reply_<?= $data['id'] ?>' method='post'>
            <div class='row'>
                <div class='col-12 ml-3'>
                    <textarea rows='2' name='comment_<?= $data['id'] ?>' id='comment_<?= $data['id'] ?>' class='form-control' placeholder='<?php echo $this->lang->line('type_reply') ?>...'></textarea>
                    <div class='text-right mt-3'>
                        <button type='button' onclick="comment(<?= $data['id'] ?>,<?= $data['post_id'] ?>)" class='btn btn-primary' id='btn_submit_<?= $data['id'] ?>'><?= $this->lang->line('reply') ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div id='total_reply_<?= $data['id'] ?>'>
    <?php
        $this->load->view('frontend/forum/reply',['comment_id'=>$data['id']]);
        ?>
</div>
<?php
    endforeach;
    endif;
?>