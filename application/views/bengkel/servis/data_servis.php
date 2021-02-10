<?= $this->session->flashdata('message'); ?>
<?php if ($this->session->flashdata('proses') == TRUE) : ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= $this->session->flashdata('proses') ?>.
    </div>
<?php elseif ($this->session->flashdata('selesai') == TRUE) : ?>
    <div class="alert alert-primary alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= $this->session->flashdata('selesai') ?>.
    </div>
<?php elseif ($this->session->flashdata('harga') == TRUE) : ?>
    <div class="alert alert-primary alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= $this->session->flashdata('harga') ?>.
    </div>
<?php endif; ?>
<!-- DataTables -->
<div class="card mb-3 mt-1">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Lokasi</th>
                        <th>Nomor Plat</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($servis as $ser) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ser->nama ?></td>
                            <td><?= $ser->lokasi ?></td>
                            <td><?= $ser->no_plat ?></td>
                            <td><?= date_indo($ser->tanggal) ?></td>
                            <td><a href="<?= base_url('bengkel/servis/detail_servis/') . $ser->kode ?>" class="btn btn-hijau">Lihat</a></td>
                            <td>
                                <?php if ($ser->status == 'Penjemputan') : ?>
                                    <a href="<?= base_url('bengkel/servis/proses_servis/') . $ser->id_kend ?>" class="btn btn-primary">Proses Servis</a>
                                <?php else : ?>
                                    <a href="<?= base_url('bengkel/servis/selesai_servis/') . $ser->id_kend ?>" class="btn btn-success">Selesaikan Servis</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>