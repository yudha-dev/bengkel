<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("bengkel/templates/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("bengkel/templates/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("bengkel/templates/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("bengkel/templates/breadcrumb.php") ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('bengkel/keluhan/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $keluhan->id_kel ?>" />

                            <div class="form-group">
                                <label for="keluhan">Layanan</label>
                                <input class="form-control <?php echo form_error('keluhan') ? 'is-invalid' : '' ?>" type="text" name="keluhan" placeholder="" value="<?php echo $keluhan->keluhan ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('keluhan') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>" type="text" name="harga" placeholder="" value="<?php echo $keluhan->harga ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('harga') ?>
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
                <?php $this->load->view("bengkel/templates/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("bengkel/templates/scrolltop.php") ?>

        <?php $this->load->view("bengkel/templates/js.php") ?>

</body>

</html>