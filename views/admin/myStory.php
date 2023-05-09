<?php use App\Models\Chapter;
use App\Models\theloai;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php $books = json_decode(html_entity_decode($this->e($books))) ?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <div class="row">
                    <h4 class="col-9">
                        <em>Truyện của tôi</em>
                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                    </h4>

                    <div class="col d-flex justify-content-end">
                        <div class="d-flex btn-custom-wrap">
                            <a id="" class=" ms-auto btn-custom" href="/addBook" role="button">Thêm truyện</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container shadow-lg p-3 rounded-3 mb-5">
            <?php foreach ($books as $key => $book) { ?>
                <div class="row py-3 mx-1 border-bottom border-black">
                    <!--                    Hien thi thong tin -->
                    <a href="/editBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>" class="row col">
                        <div class="col-sm-3 col-lg-2 mx-2">
                            <img class="card-img-top w-100" style="max-width: 160px; object-fit: cover;"
                                 src="<?= $book->truyen_img ?>"
                                 alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4 class="card-text ">
                                <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten ?></div>
                                <span class="TacGia"><i
                                        class="fa fa-light fa-pen fa-custom"></i> <?= $book->TacGia ?></span>
                            </h4>
                            <h5>
                                <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                                $TruyenTheLoai = [];
                                foreach ($theLoaiList as &$value) {
                                    $theLoai = theloai::getTheLoai(intval($value));
                                    array_push($TruyenTheLoai, $theLoai->ten_theloai);
                                }
                                echo join(', ', $TruyenTheLoai);
                                ?>
                            </h5>

                            <div class="row fs-5 mt-5">
                                <div class="col">
                                    <i class="fa fa-regular fa-eye fa-custom text-gradient"></i> Lượt xem
                                    <?php
                                    $luotxem = \App\Models\Chapter::all()->where('truyen_id', $book->truyen_id)->sum('luotxem');
                                    echo $luotxem;
                                    ?>
                                </div>
                                <div class="col">
                                    <i class="fa fa-thin fa-star fa-custom"></i> Đánh giá
                                    <?php
                                    $danhgia = \App\Models\Comment::all()->where('truyen_id', $book->truyen_id)->avg('rating') ?? 0;
                                    echo $danhgia;
                                    ?>


                                </div>
                                <div class="col">
                                    <i class="fa fa-light fa-list fa-custom"></i> Chương
                                    <?php
                                    $soChuong = \App\Models\Chapter::all()->where('truyen_id', $book->truyen_id)->count();
                                    echo $soChuong;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!--                    tiep tuc viet / Xoa -->
                    <div class="col-sm-2">
                        <!--                        Tiep tuc -->
                        <div class="row mt-2 ms-auto dropdown bg-custom rounded-2 d-flex justify-content-end"
                             style="width: fit-content">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="color: white">
                                <span class="fw-bold">Tiếp tục viết</span>
                            </button>
                            <ul class="dropdown-menu rounded-0 pb-0">
                                <div class="container overflow-auto" style="height: 100px">
                                    <?php
                                    $chuongList = Chapter::all()->where('truyen_id', $book->truyen_id);
                                    foreach ($chuongList as $chuong) {
                                        ?>
                                        <li>
                                            <form action="/editChapter" method="post">
                                                <input name="idChuong" value="<?= $chuong->chuong_id ?>"
                                                       hidden="hidden">
                                                <button class="btn fs-5 text-truncate"
                                                        type="submit"><?= "Chương " . $chuong->chuong_so . ": " . $chuong->chuong_ten ?></button>
                                            </form>
                                        </li>
                                    <?php } ?>
                                </div>

                                <li class="shadow-lg mb-0" style="">
                                    <div class="nav-border w-100"></div>
                                    <form method="POST" action="/addChapter">
                                        <input name="idTruyen" value="<?= $book->truyen_id ?>" hidden="hidden">
                                        <button type="submit" class="btn w-100 text-center fw-bold fs-5 bg-custom"
                                                style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                                            <i class="fa fa-solid fa-plus fa-xs"></i> Chương mới
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--                        Xoa -->
                        <div class="row text-end mt-3">
                            <form action="/deleteBook" method="post">
                                <input type="text" value="<?= $book->truyen_id ?>"
                                       hidden="hidden"
                                       name="idTruyen">
                                <button type="submit" class="btn fw-bold fs-5 bg-custom text-end" data-bs-toggle="modal"
                                        data-bs-target="#modelId"
                                        style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                                    <i class="fa fa-light fa-trash"></i> Xóa Truyện
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
<?php $this->stop() ?>