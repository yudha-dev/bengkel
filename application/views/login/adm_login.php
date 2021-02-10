<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
                <form action="<?php echo base_url() . 'auth/superadmin' ?>" method="post">
                    <p class="legend" style="font-family: 'Black Ops One', cursive">ADMINISTRATOR</p>

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
                <a href="#" class="bottom-text-w3ls"></a>
            </div>


        </div>
        <!-- //content -->
        <!-- copyright -->

        <!-- //copyright -->
    </div>



</body>

</html>