<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <img src=<?php echo base_url('assets/login/images/user211.png') ?> style="width:100%; max-width:130px;" />

    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('konsumen') ?>">
            <i class="fas fa-user-circle fa-fw"></i> <?php echo $this->session->userdata('nama'); ?>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'konsumen' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span><b>Akun Anda</b></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('konsumen/Konsumen') ?>"><b>Data Anda</b></a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'kendaraan' ? 'active' : '' ?><?php echo $this->uri->segment(2) == 'service' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span><b>Kendaraan Anda</b></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('konsumen/kendaraan') ?>"><b>Data Kendaraan</b></a>
        </div>


    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'servis' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span><b>Garasi Service</b></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('konsumen/servis/data_servis') ?>"><b>Order Service</b></a>

        </div>

    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'konsumen' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-sign-out-alt"></i> <span><b>LOGOUT</b></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">logout</a>
        </div>

    </li>

</ul>