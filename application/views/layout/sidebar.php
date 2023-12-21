<div class="sidebar" data="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="<?=base_url()?>assets/img/tvip.png" width="32px">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Access Request
          </a>
        </div>
        <ul class="nav">
          
          <?php //if($this->session->userdata('nik') === ''){?> 
          
          <li class="<?=($this->uri->segment(1)==='approval')?'active':''?>">
            <a href="<?=base_url('approval')?>">
              <i class="fa fa-clipboard-check"></i>
              <p>Data Approval</p>
            </a>
          </li>
          
           <?php // }elseif($this->session->userdata('nik') === '0100034100' || $this->session->userdata('nik') === '0100002300'){?> 
          <li class="<?=($this->uri->segment(1)=== NULL)?'active':''?>">
            <a href="<?=base_url()?>">
              <i class="fa fa-home"></i>
              <p>Home</p>
            </a>
          </li> 
          <li class="<?=($this->uri->segment(1)==='requestform')?'active':''?>">
            <a href="<?=base_url('requestform')?>">
              <i class="fab fa-wpforms"></i>
              <p>Request Form</p>
            </a>
          </li>
          <li class="<?=($this->uri->segment(1)==='rekap')?'active':''?>">
            <a href="<?=base_url('rekap')?>">
              <i class="fa fa-clipboard-check"></i>
              <p>List Pengajuan</p>
            </a>
          </li>
          
          <?php //}else{ ?>
          <li class="<?=($this->uri->segment(1)=== NULL)?'active':''?>">
            <a href="<?=base_url()?>">
              <i class="fa fa-home"></i>
              <p>Home</p>
            </a>
          </li> 
          <li class="<?=($this->uri->segment(1)==='requestform')?'active':''?>">
            <a href="<?=base_url('requestform')?>">
              <i class="fab fa-wpforms"></i>
              <p>Request Form</p>
            </a>
          </li>
          
          <?php// } ?>
        </ul>
      </div>
    </div>