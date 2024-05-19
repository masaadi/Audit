<table id="examplee" class="table table-striped table-bordered table-responsive" style="width:100%">
  <thead>
    <tr>
      	<th style="width: 5%"><?= $this->lang->line('sl')?></th>
      	<th style="width: 20%">File</th>
		<th style="width: 20%">Uploaded Date</th>
      	<th style="width: 20%">Action</th>
    </tr>
  </thead>
  <tbody>

      <tr>
			<td>1</td>
            <td><a href="<?php echo base_url()?><?= $file_data->document;?>" target="blank">Show File</a></td>
            <td><?php echo $file_data->updated_date; ?></td> 
	        <td>
				<button type="button" class="btn btn-sm btn-warning mt-1" title="EDIT"
	                  onclick="edit_master()"  data-backdrop="static" data-keyboard="false">Edit
	            </button>
	        </td>
      </tr>
  </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
<!-- table -->
