<?php if ($this->session->userdata('level')=='1') {?>

<div class="left-custom-menu-adp-wrap">
    <ul class="nav navbar-nav left-sidebar-menu-pro">
      <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Surat Masuk</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Surat Keluar</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Diposisi</a></li>
    </ul>
</div>

<?php }
elseif ($this->session->userdata('level')=='2'){?>
  <div class="left-custom-menu-adp-wrap">
    <ul class="nav navbar-nav left-sidebar-menu-pro">
      <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Surat Masuk</a></li>
    </ul>
  </div>
<?php } ?>
