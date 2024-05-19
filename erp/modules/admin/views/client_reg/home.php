<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">Serial</th>
            <th style="">Company Name</th>
            <th style="">Representative</th>
            <th style="">Phone</th>
            <th style="">Email</th>
            <th style="">Address</th>
            <th style="">Status</th>
            <th style="">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($wings)):
       $count = $loop_start + 1;
        foreach ($wings as $data):?>
        <tr>
            <td>
                <?php echo $count;?>
            </td>
            <td>
                <?php echo $data['company_name'] ?>
            </td>
            <td>
                <?php echo $data['representative'] ?>
            </td>
            <td>
                <?php echo $data['phone'] ?>
            </td>
            <td>
                <?php echo $data['email'] ?>
            </td>
            <td>
                <?php echo $data['address'] ?>
            </td>
            <td>
                <?php if($data['status']==1): ?>
                <span class="badge badge-pill badge-success">Active</span>
                <?php elseif($data['status']==0): ?>
                <span class="badge badge-pill badge-danger">Inactive</span>
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-warning mt-1" title="Edit" onclick="edit_master('<?php echo $data['id']?>')" data-backdrop="static" data-keyboard="false">Edit</button>
                
                <?php if($data['status']==1): ?>
                    <button type="button" class="btn btn-sm btn-danger mt-1" title="Inactive" onclick="delete_master('<?php echo $data['id']?>','<?php echo $data['status']?>')" data-backdrop="static" data-keyboard="false">Inactive</button>

                <?php elseif($data['status']==0): ?>
                    <button type="button" class="btn btn-sm btn-success mt-1" title="Active" onclick="delete_master('<?php echo $data['id']?>','<?php echo $data['status']?>')" data-backdrop="static" data-keyboard="false">Active</button>
                <?php endif;?>
            </td>
        </tr>
        <?php 
            $count++;
            endforeach;
           else:
        ?>
        <tr>
            <td colspan="10" style="text-align: center;"><b>
                    <?php echo $this->lang->line('no_data_found'); ?></b></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
<!-- table -->
<div class="row p-3">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
        <nav aria-label="Page navigation example" class="">
            <ul class="pagination justify-content-center">
                <li class="page-item"></li>
            </ul>
        </nav>
    </div>
</div>