<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-center m-0 font-weight-bold text-hijau">Lokasi Service</h6>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <div class="map-responsive">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.885806342004!2d110.86353531529956!3d-6.7837491682293845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52d5ac49401%3A0x98bc171685ba90ea!2sUniversitas%20Muria%20Kudus!5e0!3m2!1sid!2sid!4v1610779426742!5m2!1sid!2sid" width="1080" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->

                <body>
                    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
                    <div id="embedMap" style="width: 2000px; height: 550px;">
                        <!--Google map will be embedded here-->
                    </div>
                    <script>
                        function showPosition() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showMap, showError);
                            } else {
                                alert("Sorry, your browser does not support HTML5 geolocation.");
                            }
                        }

                        // Define callback function for successful attempt
                        function showMap(position) {
                            // Get location data
                            lat = position.coords.latitude;
                            long = position.coords.longitude;
                            var latlong = new google.maps.LatLng(lat, long);

                            var myOptions = {
                                center: latlong,
                                zoom: 16,
                                mapTypeControl: true,
                                navigationControlOptions: {
                                    style: google.maps.NavigationControlStyle.SMALL
                                }
                            }

                            var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
                            var marker = new google.maps.Marker({
                                position: latlong,
                                map: map,
                                title: "You are here!"
                            });
                        }

                        // Define callback function for failed attempt
                        function showError(error) {
                            if (error.code == 1) {
                                result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
                            } else if (error.code == 2) {
                                result.innerHTML = "The network is down or the positioning service can't be reached.";
                            } else if (error.code == 3) {
                                result.innerHTML = "The attempt timed out before it could get the location data.";
                            } else {
                                result.innerHTML = "Geolocation failed due to unknown error.";
                            }
                        }
                    </script>
                </body>

            </div>
            <button type="button" onclick="showPosition();">Show My Position on Google Map</button>
            <form action="<?= base_url('konsumen/add_service') ?>" method="POST">
                <input type="hidden" value="<?= $user->id_user ?>" name="id">
                <input type="hidden" value="<?= $user->jenis_kend ?>" name="jenis">
                <input type="hidden" value="<?= $user->id_kend ?>" name="id_kend">
                <div class="form-group mt-3">
                    <label for="exampleFormControlInput1">Alamat Lengkap</label>
                    <?php if (empty($alamat['alamat'])) : ?>
                        <input name="alamat" class="form-control text-center" id="exampleFormControlInput1" type="text" placeholder="Masukan Alamat Lengkap" required>
                    <?php else : ?>
                        <input name="alamat" class="form-control text-center" id="exampleFormControlInput1" type="text" value="<?= $alamat['alamat'] ?>" placeholder="Masukan Alamat Lengkap" required>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-block btn-hijau">Cari Bengkel</button>
            </form>
        </div>
    </div>
</div>
<script>

</script>