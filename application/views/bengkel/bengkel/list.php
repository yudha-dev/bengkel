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
                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('bengkel/bengkel/add') ?>"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Diskripsi Bengkel</th>
                                        <!-- <th>Longitude</th>
                                        <th>Latitude</th> -->
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bengkel as $bengkel) :
                                        $id = $bengkel->id_bengkel;
                                        $id_u = $bengkel->id_user; ?>
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
                                                <?php echo $bengkel->diskripsi ?>
                                            </td>
                                            <!-- <td>
                                                <?php echo $bengkel->longitude ?>
                                            </td>
                                            <td>
                                                <?php echo $bengkel->latitude ?>
                                            </td> -->
                                            <td>
                                                <img src="<?php echo base_url('assets/foto_bengkel/' . $bengkel->foto) ?>" width="64" />
                                            </td>
                                            <td width="250">
                                                <a href="<?php echo site_url('bengkel/bengkel/edit/' . $bengkel->id_bengkel) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('bengkel/bengkel/delete/' . $bengkel->id_bengkel) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
            <?php $this->load->view("bengkel/templates/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("bengkel/templates/scrolltop.php") ?>
    <?php $this->load->view("bengkel/templates/modal.php") ?>

    <?php $this->load->view("bengkel/templates/js.php") ?>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>