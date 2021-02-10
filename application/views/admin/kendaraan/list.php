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
                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <!-- <a href="<?php echo site_url('konsumen/kendaraan/add') ?>"><i class="fas fa-plus"></i> Add New</a> -->
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
                                </thead>
                                <tbody>
                                    <?php foreach ($kendaraan as $kendaraan) :
                                        $id = $kendaraan->id_jnskend;
                                        $idmerk = $kendaraan->id_merk;
                                        $idtipe = $kendaraan->id_tipe;
                                        $idusr = $kendaraan->id_user;
                                    ?>
                                        <tr>

                                            <td width="150">
                                                <?php
                                                $jn = $this->db->query("SELECT a.jenis_kend FROM jenis_kend a JOIN kendaraan b ON a.id_jnskend=b.id_jnskend WHERE a.id_jnskend='$id'")->row_array();
                                                echo $jn['jenis_kend'] ?>
                                            </td>
                                            <td width="150">
                                                <?php
                                                $mrk = $this->db->query("SELECT a.merk FROM merk_kend a JOIN kendaraan b ON a.id_merk=b.id_merk WHERE a.id_merk='$idmerk'")->row_array();
                                                echo $mrk['merk'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $tp = $this->db->query("SELECT a.tipe FROM tipe_kend a JOIN kendaraan b ON a.id_tipe=b.id_tipe WHERE a.id_tipe='$idtipe'")->row_array();
                                                echo $tp['tipe'] ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $kendaraan->tahun ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $kendaraan->no_plat ?>
                                            </td>
                                            <!-- <td width="250"> -->
                                            <!-- <a href="<?php echo site_url('konsumen/kendaraan/edit/' . $kendaraan->id_kend) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('konsumen/kendaraan/delete/' . $kendaraan->id_kend) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td> -->
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
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>


    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>