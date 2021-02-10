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
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('admin/tipe/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $tipe->id_tipe ?>" />

                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <select name="merk" id="<?php echo form_error('merk') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $idm = $tipe->id_tipe;
                                    $result = $this->db->query("SELECT * FROM tipe_kend WHERE id_tipe ='$idm'")->row_array();
                                    foreach ($tp as $merk) : ?>
                                        <option value="<?= $merk['id_merk'] ?>" <?= ($result['id_merk'] == $merk['id_merk'] ? 'selected' : '') ?>><?= $merk['merk'] ?></option> <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('merk') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <input class="form-control <?php echo form_error('merk') ? 'is-invalid' : '' ?>" type="text" name="tipe" placeholder="" value="<?php echo $tipe->tipe ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tipe') ?>
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