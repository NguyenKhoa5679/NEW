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

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>


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
        .bg-gray {
            background-color: #f8f9fa;
        }

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

<body class="bg-gray">
<main>
    <div class="container-fluid">

        <div class="row m-2">
            <aside class="col-2 mx-2 overflow">

                <a href="/home" class="navbar-branch">
                    <div class="container m-3 nav">

                        <img src="/img/logo_nav.png" style="width: 40%;"/>

                    </div>
                </a>
                <div class="nav-border w-100 mb-2" style="height: 1px"></div>

                <a href="/home">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-custom fa-solid fa-house "></i> Trang chủ

                    </div>
                </a>

                <a href="/admin/Users">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-solid fa-users fa-custom "></i> Quản lý người dùng

                    </div>
                </a>

                <a href="/admin/Books">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-custom fa-solid fa-book"></i> Quản lý truyện

                    </div>
                </a>

                <a href="/admin/Categories">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-custom fa-duotone fa-list"></i> Quản lý danh mục thể loại

                    </div>
                </a>

                <a href="/admin/Notification">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-custom fa-regular fa-flag"></i> Báo cáo truyện

                    </div>
                </a>

                <a href="/admin/Authors">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <i class="fa fa-custom fa-solid fa-hand"></i> Yêu cầu quyền tác giả

                    </div>
                </a>

                <a href="/logout">
                    <div class="shadow rounded-2 p-3 mt-4 hover">

                        <a href="/logout" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            <i class="fa fa-custom fa-solid fa-right-from-bracket"></i> Đăng xuất
                        </a>

                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        </form>



                    </div>
                </a>
            </aside>

            <div class="col mx-2">
                <?= $this->section("page") ?>
            </div>
        </div>

    </div>
</main>


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


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link
    href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css"
    rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->

<script>
    $(document).ready(function () {
        new WOW().init();
    }

</script>
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>

<?= $this->section("page_specific_js") ?>
</body>

</html>