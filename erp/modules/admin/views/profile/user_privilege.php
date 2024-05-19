<?php $empty_module = false; ?>
  <?php if($privileges): ?>
    <div class="checkbox">
      <label><input type="checkbox" class="all_check" id="all_check" value=""> All</label>
    </div>
  <?php   foreach($privileges as $k => $v): ?>
            <?php if($k != ''): ?>
              <div class="checkbox" style="padding-left: 20px;">
                <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', $k)); ?>" value=""> <?php echo $k; ?></label>
              </div> <!-- module name -->
              <?php foreach($v as $k1 => $v1): ?>

                <div class="checkbox" style="padding-left: 40px;">
                  <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', $k)); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
                </div>

              <?php endforeach; ?>
            <?php else: ?>
              <?php $empty_module = true; ?>
            <?php endif; ?>
  <?php   endforeach; ?>
    <?php if($empty_module): ?>
      <?php foreach($privileges[''] as $k1 => $v1): ?>

        <div class="checkbox" style="padding-left: 20px;">
          <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>
  <?php endif; ?>