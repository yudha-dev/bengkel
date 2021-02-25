<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        <a href="http://localhost/bengkel/konsumen">Konsumen</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="http://localhost/bengkel/konsumen/servis">Servis</a>
    </li>
    <li class="breadcrumb-item active">
        Histori Servis </li>
</ol>
<!-- DataTables -->
<div class="card mb-3 mt-1">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Layanan</th>
                        <th>Harga</th>
                        <th>Mesin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail as $det) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date_indo($det->tanggal) ?></td>
                            <td><?= $det->keluhan ?></td>
                            <td><?= "Rp. " . number_format($det->harga, 0, ',', '.') ?></td>
                            <?php if ($det->harga_mesin == null) : ?>
                                <td>Tidak</td>
                            <?php else : ?>
                                <td><?= "Rp. " . number_format($det->harga_mesin, 0, ',', '.') ?></td>
                            <?php endif; ?>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center">
    <a href="<?= base_url('konsumen/servis/data_servis') ?>" class="btn btn-danger">Kembali</a>
</div>