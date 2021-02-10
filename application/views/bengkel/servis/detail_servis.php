<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Detail Keluhan</h6>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="col-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50%">Jenis Kendaraan : <?= $profil->jenis_kend ?></th>
                            </tr>
                            <tr>
                                <th class="text-center" style="width: 50%">Merk Kendaraan : <?= $profil->merk ?></th>
                            </tr>
                            <tr>
                                <th class="text-center" style="width: 50%">Nama Kendaraan : <?= $profil->tipe ?></th>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="col-auto">
                    <form action="<?= base_url('bengkel/servis/update_mesin') ?>" method="POST">
                        <input type="hidden" name="kode" value="<?= $profil->kode ?>">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50%">Keluhan</th>
                                    <th style="width: 50%">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail as $det) : ?>
                                    <tr>
                                        <td><?= $det->keluhan ?></td>
                                        <td><?= "Rp. " . number_format($det->harga, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if ($mesin->mesin == 'ya') : ?>
                                    <td>Mesin Mati</td>
                                    <td><input type="text" name="harga_mesin" class="form-control" id="harga" value="<?= $mesin->harga_mesin ?>" placeholder="Masukan harga" required></td>
                                <?php else : ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="col text-center">
                            <?php if ($mesin->mesin == 'ya') : ?>
                                <?php if ($mesin->harga_mesin == null) : ?>
                                    <button class="btn btn-hijau" type="submit">Simpan</button>
                                <?php else : ?>
                                <?php endif; ?>
                            <?php else : ?>
                            <?php endif; ?>
                            <a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#harga').on('keyup', function() {
            $(this).val(formatRupiah($(this).val(), "Rp. "));
        });

    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>