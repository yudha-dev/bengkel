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
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jenis kendaraan</th>
                                <th>Merk</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $orders) : ?>
                                <tr>
                                    <td>
                                        <?= $orders->jenis_kend ?>
                                    </td>
                                    <td>
                                        <?= $orders->merk ?>
                                    </td>
                                    <td>
                                        <?= date_indo($orders->tanggal) ?>
                                    </td>
                                    <td>
                                        <?= $orders->alamat ?>
                                    </td>
                                    <td>
                                        <?php if ($orders->status == 'Penjemputan') : ?>
                                            <span class="badge badge-info">Penjemputan</span>
                                        <?php elseif ($orders->status == 'Sedang Service') : ?>
                                            <span class="badge badge-success">Sedang Servis</span>
                                        <?php elseif ($orders->status == 'Review') : ?>
                                            <span class="badge badge-primary">Berikan Review</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Selesai</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($orders->status == 'Penjemputan') : ?>
                                            <a href="<?= base_url('konsumen/servis/detail_servis/') . $orders->kode ?>" class="btn btn-primary">Detail Order</a>
                                        <?php elseif ($orders->status == 'Sedang Service') : ?>
                                            <a href="<?= base_url('konsumen/servis/detail_servis/') . $orders->kode ?>" class="btn btn-primary">Detail Order</a>
                                        <?php elseif ($orders->status == 'Review') : ?>
                                            <a href="<?= base_url('konsumen/servis/review/') . $orders->kode ?>" class="btn btn-primary">Review <i class="fas fa-star"></i> </a>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Selesai</span>
                                            <a href="<?= base_url('konsumen/service/lap_service/') . $orders->kode ?>" class="badge badge-warning"><i class="fas fa-print"></i> Cetak Nota</a>

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

</div>