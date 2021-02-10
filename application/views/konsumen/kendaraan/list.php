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
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php $this->load->view("konsumen/templates/breadcrumb.php") ?>
                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('konsumen/kendaraan/add') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Jenis kendaraan</th>
                                        <th>Merk</th>
                                        <th>Tipe</th>
                                        <th>Tahun</th>
                                        <th>No Plat</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kendar as $kendaraan) : ?>
                                        <tr>
                                            <td width="150">
                                                <?= $kendaraan->jenis_kend ?>
                                            </td>
                                            <td>
                                                <?= $kendaraan->merk ?>
                                            </td>
                                            <td width="150">
                                                <?= $kendaraan->tipe ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $kendaraan->tahun ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $kendaraan->no_plat ?>
                                            </td>
                                            <td width="350">

                                                <a href="<?php echo site_url('konsumen/kendaraan/edit/' . $kendaraan->id_kend) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('konsumen/kendaraan/delete/' . $kendaraan->id_kend) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            <td width="150">
                                                <a href="<?php echo site_url('konsumen/service/' . $kendaraan->id_kend) ?>" class="btn btn-outline-success" type="submit"><i class="fas fa-shipping-fast"></i> Order Service</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <?php $this->load->view("konsumen/templates/modal.php") ?>

    <?php $this->load->view("konsumen/templates/js.php") ?>


    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>