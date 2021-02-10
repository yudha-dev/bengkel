<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Order Service</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal</label>
                <input class="form-control" id="exampleFormControlInput1" type="text" value="<?= longdate_indo(date('Y-m-d')) ?>" disabled style="background:white;">
            </div>
            <a href="<?php echo site_url('konsumen/lokasi_service/' . $kend->id_kend) ?>" class="btn btn-block btn-hijau">Lokasi Service</a>
        </form>
    </div>
</div>