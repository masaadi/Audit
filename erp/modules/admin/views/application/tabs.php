  <?php 
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
  ?>
  <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item text-center" style="width: 30%; border-radius: 10px 10px 0px 0px;">
              <a class="nav-link <?php echo ($page=='new-application' || $page=='new')?'active':'' ?>" href="<?= base_url().'admin/new-application'?>" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">

                <div class="row">
                  <div class="col-md-1"><i class="mdi mdi-new-box" style="font-size: 40px;"></i></div>
                  <div class="col-md-11 pt-3" style="font-size: 16px;">
                    <?= $this->lang->line('new_applications')?>
                  </div>
                </div>
              </a>
            </li>
            <li class="nav-item text-center" style="width: 30%; border-radius: 10px 10px 0px 0px;">
              <a class="nav-link <?= ($page=='renew-application')?'active':'' ?>" id="sales-tab" href="<?= base_url().'admin/renew-application'?>" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">
                <div class="row">
                  <div class="col-md-1"><i class="mdi mdi-autorenew" style="font-size: 40px;"></i></div>
                  <div class="col-md-11 pt-3" style="font-size: 16px;">
                    <?= $this->lang->line('renew_applications')?>
                  </div>
                </div>
              </a>
            </li>
            <li class="nav-item text-center" style="width: 27%; border-radius: 10px 10px 0px 0px;">
              <a class="nav-link <?= ($page=='resubmission')?'active':'' ?>" id="sales-tab" href="<?=base_url().'admin/resubmission'?>" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">
                <div class="row">
                  <div class="col-md-1"><i class="mdi mdi-backup-restore" style="font-size: 40px;"></i></div>
                  <div class="col-md-11 pt-3" style="font-size: 16px;">
                    <?= $this->lang->line('resubmission')?>
                  </div>
                </div>
              </a>
            </li>
          </ul> 