<?php use App\Models\theloai;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php
$TheLoai = $this->e($theLoai);
$IDTheLoai = \App\Models\TheLoai::getIDTheLoai($TheLoai)->truyen_theloai;
$books = \App\Models\Book::getBookByTheLoai($IDTheLoai);
?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <h4 class="row">
                    <div class="col-9">
                        <em><?= $TheLoai ?></em>
                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                    </div>
                </h4>
            </div>
        </div>
        <div class="container p-3  rounded-3 shadow" style="background: white">
            <?php foreach ($books as $key => $book) { ?>
                <div class="row py-3 mx-1 border-bottom">
                    <a href="/showBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>" class="row">
                        <div class="col-sm-3 col-lg-2 mx-2">
                            <img class="card-img-top w-100 img-book2"
                                 src="<?= $book->truyen_img ?>"
                                 alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4 class="card-text ">
                                <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten ?></div>
                                <span class="TacGia"><i
                                        class="fa fa-custom fa-thin fa-pen"></i> <?= $book->TacGia ?></span>
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
                                    echo number_format($danhgia, 1, '. ');
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
                </div>
            <?php } ?>
        </div>

    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>