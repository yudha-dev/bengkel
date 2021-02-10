<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Bengkel ku</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyDWpzFOd_fkmkUEAaAlyrd8nC18s2w6f-Q" type="text/javascript"></script>




    <?php $this->load->view("bengkel/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("bengkel/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("bengkel/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("bengkel/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('bengkel/bengkel/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('bengkel/bengkel/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="pemilik">Nama Pemilik</label>
                                <input class="form-control <?php echo form_error('pemilik') ? 'is-invalid' : '' ?>" type="text" name="pemilik" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('pemilik') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namabengkel">Nama Bengkel</label>
                                <input class="form-control <?php echo form_error('namabengkel') ? 'is-invalid' : '' ?>" type="text" name="namabengkel" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('namabengkel') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="" <?php echo form_error('jenis') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    foreach ($jen as $jenis) : ?>
                                        <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['jenis_bengkel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input class="form-control <?php echo form_error('telephone') ? 'is-invalid' : '' ?>" type="text" name="telephone" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('telephone') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diskripsi">Diskripsi Bengkel</label>
                                <input class="form-control <?php echo form_error('diskripsi') ? 'is-invalid' : '' ?>" type="text" name="diskripsi" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('diskripsi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input class="form-control <?php echo form_error('longitude') ? 'is-invalid' : '' ?>" type="text" name="longitude" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('longitude') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input class="form-control <?php echo form_error('latitude') ? 'is-invalid' : '' ?>" type="text" name="latitude" placeholder="" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('latitude') ?>
                                </div>
                            </div>
                            <div id="mapdiv" style="width:100%;height:380px;"></div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15846.841270562261!2d110.83345946324232!3d-6.805050587777093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c4c8f6545eef%3A0xc5a6d1591a7539b3!2sKudus%2C%20Kec.%20Kota%20Kudus%2C%20Kabupaten%20Kudus%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1600753965620!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('foto') ?>
                                </div>
                                <div id="show_maps" style="width:100%;height:100%;"></div>
                                .
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />

                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("bengkel/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("bengkel/_partials/scrolltop.php") ?>

    <?php $this->load->view("bengkel/_partials/js.php") ?>
    <!-- Elemen yang akan menjadi kontainer peta -->


</body>

</html>