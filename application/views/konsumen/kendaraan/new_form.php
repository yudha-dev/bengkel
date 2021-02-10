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

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('konsumen/kendaraan/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('konsumen/kendaraan/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="jenis_kend">Jenis Kendaraan</label>
                                <select name="jenis_kend" id="jenis_kend" <?php echo form_error('jenis_kend') ? 'is-invalid' : '' ?>" class="form-control select2">
                                    <option value="">- PILIH -</option>
                                    <?php

                                    foreach ($jn as $jenis_kend) : ?>
                                        <option value="<?= $jenis_kend['id_jnskend'] ?>"><?= $jenis_kend['jenis_kend'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis_kend') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <select name="merk" id="id_merk" <?php echo form_error('merk') ? 'is-invalid' : '' ?>" class="form-control select2">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    foreach ($mrk as $merk) : ?>
                                        <option class="<?= $merk['id_jnskend'] ?>" value="<?= $merk['id_merk'] ?>"><?= $merk['merk'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('merk') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select name="tipe" id="tipe" <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" class="form-control select2">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    foreach ($tp as $tipe) : ?>
                                        <option class="<?= $tipe['id_merk'] ?>" value="<?= $tipe['id_tipe'] ?>"><?= $tipe['tipe'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tipe') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" id="" <?php echo form_error('tahun') ? 'is-invalid' : '' ?>" class="form-control select2">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x = $thn_skr; $x >= 2000; $x--) {
                                    ?>
                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tahun') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_plat">No Plat</label>
                                <input class="form-control <?php echo form_error('no_plat') ? 'is-invalid' : '' ?>" type="text" name="no_plat" placeholder="" />
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            width: '100%'
        });
    });
    $("#id_merk").chained("#jenis_kend");
    $("#tipe").chained("#id_merk");
</script>