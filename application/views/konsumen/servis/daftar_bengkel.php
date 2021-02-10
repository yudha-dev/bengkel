<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Daftar Bengkel</h6>
    </div>
    <div class="card-body">

        <div class="container">
            <div class="row justify-content-md-center">
                <?php foreach ($jenis as $jns) : ?>
                    <div class="col-md-auto col-lg-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="<?= $jns->namabengkel ?>" style="background:white;" disabled>
                            <div class="input-group-append">
                                <a href="<?= site_url('konsumen/detail_bengkel/' . $jns->id_bengkel) ?>" class="btn btn-hijau ml-3" type="button">View</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <a href="<?php echo site_url('konsumen/lokasi_service/' . $kend) ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</div>