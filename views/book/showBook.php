<?php use App\Models\Book;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\TheLoai;
use App\Models\User;
use App\SessionGuard;

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

$commentList = Comment::getCommentOfStory($BookInfo->truyen_id);

?>

<?php $this->start("page") ?>
    <div tabindex="-1" class="container-fluid info-book shadow">
        <div class="m-2 w-100">
            <div style="padding-bottom: 2em; width: 100%; gap: 8px"></div>
            <div class="section-container mx-4 mt-n6">
                <div class="section-content row grid gap-0 pb-1 pt-5 ">
                    <div class="col-2 mt-4">
                        <img src="<?= $BookInfo->truyen_img ?>"
                             class="img-book rounded border-light border-2"/>
                    </div>
                    <div class="col m-0">
                        <h1 class="name-book"><?= $BookInfo->truyen_ten ?> </h1>
                        <?php #echo json_encode($BookInfo)?>
                        <div class="row">
                            <div class="col-2 border-white border-end border-3" style="color: white;">
                                <div class="row fw-bold">
                                    Tác giả: <?= $tacgia ?>
                                </div>
                                <div class="row">
                                    Ngày đăng: <?= $BookInfo->truyen_ngaydang ?>
                                </div>
                                <div class="row">
                                    Số chương: <?= $sochuong ?>
                                </div>
                                <div class="row">
                                    Thể loại: <?= join(', ', $TruyenTheLoai) ?>
                                </div>
                                <div class="row badge rounded-pill text-bg-light">
                                    <?= $BookInfo->truyen_tinhtrang ?>
                                </div>
                            </div>

                            <div class="detail col-9 mx-2" style="height: fit-content; block-size: fit-content;">
                                <blockquote style="color: white; font-size: 24px;" class="col-8">
                                    <?= nl2br($BookInfo->truyen_mota) ?>
                                </blockquote>
                            </div>
                        </div>

                        <?php
                        if (SessionGuard::isUserLoggedIn()) {
                            $favorite = Favorite::all()->where('truyen_id', $BookInfo->truyen_id)->where('user_id', SessionGuard::UserID())->first();
                            if (is_null($favorite)) {
                                ?>
                                <form action="/addFavorite" method="post">
                                    <input type="text" value="<?= $BookInfo->truyen_id ?>" hidden="hidden"
                                           name="idTruyen">
                                    <button class="btn button primary fw-bold" type="submit"
                                            style="background: white;">
                                        <i class="fa-regular fa-heart"></i> Thêm vào yêu thích
                                    </button>
                                </form>
                            <?php } else {
                                ?>
                                <form action="/deleteFavorite" method="post">
                                    <input type="text" value="<?= $BookInfo->truyen_id ?>" hidden="hidden"
                                           name="idTruyen">
                                    <button class="btn button primary fw-bold" type="submit"
                                            style="background: white;">
                                        <i class="fa-solid fa-heart"></i> Thêm vào yêu thích
                                    </button>
                                </form>

                            <?php }
                        } ?>


                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid  about-book mx-3  mt-3 mb-5 row">
        <section class="col-9">
            <div class="row">
                <h2 class="about-book-info col">Danh sách chương</h2>
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


                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="col-2 me-3">
            <div class="container shadow rounded border mb-3">

                <!-- Button trigger modal -->
                <button type="button" class="btn button fw-bold"
                        style="background: white;"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa fa-regular fa-flag"></i> Báo cáo truyện này
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Báo cáo truyện</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/addReport" method="post" id="report">

                                    <div class="accordion border-0" id="accordionExample">
                                        <div class="accordion-item border-0 focus-ring-light">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button  focus-ring-light fs-4" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                    Nội dung không phù hợp
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault1" value="Nội dung nhạy cảm">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Nội dung nhạy cảm
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault2" value="Thù địch, quấy rối">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Thù địch, quấy rối
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault3" value="Bạo Lực">
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            Bạo Lực
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault4" value="Spam">
                                                        <label class="form-check-label" for="flexRadioDefault4">
                                                            Spam
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault5" value="Khác" checked>
                                                        <label class="form-check-label" for="flexRadioDefault5">
                                                            Khác
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item border-0 focus-ring-light">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed focus-ring-light fs-4"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                    Vi phạm bản quyền
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="LyDo"
                                                               id="flexRadioDefault6" value="Vi phạm bản quyền">
                                                        <label class="form-check-label" for="flexRadioDefault6">
                                                            Vi phạm bản quyền
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label fs-4" for="NoiDung">Nội dung</label>
                                    <input type="text" class="form-control fs-4" name="NoiDung" value="">
                                    <input name="idTruyen" value="<?= $BookInfo->truyen_id ?>" hidden="hidden">

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="report" class="btn btn-primary">Báo cáo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <h2 class="about-book-info col">Bình Luận</h2>
            </div>
            <div class="border rounded shadow">
                <?php
                if (SessionGuard::isUserLoggedIn()) {
                    ?>
                    <form method="POST" action="/newComment" class="m-2">
                        <input name="idTruyen" value="<?= $BookInfo->truyen_id ?>" hidden="hidden">
                        <input type="text" name="noiDung" class="form-control" placeholder="Nhập bình luận">
                        <input
                            class="m-auto rating rating--nojs"
                            max="5"
                            step="1"
                            type="range"
                            value="5"
                            name="rating"
                        >
                        <button type="submit" class="m-auto btn w-100 text-center fw-bold fs-5 bg-custom"
                                style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">

                            <i class="fa-solid fa-plus fa-xs"></i> Thêm
                        </button>
                    </form>
                <?php } ?>

            </div>

            <?php foreach ($commentList as $comment) { ?>
                <?php
                $user = User::getUserbyIDUser($comment->user_id);
                if (SessionGuard::isUserLoggedIn()) {
                    if (SessionGuard::isUser($comment->user_id)) {
                        ?>
                        <div class="rounded shadow mt-3">
                            <div class="border-bottom m-1">
                                <div class="p-2">

                                    <div class="fw-bold fst-italic">
                                        <?= $user->fullname ?>
                                    </div>
                                    <form action="/editComment" method="post"
                                          id="editComment<?= $comment->idbinhluan ?>">
                                        <input type="text" name="idTruyen" value="<?= $comment->truyen_id ?>"
                                               hidden="hidden">
                                        <input type="text" name="idbinhluan" value="<?= $comment->idbinhluan ?>"
                                               hidden="hidden">
                                        <input
                                            class="rating rating--nojs custom-rating"
                                            max="5"
                                            step="1"
                                            type="range"
                                            value="<?= $comment->rating ?>"
                                            name="rating"
                                        >
                                        <input class="form-control" type="text" name="noiDung"
                                               value="<?= $comment->noiDung ?>">

                                    </form>

                                    <div class="row">
                                        <button type="submit" form="editComment<?= $comment->idbinhluan ?>"
                                                class=" col m-auto btn w-100 text-center fw-bold fs-5 bg-custom"
                                                style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                                            Sửa
                                        </button>

                                        <form action="/deleteComment" method="post" class="col">
                                            <input name="idTruyen" value="<?= $comment->truyen_id ?>" hidden="hidden">
                                            <input name="idbinhluan" value="<?= $comment->idbinhluan ?>"
                                                   hidden="hidden">
                                            <button type="submit"
                                                    class="m-auto btn w-100 text-center fw-bold fs-5 bg-custom"
                                                    style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                                                Xóa
                                            </button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    <?php }
                }
            } ?>



            <?php foreach ($commentList as $comment) { ?>
                <?php
                $user = User::getUserbyIDUser($comment->user_id);
                if (SessionGuard::isUserLoggedIn()) {
                    if (!SessionGuard::isUser($comment->user_id)) {
                        ?>
                        <div class="rounded shadow mt-3">
                            <div class="border-bottom m-1">
                                <div class="p-2">
                                    <div class="fw-bold fst-italic">
                                        <?= $user->fullname ?><input
                                            class="rating rating--nojs custom-rating"
                                            max="5"
                                            step="1"
                                            type="range"
                                            value="<?= $comment->rating ?>"
                                            name="rating"
                                            disabled
                                        >
                                    </div>
                                    <p><?= $comment->noiDung ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            } ?>


            <div class="rounded shadow mt-3">
                <?php foreach ($commentList as $comment) { ?>
                    <?php
                    $user = User::getUserbyIDUser($comment->user_id);
                    if (!SessionGuard::isUserLoggedIn()) {
                        ?>
                        <div class="border-bottom m-1">
                            <div class="p-2">

                                <div class="fw-bold fst-italic">
                                    <?= $user->fullname ?><input
                                        class="rating rating--nojs custom-rating"
                                        max="5"
                                        step="1"
                                        type="range"
                                        value="<?= $comment->rating ?>"
                                        name="rating"
                                        disabled
                                    >
                                </div>
                                <p><?= $comment->noiDung ?></p>
                            </div>
                        </div>
                    <?php }
                } ?>
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

    <style>
        .rating {
            --dir: right;
            --fill: gold;
            --fillbg: rgba(100, 100, 100, 0.15);
            --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
            --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
            --stars: 5;
            --starsize: 2rem;
            --symbol: var(--star);
            --value: 1;
            --w: calc(var(--stars) * var(--starsize));
            --x: calc(100% * (var(--value) / var(--stars)));
            block-size: var(--starsize);
            inline-size: var(--w);
            position: relative;
            touch-action: manipulation;
            -webkit-appearance: none;
        }

        .custom-rating {
            --starsize: 1.2rem;
        }

        [dir="rtl"] .rating {
            --dir: left;
        }

        .rating::-moz-range-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
        }

        .rating::-webkit-slider-runnable-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
            -webkit-mask: repeat left center/var(--starsize) var(--symbol);
        }

        .rating::-moz-range-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
        }

        .rating::-webkit-slider-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
            -webkit-appearance: none;
        }

        .rating, .rating-label {
            display: block;
            font-family: ui-sans-serif, system-ui, sans-serif;
        }

        .rating-label {
            margin-block-end: 1rem;
        }

        /* NO JS */
        .rating--nojs::-moz-range-track {
            background: var(--fillbg);
        }

        .rating--nojs::-moz-range-progress {
            background: var(--fill);
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--star);
        }

        .rating--nojs::-webkit-slider-runnable-track {
            background: var(--fillbg);
        }

        .rating--nojs::-webkit-slider-thumb {
            background-color: var(--fill);
            box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
            opacity: 1;
            width: 1px;
        }

        [dir="rtl"] .rating--nojs::-webkit-slider-thumb {
            box-shadow: var(--w) 0 0 var(--w) var(--fill);
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


<?php $this->stop() ?>