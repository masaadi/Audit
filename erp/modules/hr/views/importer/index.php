 <style type="text/css">
  .file-upload{
    padding: 4px 0px 0px 4px;
   }
 </style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Data Importer</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>
                    <div class="card search_form">
                        <div class="card-body" style="padding-left:0px">
                            <div class='row'>
                                <div class='col-md-10'>
                                    <form action="<?php echo base_url()?>hr/data_importer/import_job_data" method="post" enctype="multipart/form-data">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Upload excel</label>
                                                <input type="file" name="data_file" id="data_file" placeholder="" class="form-control file-upload" required accept=".xls, .xlsx">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label></label>
                                                <button type="submit" class="btn btn-sm btn-primary mt-4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                </div>
            </div>
        </div>
    </div>
</div>