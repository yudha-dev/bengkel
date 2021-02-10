<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("konsumen/templates/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("konsumen/templates/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("konsumen/templates/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("konsumen/templates/breadcrumb.php") ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('konsumen/kendaraan/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $kendaraan->id_kend ?>" />

                            <div class="form-group">
                                <label for="jenis_kend">Jenis Kendaraan</label>
                                <select name="jenis_kend" id="<?php echo form_error('jenis_kend') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $id = $kendaraan->id_jnskend;
                                    $result = $this->db->query("SELECT * FROM jenis_kend WHERE id_jnskend ='$id'")->row_array();
                                    foreach ($jn as $jenis_kend) : ?>
                                        <option value="<?= $jenis_kend['id_jnskend'] ?>" <?= ($result['id_jnskend'] == $jenis_kend['id_jnskend'] ? 'selected' : '') ?>><?= $jenis_kend['jenis_kend'] ?></option> <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis_kend') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <select name="merk" id="<?php echo form_error('merk') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $id = $kendaraan->id_merk;
                                    $result = $this->db->query("SELECT * FROM merk_kend WHERE id_merk ='$id'")->row_array();
                                    foreach ($mrk as $merk) : ?>
                                        <option value="<?= $merk['id_merk'] ?>" <?= ($result['id_merk'] == $merk['id_merk'] ? 'selected' : '') ?>><?= $merk['merk'] ?></option> <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('merk') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select name="tipe" id="<?php echo form_error('tipe') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $id = $kendaraan->id_tipe;
                                    $result = $this->db->query("SELECT * FROM tipe_kend WHERE id_tipe ='$id'")->row_array();
                                    foreach ($tp as $tipe) : ?>
                                        <option value="<?= $tipe['id_tipe'] ?>" <?= ($result['id_tipe'] == $tipe['id_tipe'] ? 'selected' : '') ?>><?= $tipe['tipe'] ?></option> <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tipe') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input class="form-control <?php echo form_error('tahun') ? 'is-invalid' : '' ?>" type="text" name="tahun" placeholder="" value="<?php echo $kendaraan->tahun ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tahun') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_plat">No. Plat</label>
                                <input class="form-control <?php echo form_error('no_plat') ? 'is-invalid' : '' ?>" type="text" name="no_plat" placeholder="" value="<?php echo $kendaraan->no_plat ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('no_plat') ?>
                                </div>
                            </div>
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("konsumen/templates/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("konsumen/templates/scrolltop.php") ?>

        <?php $this->load->view("konsumen/templates/js.php") ?>

</body>

</html>