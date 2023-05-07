<?php use App\Models\Book;
use App\Models\Chapter;
use App\Models\TheLoai;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php
$BookInfo = Book::getBook($this->e($id));
$Chaters = Chapter::all()->where('truyen_id', $this->e($id));
$tacgia = $BookInfo->TacGia;

$theLoaiList = explode(", ", $BookInfo->truyen_theloai);
$TruyenTheLoai = [];
foreach ($theLoaiList as &$value) {
    $theLoai = TheLoai::getTheLoai(intval($value));
    array_push($TruyenTheLoai, $theLoai->ten_theloai);
}
$sochuong = Chapter::countChapter($BookInfo->truyen_id);

?>

<?php $this->start("page") ?>
    <div tabindex="-1" class="container-fluid info-book shadow">
        <div class="m-2 w-100">
            <div style="padding-bottom: 2em; width: 100%; gap: 8px"></div>
            <div class=" mx-4 mt-n6">
                <form action="/handleEditBook" method="POST">
                    <div class="section-content row pb-1 pt-5 ">
                        <div class="col-2 mt-4">
                            <img src="<?= $BookInfo->truyen_img ?>"
                                 class="img-book rounded border-light border-2"/>
                        </div>

                        <div class="col-9 m-0">
                            <h1 class="name-book">

                                <i class="fs-4 fa fa-thin fa-pen-fancy fa-2xs" style="color: #ffffff;"></i>
                                <input class="w-90 bg-transparent border-0 text-white fc-custom"
                                       name="tenTruyen"
                                       value="<?= $BookInfo->truyen_ten ?>">

                            </h1>

                            <div class="row">
                                <div class="col" style="color: white;">
                                    <div class="row fw-bold">
                                        <span class="col-3">
                                            <i class="fa fa-thin fa-pen-fancy fa-2xs" style="color: #ffffff;"></i>
                                            Tác giả:
                                        </span>

                                        <div class="col row">
                                            <input class="bg-transparent border-0 text-white fc-custom"
                                                   name="tacGia"
                                                   value="<?= $tacgia ?>">
                                        </div>

                                    </div>
                                    <div class="row ">
                                        <span class="col-3">
                                            Ngày đăng:
                                        </span>
                                        <span class="col"> <?= $BookInfo->truyen_ngaydang ?></span>
                                    </div>
                                    <div class="row ">
                                        <span class="col-3">Số chương: </span>
                                        <span class="col"> <?= $sochuong ?></span>
                                    </div>

                                    <div class="row fw-bold">
                                        <span class="col-3">
                                            <i class="fa fa-thin fa-pen-fancy fa-2xs" style="color: #ffffff;"></i>
                                            Thể loại:
                                        </span>
                                        <select class="col theLoai form-select bg-transparent border-0 w-50"
                                                name="theLoai[]"
                                                multiple="multiple">
                                            <?php $theloaiList = TheLoai::getListTheLoai();
                                            foreach ($theloaiList as &$theloai) { ?>
                                                <?php if (in_array($theloai->ten_theloai, $TruyenTheLoai)) { ?>
                                                    <option value="<?= $theloai->truyen_theloai ?>" selected>
                                                        <?= $theloai->ten_theloai ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?= $theloai->truyen_theloai ?>">
                                                        <?= $theloai->ten_theloai ?>
                                                    </option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>

                                        <!--                                        <input class="col bg-transparent border-0 text-white fc-custom" value="">-->
                                    </div>
                                    <!--// TODO: Input thể loại-->


                                    <div class="row fw-bold">
                                        <span class="col-3">
                                            <i class="fa fa-thin fa-pen-fancy fa-2xs" style="color: #ffffff;"></i>
                                            Tình trạng:
                                        </span>
                                        <input class="col bg-transparent border-0 text-white fc-custom"
                                               name="tinhTrang"
                                               value="<?= $BookInfo->truyen_tinhtrang ?>">
                                    </div>

                                    <div class="row text-white fw-bold"
                                         style=" block-size: fit-content;height: 120px">
                                        <span class="col-3">
                                            <i class="fa fa-thin fa-pen-fancy fa-2xs" style="color: #ffffff;"></i>
                                            Mô tả:
                                        </span>
                                        <textarea
                                            class="col form-control bg-transparent border-0 text-white fc-custom fs-4"
                                            name="moTa"
                                        ><?= $BookInfo->truyen_mota ?></textarea>
                                    </div>

                                    <div class="custom-btn">
                                        <input type="text" value="<?= $BookInfo->truyen_id ?>" hidden="hidden"
                                               name="idTruyen">
                                        <button class="btn button primary fw-bold" type="submit"
                                                style="background: white;">Lưu thay đổi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid  about-book mx-3  mt-3 mb-5 row">
        <section class="col-9">
            <div class="row">
                <h2 class="about-book-info col">Danh sách chương</h2>
                <form method="POST" action="/addChapter" class="col-2">
                    <input name="idTruyen" value="<?= $BookInfo->truyen_id ?>" hidden="hidden">
                    <button type="submit" class="btn w-100 text-center fw-bold fs-5 bg-custom"
                            style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                        <i class="fa-solid fa-plus fa-xs"></i> Chương mới
                    </button>
                </form>
            </div>
            <div class="container border rounded shadow">
                <?php foreach ($Chaters as $key => $Chapter) { ?>
                    <div class="container p-3 border-bottom row">
                        <a class="col" href=<?= "/showChapter?truyen={$this->e($id)}&chuong={$Chapter->chuong_id}" ?>>
                            Chương <?= $Chapter->chuong_so . ' : ' . $Chapter->chuong_ten ?>
                        </a>
                        <span class="col-2">
                                <i class="fa fa-thin fa-eye fa-2xs"></i>
                                Lượt xem: <?= $Chapter->luotxem ?>
                            </span>
                        <form action="/editChapter" method="POST" class="col-1">
                            <input name="idChuong" value="<?= $Chapter->chuong_id ?>" hidden="hidden">
                            <button type="submit" class="btn fs-5">
                                <i class="fa fa-thin fa-pen-to-square"></i>
                                Sửa
                            </button>

                        </form>
                        <form action="/deleteChapter" method="POST" class="col-1">
                            <input name="idChuong" value="<?= $Chapter->chuong_id ?>" hidden="hidden">
                            <button type="submit" class="btn fs-5">
                                <i class="fa fa-light fa-trash"></i>
                                Xóa
                            </button>

                        </form>

                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="col-3">
            <div class="row">
                <h2 class="about-book-info col">Bình Luận</h2>
                <form method="POST" action="/addChapter" class="col-5">
                    <input name="idTruyen" value="<?= $BookInfo->truyen_id ?>" hidden="hidden">
                    <button type="submit" class="btn w-100 text-center fw-bold fs-5 bg-custom"
                            style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                        <i class="fa-solid fa-plus fa-xs"></i> Thêm bình luận
                    </button>
                </form>
            </div>
            <div class="border rounded shadow">
<!--TODO: Thêm bình luận-->
            </div>
        </section>
    </div>


<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/af-2.5.3/b-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css"
        rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>
    <!--    <link rel="stylesheet" href="/css/home.css">-->
    <link rel="stylesheet" href="/css/hienthi1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <style>
        .select2-selection__choice__display {
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 1.2rem;
            font-style: unset;
            font-weight: normal;
        }

        .select2-selection__choice {
            background: transparent !important;
        }

        .select2-selection {
            background: transparent !important;
            /*border: 10px !important;*/
            width: 50% !important;

        }
    </style>

<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>-->
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/af-2.5.3/b-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#Chuong').DataTable();
            $('#Tacgia').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.theLoai').select2();
            $('.theLoai').select2({
                placeholder: 'Select an option'
            });
            $('.theLoai').select2({
                matcher: matchStart

            });
        });

        function matchStart(params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            if (typeof data.children === 'undefined') {
                return null;
            }
            var filteredChildren = [];
            $.each(data.children, function (idx, child) {
                if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                }
            });
            if (filteredChildren.length) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.children = filteredChildren;
                return modifiedData;
            }
            return null;
        }

        document.getElementById("Hienthi").innerHTML = document.getElementsByClassName("theloai");
    </script>
<?php $this->stop() ?>