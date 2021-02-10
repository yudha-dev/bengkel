<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('admin/merk/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $merk->id_merk ?>" />
                            <div class="form-group">
                                <label for="jenis_kend">Jenis Kendaraan</label>
                                <select name="jenis_kend" id="<?php echo form_error('jenis_kend') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $idm = $merk->id_merk;
                                    $result = $this->db->query("SELECT * FROM merk_kend WHERE id_merk ='$idm'")->row_array();
                                    foreach ($mrk as $jenis_kend) : ?>
                                        <option value="<?= $jenis_kend['id_jnskend'] ?>" <?= ($result['id_jnskend'] == $jenis_kend['id_jnskend'] ? 'selected' : '') ?>><?= $jenis_kend['jenis_kend'] ?></option> <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis_kend') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input class="form-control <?php echo form_error('merk') ? 'is-invalid' : '' ?>" type="text" name="merk" placeholder="" value="<?php echo $merk->merk ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('merk') ?>
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
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>