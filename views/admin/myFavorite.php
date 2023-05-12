<?php use App\Models\Book;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\TheLoai;
use App\SessionGuard;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php
$idUser = SessionGuard::UserID();
$Favorite = Favorite::getFavoriteListofUser($idUser);
?>
<?php $this->start("page") ?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <h4>
                    <em>Truyện Yêu thích</em>
                    <div class="nav-border" style="width: 15%; height:1px;"></div>
                </h4>

            </div>
        </div>
        <div class="container p-3  rounded-3 shadow" style="background: white">
            <?php
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
                                <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten ?>
                                </div>
                                <span class="TacGia"><i
                                        class="fa fa-custom fa-thin fa-pen"></i> <?= $book->TacGia ?></span>
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
                                    <i class="fa fa-regular fa-eye fa-custom text-gradient"></i> Lượt xem
                                    <?php
                                    $luotxem = Chapter::all()->where('truyen_id', $book->truyen_id)->sum('luotxem');
                                    echo $luotxem;
                                    ?>
                                </div>
                                <div class="col">
                                    <i class="fa fa-thin fa-star fa-custom"></i> Đánh giá
                                    <?php
                                    $danhgia = Comment::all()->where('truyen_id', $book->truyen_id)->avg('rating') ?? 0;
                                    echo number_format($danhgia, 1, '. ');
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

    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>