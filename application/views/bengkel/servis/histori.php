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
                        <th>Status</th>
                        <th>Keluhan</th>
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
                            <td><?= $ser->status ?></td>
                            <td><a href="<?= base_url('bengkel/servis/detail_servis/') . $ser->kode ?>" class="btn btn-hijau">Lihat</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>