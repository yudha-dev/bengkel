<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("konsumen/_partials/head.php");
    $id_user = $this->session->userdata('id');
    ?>
</head>

<body id="page-top">

    <?php $this->load->view("konsumen/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("konsumen/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("konsumen/_partials/breadcrumb.php") ?>
                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <?php $id = $this->session->userdata('id');
                        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
                        if ($val['level'] == 'Superadmin') :
                        ?>
                            <a href="<?php echo site_url('konsumen/orderku/add') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Bengkel</th>
                                        <th>Kendaraan</th>
                                        <th>Keluhan</th>
                                        <th>Keterangan</th>
                                        <th>Status Service</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order as $order) : ?>
                                        <tr>
                                            <td width="150">
                                                <?php echo $order->tgl_order ?>
                                            </td>
                                            <td>
                                                <?php echo $order->id_bengkel ?>
                                            </td>
                                            <td>
                                                <?php echo $order->id_kend ?>
                                            </td>
                                            <td>
                                                <?php echo $order->id_dorder ?>
                                            </td>
                                            <td>
                                                <?php echo $d_order->keterangan ?>
                                            </td>
                                            <td>
                                                <?php echo $status->status ?>
                                            </td>


                                            <td width="250">
                                                <a href="<?php echo site_url('konsumen/konsumen/edit/' . $id_user) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <?php $id = $this->session->userdata('id');
                                                $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
                                                if ($val['level'] == 'Superadmin') :
                                                ?>
                                                    <a onclick="deleteConfirm('<?php echo site_url('konsumen/konsumen/delete/' . $konsumen->id_user) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
            <?php $this->load->view("konsumen/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("konsumen/_partials/scrolltop.php") ?>
    <?php $this->load->view("konsumen/_partials/modal.php") ?>

    <?php $this->load->view("konsumen/_partials/js.php") ?>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>