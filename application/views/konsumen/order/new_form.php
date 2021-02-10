<?php
// echo $id;
// print_r($klh);
// die;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("konsumen/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("konsumen/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("konsumen/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("konsumen/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('konsumen/order/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo site_url('konsumen/order/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="tgl_order">Tanggal Service</label>
                                <input class="form-control <?php echo form_error('tgl_order') ? 'is-invalid' : '' ?>" type="date" name="tgl_order" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tgl_order') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Pilih Keluhan Anda</label>
                                <input type="hidden" name="id_bengkel" value="<?= $id ?>">
                                <select name="keluhan" id="" <?php echo form_error('keluhan') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    foreach ($klh as $keluhan) : ?>
                                        <option value="<?= $keluhan['id_kel'] ?>"><?= $keluhan['keluhan'] ?> (<?= $keluhan['harga'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('keluhan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan"> Detail Keluhan Anda</label>
                                <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" type="text" name="keterangan" placeholder="" />

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
                <?php $this->load->view("konsumen/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("konsumen/_partials/scrolltop.php") ?>

        <?php $this->load->view("konsumen/_partials/js.php") ?>

</body>

</html>