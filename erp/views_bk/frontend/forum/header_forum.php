<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: brown;">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>"><?= $this->lang->line('bscic') ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a style="text-transform: uppercase;" class="nav-link" href="<?php echo base_url();?>forum/forums"><?= $this->lang->line('forum') ?>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>"><?= $this->lang->line('back_to_home') ?></a>
          </li>
            <li class="nav-item">
                <?php
                $language = $this->session->userdata('lang_file');
                if ($language == "bn"){
                    ?>
                        <a href="<?php echo base_url();?>/language/set/en"  class='btn btn-info btn-sm mt-1'>English</a>
                <?php }else{ ?>
                    <a href="<?php echo base_url();?>/language/set/bn"  class='btn btn-info btn-sm mt-1'>বাংলা</a>
                <?php } ?>    
            </li>
        </ul>
      </div>
    </div>
  </nav>