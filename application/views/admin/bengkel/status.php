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
                        <form method="post" action="<?php echo base_url("admin/adm_bengkel/list") ?>">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select class="form-control" name="status">
                                    <option>--Pilih Status Bengkel--</option>
                                    <option value="EVALUASI">EVALUASI</option>
                                    <option value="AKTIF">AKTIF</option>
                                    <option value="NONAKTIF">NON AKTIF</option>
                                </select>
                                <br><input type="submit" class="btn btn-primary" value="Pilih">
                            </div>
                        </form>
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