<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Login Form </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Latest Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css') ?>" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome.min.css') ?>" type="text/css" media="all" />
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web-fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- sweetalert2 -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <div class="main-bg">
        <!-- title -->
        <h1></h1>
        <!-- //title -->
        <!-- content -->
        <div class="sub-main-w3">
            <div class="bg-content-w3pvt">
                <div class="top-content-style">
                    <img src=<?php echo base_url('assets/login/images/user211.png') ?> alt="" />
                </div>

                <form action="<?php echo base_url() . 'auth/auth' ?>" method="post">
                    <p class="legend" style="font-family: 'Black Ops One', cursive">BENGKEL KU</p>
                    <div class="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="input">
                        <select name="level" style="width: 100%;height:40px; border-color: #266a6b; box-shadow: 2px 5px 16px 2px rgba(16, 16, 16, 0.18);" id="" required>
                            <option value="">--pilih login sebagai-- </option>
                            <option value="Konsumen"> KONSUMEN </option>
                            <option value="Bengkel"> BENGKEL </option>

                        </select>
                    </div>
                    <div class="input">
                        <input type="text" placeholder="username" name="username" required />
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password" name="password" required />
                        <span class="fa fa-unlock"></span>
                    </div>
                    <button type="submit" class="btn submit" value="Log In">
                        <span class="fa fa-sign-in"></span>
                    </button>

                </form>
                <a href="<?php echo base_url() . 'auth/register_beng' ?>" class="bottom-text-w3ls">Bengkel Registration</a>

                <a href="<?php echo base_url() . 'auth/register_kons' ?>" class="bottom-text-w3ls">Konsumen Registration</a>

            </div>


        </div>
        <!-- //content -->
        <!-- copyright -->

        <!-- //copyright -->
    </div>



</body>

</html>

<?php if ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            swal({
                title: 'Regristrasi Berhasil !',
                html: 'Silahkan konfirmasi ke telegram, untuk mendapatkan username dan password akun anda' +

                    '</p><br><a target="_BLANK" href="https://t.me/bengkelkudus_bot" class="button" style="">  Link Telegram</a>',
                type: 'success',
                allowOutsideClick: false,
                showCancelButton: true,
                showConfirmButton: false,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Cetak',
                cancelButtonText: 'Selesai'
            });
        });
    </script>
<?php else : ?>
<?php endif; ?>