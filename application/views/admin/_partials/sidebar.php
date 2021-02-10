<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <img src=<?php echo base_url('assets/login/images/user211.png') ?> style="width:100%; max-width:150px;" />

    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ADMINISTRATOR</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'superadmin' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun Anda</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/superadmin') ?>">Data Anda</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Data Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="<?php echo site_url('') ?>">Perbarui Data Anda</a> -->
            <a class="dropdown-item" href="<?php echo site_url('admin/adm_kendaraan') ?>">Data Kendaraan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jenis') ?>">Jenis Bengkel</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jeniskend') ?>">Jenis Kendaraan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/merk') ?>">Merk Kendaraan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/tipe') ?>">Tipe Kendaraan</a>

        </div>

    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jenis' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Bengkel</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/pendaftaran') ?>">Konfirmasi Bengkel</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/adm_bengkel') ?>">Data Bengkel</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/adm_ub') ?>">Data User Bengkel</a>
        </div>

    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jeniskend' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Konsumen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/adm_konsumen') ?>">Data Konsumen</a>


        </div>


    </li>

</ul>