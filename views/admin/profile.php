<?php use App\Models\Book;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\RequireAuthor;
use App\Models\Favorite;
use App\Models\TheLoai;
use App\Models\User;
use App\SessionGuard;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php
$User = User::all()->where('user_id', $this->e($iduser))->first();
?>

<?php $this->start("page") ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="container page-content">
                        <div class="heading-section">
                            <h4>
                                <em>Thông tin tài khoản</em>
                                <div class="nav-border" style="width: 70%; height:1px;"></div>
                            </h4>
                        </div>
                    </div>
                    <div class="container shadow p-3 rounded-3">
                        <div>
                            <div class="h3 fw-bold text-center">
                                <?= $User->fullname ?>
                            </div>

                            <div class="border-bottom border m-2">
                            </div>

                            <div class="text-center">
                                <span class="fst-italic">Đã Tham gia</span>
                                tháng <?= date_format($User->created_at, "n d, Y"); ?>
                            </div>

                            <div class="border-bottom border m-2">
                            </div>

                            <div class="btn-custom-wrap m-auto" style="height: 47.61px;">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-custom btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modelId">
                                    Đổi mật khẩu
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                     aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modelTitleId"></h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    <!--                                                    <span aria-hidden="true">&times;</span>-->
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form class="mb-3 col" id="doiMK" method="POST">
                                                        <!--                                                        <div class="row mb-3">-->
                                                        <!--                                                            <label class="form-label" for="fullName">Tên người dùng:-->
                                                        <!--                                                                 </label>-->
                                                        <!--                                                            <input type="text" class="form-control" name="fullName"-->
                                                        <!--                                                                   value="-->
                                                        <?php //=$User->fullname?><!--"-->
                                                        <!--                                                                   required>-->
                                                        <!--                                                        </div>-->
                                                        <div class="row mb-3">
                                                            <label class="form-label" for="oldPass">Mật khẩu
                                                                cũ: </label>
                                                            <input type="password" class="form-control" name="oldPass"
                                                                   required>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="form-label" for="newPass">Mật khẩu
                                                                mới: </label>
                                                            <input type="password" class="form-control" name="newPass"
                                                                   required>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <div class="btn-custom-wrap m-0 p-0" style="width: 58px">
                                                    <button type="submit" form="doiMK" class="btn fw-bold"
                                                            style="color: white">Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $('#exampleModal').on('show.bs.modal', event => {
                                        var button = $(event.relatedTarget);
                                        var modal = $(this);
                                        // Use above variables to manipulate the DOM

                                    });
                                </script>

                            </div>

                            <?php
                            if (SessionGuard::isReader()) {
                                if (!RequireAuthor::required(SessionGuard::UserID())) {
                                    ?>
                                    <div class="border-bottom border m-2"></div>

                                    <div class="btn-custom-wrap m-auto mt-3"
                                         style="width: fit-content; height: 47.61px">
                                        <form action="/RequiredAuthor" method="post">

                                            <button type="submit" class="btn btn-custom btn-sm"
                                                    style="width: fit-content; ">
                                                Yêu cầu trở thành tác giả
                                            </button>
                                        </form>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="border-bottom border m-2"></div>

                                    <div class="btn-custom-wrap m-auto mt-3"
                                         style="width: fit-content; height: 47.61px">

                                        <button type="button"
                                                class="btn btn-custom btn-sm disable text-white fw-bold border-0"
                                                disabled
                                                style="width: fit-content; ">
                                            Yêu cầu trở thành tác giả
                                        </button>
                                        </form>
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <section>
                        <?php
                        if (SessionGuard::isAuthor()) {
                            ?>
                            <div class="container page-content">
                                <div class="heading-section">
                                    <h4>
                                        <em>Truyện của tôi</em>
                                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                                    </h4>
                                </div>
                            </div>
                            <div class="container shadow p-3 rounded-3">

                                <?php
                                $books = Book::getBookIDUser($this->e($iduser));
                                foreach ($books as $key => $book) { ?>
                                    <div class="row py-2 mx-1 border-bottom border-black">
                                        <a href="/editBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>"
                                           class="row">
                                            <div class="col-sm-3 col-lg-2 mx-2">
                                                <img class="card-img-top w-100 img-book2"
                                                     src="<?= $book->truyen_img ?>"
                                                     alt="">
                                            </div>
                                            <div class="col-sm-7">
                                                <h4 class="card-text ">
                                                    <div class="text-truncate"
                                                         style="max-width:90%"><?= $book->truyen_ten ?></div>
                                                    <span class="TacGia"><i
                                                            class="fa fa-light fa-pen fa-custom"></i> <?= $book->TacGia ?></span>
                                                </h4>
                                                <h5>
                                                    <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                                                    $TruyenTheLoai = [];
                                                    foreach ($theLoaiList as &$value) {
                                                        $theLoai = TheLoai::getTheLoai(intval($value));
                                                        array_push($TruyenTheLoai, $theLoai->ten_theloai);
                                                    }
                                                    echo join(', ', $TruyenTheLoai);
                                                    ?>
                                                </h5>
                                                <div class="row fs-5 mt-5">
                                                    <div class="col">
                                                        <i class="fa fa-regular fa-eye fa-custom text-gradient"></i>
                                                        Lượt xem
                                                        <?php
                                                        $luotxem = Chapter::all()->where('truyen_id', $book->truyen_id)->sum('luotxem');
                                                        echo $luotxem;
                                                        ?>
                                                    </div>
                                                    <div class="col">
                                                        <i class="fa fa-thin fa-star fa-custom"></i> Đánh giá
                                                        <?php
                                                        $danhgia = Comment::all()->where('truyen_id', $book->truyen_id)->avg('rating') ?? 0;
                                                        echo $danhgia;
                                                        ?>


                                                    </div>
                                                    <div class="col">
                                                        <i class="fa fa-light fa-list fa-custom"></i> Chương
                                                        <?php
                                                        $soChuong = Chapter::all()->where('truyen_id', $book->truyen_id)->count();
                                                        echo $soChuong;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php } ?>
                    </section>

                    <div class="mb-5 pb-5">
                        <div class="container page-content">
                            <div class="heading-section">
                                <h4>
                                    <em>Danh sách yêu thích</em>
                                    <div class="nav-border" style="width: 15%; height:1px;"></div>
                                </h4>
                            </div>
                        </div>
                        <div class="container shadow p-3 rounded-3">

                            <?php
                            $Favorite = Favorite::getFavoriteListofUser($this->e($iduser));
                            foreach ($Favorite as $item) {
                                $book = Book::getBook($item->truyen_id);
                                ?>
                                <a href="/showBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>" class="row">
                                    <div class="row py-3 mx-1 border-bottom">
                                        <div class="col-sm-3 col-lg-2 mx-2">
                                            <img class="card-img-top w-100 img-book2"
                                                 src="<?= $book->truyen_img ?>"
                                                 alt="">
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="card-text ">
                                                <div class="text-truncate"
                                                     style="max-width:90%"><?= $book->truyen_ten ?>
                                                </div>
                                                <span class="TacGia"><i
                                                        class="fa fa-light fa-pen  fa-custom"></i> <?= $book->TacGia ?></span>
                                            </h4>
                                            <h5>
                                                <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                                                $TruyenTheLoai = [];
                                                foreach ($theLoaiList as &$value) {
                                                    $theLoai = TheLoai::getTheLoai(intval($value));
                                                    array_push($TruyenTheLoai, $theLoai->ten_theloai);
                                                }
                                                echo join(', ', $TruyenTheLoai);
                                                ?>
                                            </h5>

                                            <div class="row fs-5 mt-5">
                                                <div class="col">
                                                    <i class="fa fa-regular fa-eye fa-custom text-gradient"></i> Lượt
                                                    xem
                                                    <?php
                                                    $luotxem = Chapter::all()->where('truyen_id', $book->truyen_id)->sum('luotxem');
                                                    echo $luotxem;
                                                    ?>
                                                </div>
                                                <div class="col">
                                                    <i class="fa fa-thin fa-star fa-custom"></i> Đánh giá
                                                    <?php
                                                    $danhgia = Comment::all()->where('truyen_id', $book->truyen_id)->avg('rating') ?? 0;
                                                    echo $danhgia;
                                                    ?>


                                                </div>
                                                <div class="col">
                                                    <i class="fa fa-light fa-list fa-custom"></i> Chương
                                                    <?php
                                                    $soChuong = Chapter::all()->where('truyen_id', $book->truyen_id)->count();
                                                    echo $soChuong;
                                                    ?>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>