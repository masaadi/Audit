<?php $empty_module = false; ?>
  <?php if($privileges): ?>
    <div class="checkbox">
      <label><input type="checkbox" class="all_check" id="all_check" value="" <?php if($all_check_res==true): ?>checked<?php endif;?> /> All</label>
    </div>
  <?php foreach($privileges as $k => $v): ?>
          <?php if($k != ''): ?>
          <?php 
            $explode_key = explode('~', $k); 
            $k = $explode_key[0];
            $m_id = $explode_key[1];
          ?>
            <div class="checkbox" style="padding-left: 20px;">
              <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', $k)); ?>" value="" <?php if(in_array($m_id, $cur_pvlg['module'])):;?>checked<?php endif;?> /> <?php echo $k; ?></label>
            </div> <!-- module name -->
            <?php foreach($v as $k1 => $v1): ?>

              <div class="checkbox" style="padding-left: 40px;">
                <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', $k)); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked<?php endif;?> /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
              </div><!-- menu name -->

            <?php endforeach; ?>
          <?php else: ?>
            <?php $empty_module = true; ?>
          <?php endif; ?>
  <?php endforeach; ?>

    <?php if($empty_module): ?>
      <?php foreach($privileges[''] as $k1 => $v1): ?>

        <div class="checkbox" style="padding-left: 20px;">
          <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked<?php endif;?> /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>
  <?php endif; ?>