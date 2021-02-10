<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Review Bengkel</h6>
    </div>
    <div class="card-body">

        <div class="container">
            <form action="<?= base_url('konsumen/servis/add_review') ?>" method="POST">
                <div class="row justify-content-md-center">
                    <h3>Terimakasih atas kepercayaan anda kepada bengkel kami</h3>
                    <input type="hidden" name="id_bengkel" value="<?= $bengkel->id_bengkel ?>">
                    <input type="hidden" name="id_kend" value="<?= $detail->id_kend ?>">
                    <textarea class="form-control mt-2" name="isi" rows="7" cols="50" placeholder="Silahkan masukan review anda tentang pelayanan bengkel <?= $bengkel->namabengkel ?>" required></textarea>
                    <button type="submit" class="btn btn-hijau mt-3">Kirim Review</button>
                </div>
            </form>
        </div>
    </div>
</div>