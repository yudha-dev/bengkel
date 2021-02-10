<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Profil Bengkel</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/foto_bengkel/' . $bengkel->foto) ?>" alt="">
                        <!-- Profile picture help block-->
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('konsumen/add_bengkel') ?>" method="POST">
                            <!-- Form Row-->
                            <input type="hidden" name="bengkel" value="<?= $bengkel->id_bengkel ?>">
                            <div class="form-row">
                                <!-- Form Group (first name)-->
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="inputUsername">Nama Bengkel</label>
                                    <input class="form-control" id="inputUsername" type="text" value="<?= $bengkel->namabengkel ?>" style="background:white;" disabled>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="inputLastName">Nomor Hp</label>
                                    <input class="form-control" id="inputUsername" type="text" value="<?= $bengkel->telephone ?>" style="background:white;" disabled>
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="form-row mb-2">
                                <!-- Form Group (organization name)-->
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="inputLastName">Alamat Bengkel</label>
                                    <input class="form-control" id="inputUsername" type="text" value="<?= $bengkel->alamat ?>" style="background:white;" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="inputLastName">Deskripsi Bengkel</label>
                                    <input class="form-control" id="inputUsername" type="text" value="<?= $bengkel->diskripsi ?>" style="background:white;" disabled>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="col-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50%">Pelanggan</th>
                                <th style="width: 50%">Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($review as $r) : ?>
                                <tr>
                                    <td><?= $r->nama ?></td>
                                    <td><?= $r->isi ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-block btn-hijau mb-3">Input Keluhan</button>
                    </form>
                    <div class="col text-center">
                        <a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>