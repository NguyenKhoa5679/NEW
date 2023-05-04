<?php

use App\Models\TheLoai;

$theLoaiList = TheLoai::all();
?>


<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/Logo.png" type="image/x-icon"/>

    <title>
        <?= $this->e($title) ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        a {
            text-decoration: none;
            color: #000;
        }

        .nav-border {
            content: " ";
            display: block;
            background: linear-gradient(to right, #D9298A 5%, #BF2C98 15%, #8332A6, #7C39BF, #403BBF);
            height: 3px;
            width: 150%;


        }

        .dropdown-menu {
            min-width: 200px;
        }

        .dropdown-menu.columns-2 {
            min-width: 400px;
        }

        .dropdown-menu.columns-3 {
            min-width: 600px;
        }

        .dropdown-menu li a {
            padding: 5px 15px;
            /* font-weight: 300; */
        }

        .multi-column-dropdown {
            list-style: none;
            margin: 0px;
            padding: 0px;
        }

        .multi-column-dropdown li a {
            display: block;
            clear: both;
            line-height: 1.428571429;
            color: #333;
            white-space: normal;
        }

        .multi-column-dropdown li a:hover {
            text-decoration: none;
            color: #262626;
            background-color: #999;
        }

        @media (max-width: 767px) {
            .dropdown-menu.multi-column {
                min-width: 240px !important;
                overflow-x: hidden;
            }
        }

        li > a {
            font-size: 20px;
        }

        .dropdown-toggle {
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="/css/home.css">
    <?= $this->section("page_specific_css") ?>
</head>

<body>

<div class="container fixed-top bg-light px-5">
    <!-- <div class="nav-border"></div> -->
    <div class="navbar navbar-expand-lg  px-1">
        <div class="fixed-top bg-light">
            <!-- <div class="nav-border"></div> -->
            <nav class="navbar navbar-expand-lg  px-3">
                <div class="container-fluid px-5 mx-5">
                    <a href="/home" class="navbar-branch"
                       style="width: 12%; min-width: 70px; max-width: 120px; max-height: 70px;"><img
                            src="/img/logo_nav.png" style="width: 90%;"/></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-start" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/home">Trang chủ</a>

                            <div class="dropdown">
<!--                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thể-->
<!--                                    loại<b class="caret"></b></a>-->
                                <a href="" class="nav-link" data-bs-toggle="dropdown">Thể
                                    loại<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-2">
                                    <div class="row">
                                        <div class="col-sm">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                for ($i = 0; $i <= count($theLoaiList)/2; $i++) {
                                                    ?>
                                                    <li>
                                                        <a href="/theLoai?TL=<?= $theLoaiList[$i]->ten_theloai ?>"> <?= $theLoaiList[$i]->ten_theloai ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm">
                                            <ul class="multi-column-dropdown">
                                                <?php
                                                for ($i = floor(count($theLoaiList)/2)+1; $i < count($theLoaiList); $i++) {
                                                    ?>
                                                    <li>
                                                        <a href="/theLoai?TL=<?= $theLoaiList[$i]->ten_theloai ?>"> <?= $theLoaiList[$i]->ten_theloai ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="collapse navbar-collapse justify-content-end px-5 mx-5" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php if (!App\SessionGuard::isUserLoggedIn()): ?>
                            <li class="nav-link"><a href="/login">Login</a></li>
                            <li></li>
                            </li>
                            <li class="nav-link"><a href="/register">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    <?php //$this->e(App\SessionGuard::user->fullname) ?>
                                    <?php echo $_SESSION['fullname']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="/profile">Quản lý tài khoản</a>
                                    </li>

                                    <?php if (App\SessionGuard::isAdmin()): ?>
                                        <li>
                                            <a href="/admin">Quản trị</a>
                                        </li>
                                    <?php endif ?>

                                    <?php if (App\SessionGuard::isAuthor()): ?>
                                        <li>
                                            <a href="/myStory">Truyện của tôi</a>
                                        </li>
                                    <?php endif ?>
<!--                                    --><?php //if (App\SessionGuard::isReader()): ?>
                                        <li>
                                            <a href="/myFavorite">Danh sách yêu thích</a>
                                        </li>
<!--                                    --><?php //endif ?>

                                    <li>
                                        <a href="/logout" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                    </div>
                </div>

            </nav>

            <div class="nav-border"></div>
        </div>
    </div>
</div>

<?= $this->section("page") ?>

<footer class="footer">
    <div class="container-fluid bg-light mt-5 shadow-lg fixed-bottom"> <!-- set background footer -->
        <span>
            <div class="text-center">
               Copyright &copy By NguyenKhoa
            </div>
         </span>
    </div>

</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>

<script>
    $(document).ready(function () {
        new WOW().init();
    }
</script>

<?= $this->section("page_specific_js") ?>
</body>

</html>