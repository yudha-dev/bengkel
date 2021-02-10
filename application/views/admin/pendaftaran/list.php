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

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <th>Nama Bengkel</th>
                                        <th>Jenis</th>
                                        <th>Alamat</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bengkel as $bengkel) :
                                        $id = $bengkel->id_bengkel;
                                        $id_u = $bengkel->id_user;
                                    ?>
                                        <tr>

                                            <td width="150">
                                                <?php
                                                $pl = $this->db->query("SELECT * FROM bengkel a JOIN user b ON a.id_user=b.id_user WHERE a.id_user='$id_u'")->row();
                                                echo $pl->nama ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $bengkel->namabengkel ?>
                                            </td>
                                            <td>
                                                <?php
                                                $jn = $this->db->query("SELECT * FROM bengkel a JOIN jenis_bengkel b ON a.id_jenis=b.id_jenis WHERE a.id_bengkel='$id'")->row();
                                                echo $jn->jenis_bengkel ?>
                                            </td>
                                            <td>
                                                <?php echo $bengkel->alamat ?>
                                            </td>
                                            <td>
                                                <?php echo $bengkel->telephone ?>
                                            </td>
                                            <td>
                                                <?php echo $bengkel->email ?>
                                            </td>
                                            <td>
                                                <?php echo $bengkel->status ?>
                                            </td>


                                            <td width="250">
                                                <?php
                                                if ($bengkel->status == 'AKTIF') : ?>
                                                    <button class="btn btn-sm btn-success" disabled><span class="fa fa-check-circle"></span> Terima</button>
                                                <?php elseif ($bengkel->status == 'NONAKTIF') : ?>
                                                    <button class="btn btn-sm btn-danger" disabled><span class="fa fa-times"></span> Tidak</button>
                                                <?php else : ?>
                                                    <a href="<?php echo site_url('admin/pendaftaran/terima/' . $bengkel->id_bengkel) ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-check-circle"></i></i> Terima
                                                    </a>
                                                    <a href="<?php echo site_url('admin/pendaftaran/tidak/' . $bengkel->id_bengkel) ?>" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></i> Tidak</a>
                                                <?php endif; ?>
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