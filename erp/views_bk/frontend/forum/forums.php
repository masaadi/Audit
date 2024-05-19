
<div class="row">
    <?php if (!empty($wings)):
        foreach ($wings as $data):
    ?>
    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url('forum/post').'/'.$data['id'] ?>">
                            <h4 style='font-size:16px' class="text-primary"><?= $data['post_title'] ?></h4>
                        </a>
                        <p>
                            <?php 
                                $stringCut = substr($data['post_content'], 0, 280);
                                $endPoint = strrpos($stringCut, ' ');
                            
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                echo  $string ;
                            ?>...
                            <a href="<?php echo base_url('forum/post').'/'.$data['id'] ?>"><?= $this->lang->line('read_more') ?></a>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <ul style="list-style: none;">
                            <li><i class="mdi mdi-eye"></i> 
                            
                            <?php
                                echo number_format_short($data['views']);
                            ?>
                            view</li>
                            <li>
                                <a href="<?php echo base_url('forum/post').'/'.$data['id'] ?>"><i class="mdi mdi-message-reply"></i> 
                                    Reply
                                    <?php
                                        $query = $this->db->query("SELECT * FROM forum_comment where post_id=".$data['id']."");
                                        echo '('.$query->num_rows().')';
                                    ?>
                                </a>
                            </li>
                            <li><i class="mdi mdi-timetable"></i><?= $data['post_datetime'] ?></li>
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
</div>



