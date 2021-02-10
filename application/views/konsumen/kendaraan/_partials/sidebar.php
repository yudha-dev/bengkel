<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('konsumen') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'konsumen' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun Anda</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="<?php echo site_url('konsumen/konsumen/new') ?>">Perbarui Data Anda</a> -->
            <a class="dropdown-item" href="<?php echo site_url('konsumen/Konsumen') ?>">Data Anda</a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'kendaraan' ? 'active' : '' ?><?php echo $this->uri->segment(2) == 'service' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kendaraan Anda</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="<?php echo site_url('konsumen/kendaraan/new') ?>">Perbarui Data Anda</a> -->
            <a class="dropdown-item" href="<?php echo site_url('konsumen/kendaraan') ?>">Data Kendaraan</a>
        </div>


    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'servis' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Garasi Service</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('konsumen/servis/data_servis') ?>">Order Service</a>
        </div>

    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'konsumen' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-sign-out-alt"></i> <span>LOGOUT</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">logout</a>
        </div>

    </li>

</ul>