<?php use App\Models\theloai;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php
$TheLoai = $this->e($theLoai);
$IDTheLoai = \App\Models\TheLoai::getIDTheLoai($TheLoai) -> truyen_theloai;
$books = \App\Models\Book::getBookByTheLoai($IDTheLoai);
?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <h4 class="row">
                    <div class="col-9">
                        <em><?=$TheLoai?></em>
                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                    </div>
                </h4>
            </div>
        </div>
        <div class="container p-3  rounded-3 shadow">
            <?php foreach ($books as $key => $book) { ?>
                <div class="row py-2 mx-1">
                    <a href= "/showBook?<?=$book->truyen_ten?>&id=<?=$book->truyen_id?>" class="row">
                        <div class="col-sm-3 col-lg-2 mx-2">
                            <img class="card-img-top w-100" style="max-width: 160px; object-fit: cover;"
                                 src="<?= $book->truyen_img ?>"
                                 alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4 class="card-text ">
                                <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten ?></div>
                                <span class="TacGia"><i
                                        class="fa fa-light fa-pen fa-xs fa-custom"></i> <?= $book->TacGia ?></span>
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
                            <!--                    <div class="">-->
                            <!--                        <div class=""><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>-->
                            <!--                        <div class=""><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M-->
                            <!--                        </div>-->
                            <!--                    </div>-->
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