<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Input Keluhan</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('konsumen/order') ?>" method="POST">

            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 100px;">No</th>
                            <th>Keluhan</th>
                            <th style="width: 300px">Harga</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody id="kel-data">
                        <?php $no = 1;
                        foreach ($keluhan as $kel) : ?>
                            <tr>
                                <td>
                                    <?= $no++  ?>
                                </td>
                                <td>
                                    <?= $kel->keluhan ?>
                                </td>
                                <td style="width: 200px" class="sum harga">
                                    <?= "Rp. " . number_format($kel->harga, 0, ',', '.') ?>
                                </td>
                                <td class="text-center" style="width: 200px">
                                    <input type="checkbox" name="keluhan[]" value="<?= $kel->id_kel ?>" class="chkclass" />
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mt-4 text-center">
                <div class="form-group">
                    <label class="text-center">Total Harga</label>
                    <input name="total" class="form-control text-center" id="sum" type="text" disabled>
                </div>
                <small class="text-danger">Centang Jika Mesin Mati</small>
                <div class="form-group">
                    <input type="checkbox" name="mesin" id="checkbox_id" value="ya" />
                    <label for="checkbox_id"> Mesin Mati </label>
                </div>

                <button type="submit" class="btn btn-block btn-hijau text-center">Order</button>
        </form>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            "bInfo": false,
            "ordering": false
        });
        $('#sum').val(function(index, value) {
            // If the element has a value, return it, else return "0"
            return value || "Rp. 0";
        });
        $('.chkclass').click(function() {
            var sum = 0;
            $('.chkclass:checked').each(function() {
                sum += parseInt($(this).closest('tr').find('.harga').text().replace(/[\$Rp. ]/g, '').replace(',', '.'));
            });
            var total = 'Rp. ' + sum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            $('#sum').val(total);
        });


    });
</script>