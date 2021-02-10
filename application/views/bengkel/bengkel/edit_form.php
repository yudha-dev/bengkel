<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="keywords" content="get lattitude longitude, latlng onclick google map, latlng onmousemove google map, get lattitude longitude onclick, google map mouse event, show lattitude longutude onmousemove, show latlng onclick">
    <meta name="description" content="Get lattitude and longitude when onmouseover and onmouseclick in google map version 2" />
    <title>Bengkel ku</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyBZIDaQcr_1v0YbvMURQqnmW1LoTPc_PlI" type="text/javascript"></script>

    <?php $this->load->view("bengkel/templates/head.php") ?>
    <style type="text/css">
        body {
            font: 10pt arial;
        }

        .main {
            text-align: center;
            font: 12pt Arial;
            width: 100%;
            height: auto;
        }

        .eventtext {
            width: 100%;
            margin-top: 20px;
            font: 10pt Arial;
            text-align: left;
            line-height: 25px;
            background-color: #EDF4F8;
            padding: 5px;
            border: 1px dashed #C2DAE7;
        }

        #mapa {
            width: 100%;
            height: 340px;
            border: 5px solid #DEEBF2;
        }

        ul {
            font: 10pt arial;
            margin-left: 0px;
            padding: 5px;
        }

        /* li {
            margin-left: 0px;
            padding: 5px;
            list-style-type: decimal;
        } */

        .code {
            border: 1px dashed #cecece;
            background-color: #F7F7F7;
            padding: 5px;
        }

        .small {
            font: 9pt arial;
            color: gray;
            padding: 2px;
        }

        .jimi {
            margin: 0px;
        }
    </style>
    <?php $this->load->view("bengkel/templates/head.php") ?>
    <?php $id_u = $bengkel->id_user;
    $pl = $this->db->query("SELECT * FROM bengkel a JOIN user b ON a.id_user=b.id_user WHERE a.id_user='$id_u'")->row(); ?>
</head>

<body id="page-top">

    <?php $this->load->view("bengkel/templates/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("bengkel/templates/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("bengkel/templates/breadcrumb.php") ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('bengkel/bengkel/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $bengkel->id_bengkel ?>" />
                            <div class="form-group">
                                <label for="pemilik">Nama Pemilik</label>
                                <input class="form-control <?php echo form_error('pemilik') ? 'is-invalid' : '' ?>" type="text" name="pemilik" placeholder="" value="<?php echo $pl->nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('pemilik') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namabengkel">Nama Bengkel</label>
                                <input class="form-control <?php echo form_error('namabengkel') ? 'is-invalid' : '' ?>" type="text" name="namabengkel" placeholder="" value="<?php echo $bengkel->namabengkel ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('namabengkel') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="<?php echo form_error('jenis') ? 'is-invalid' : '' ?>" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php
                                    $idb = $bengkel->id_jenis;
                                    $result = $this->db->query("SELECT * FROM jenis_bengkel WHERE id_jenis ='$idb'")->row_array();
                                    foreach ($jen as $jenis) : ?>
                                        <option value="<?= $jenis['id_jenis'] ?>" <?= ($result['id_jenis'] == $jenis['id_jenis'] ? 'selected' : '') ?>><?= $jenis['jenis_bengkel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('jenis') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="" value="<?php echo $bengkel->alamat ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input class="form-control <?php echo form_error('telephone') ? 'is-invalid' : '' ?>" type="text" name="telephone" placeholder="" value="<?php echo $bengkel->telephone ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('telephone') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="" value="<?php echo $bengkel->email ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diskripsi">Deskripsi Bengkel</label>
                                <input class="form-control <?php echo form_error('diskripsi') ? 'is-invalid' : '' ?>" type="text" name="diskripsi" placeholder="" value="<?php echo $bengkel->diskripsi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('diskripsi') ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input class="form-control <?php echo form_error('longitude') ? 'is-invalid' : '' ?>" type="text" name="longitude" placeholder="" value="<?php echo $bengkel->longitude ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('longitude') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input class="form-control <?php echo form_error('latitude') ? 'is-invalid' : '' ?>" type="text" name="latitude" placeholder="" value="<?php echo $bengkel->latitude ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('latitude') ?>
                                </div>
                            </div>
                            <div class="main">

                                <div style="width:70%; margin:0px auto;">
                                    <div id="mapa"></div>
                                    <div class="eventtext">
                                        <div>Latitude: <span id="latspan"></span></div>

                                        <div>Longitude: <span id="lngspan"></span></div>

                                    </div>
                                </div>

                            </div>
                            <script type="text/javascript">
                                if (GBrowserIsCompatible()) {
                                    map = new GMap2(document.getElementById("mapa"));
                                    map.addControl(new GLargeMapControl());
                                    map.addControl(new GMapTypeControl(3));
                                    map.setCenter(new GLatLng(-6.8009597, 110.8229023), 11, 0);

                                    GEvent.addListener(map, 'mousemove', function(point) {
                                        document.getElementById('latspan').innerHTML = point.lat()
                                        document.getElementById('lngspan').innerHTML = point.lng()
                                        // document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()
                                    });

                                    GEvent.addListener(map, 'click', function(overlay, point) {
                                        document.getElementById('latonclicked').value = point.lat()
                                        document.getElementById('longonclicked').value = point.lng()
                                    });
                                }
                            </script> -->
                            <div id="show_maps" style="width:100%;height:100%;"></div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" />
                                <input type="hidden" name="foto" value="<?php echo $bengkel->foto ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('foto') ?>
                                </div>
                            </div>
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("bengkel/templates/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("bengkel/templates/scrolltop.php") ?>

        <?php $this->load->view("bengkel/templates/js.php") ?>

</body>

</html>