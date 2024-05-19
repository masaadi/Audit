
  <div class="modal-header">
    <h5 class="modal-title text-bold" id="exampleModalLabel"><?= $this->lang->line('entrepreneur_info') ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="<?= $this->lang->line('close') ?>">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <div class='row'>
          <div class="col-md-8 offset-md-2 mb-4">
                <div class="text-center row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" id='certificate_id' placeholder="<?= $this->lang->line('enter_certificate_id') ?>">
                    </div>
                    <div class="col-md-4 text-left">
                        <button onclick="findCertificate()" class="btn btn-primary"><?= $this->lang->line('search') ?></button>
                    </div>
                </div>
          </div>
          <div class="col-md-12 d-none" id='verify_data'>
              <table class="table table-bordered table-sm">
                  <tr >
                      <th style='width:30%'><?= $this->lang->line('certificate_id') ?></th>
                      <td><span id='certificate_id_view'></span></td>
                  </tr>
                  <tr >
                      <th style='width:30%'><?= $this->lang->line('entrepreneur_name') ?></th>
                      <td><span id='entre_name'></span></td>
                  </tr>
                  <tr>
                      <th><?= $this->lang->line('organization_name') ?></th>
                      <td><span id='organization_name'></span></td>
                  </tr>
                  <tr>
                      <th><?= $this->lang->line('phone') ?></th>
                      <td><span id='phone'></span></td>
                  </tr>
                  <tr>
                      <th><?= $this->lang->line('email') ?></th>
                      <td><span id='email'></span></td>
                  </tr>
                  <tr>
                      <th><?= $this->lang->line('office_address') ?></th>
                      <td><span id='office_address'></span></td>
                  </tr>
                 
              </table>
              <div id='full_link'></div>
          </div>
      </div>
       
 <?php
  $language = $this->session->userdata('lang_file');
 ?>


  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
  </div>


  