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
            <div class="section-container mx-4 mt-n6" >
                <form action="" method="">
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
                                        <span class="col">Tác giả: </span>
                                        <input class="col bg-transparent border-0 text-white fc-custom" value="<?= $tacgia ?>">
                                    </div>
                                    <div class="row ">
                                        <span class="col">Ngày đăng: </span>
                                        <span class="col"> <?= $BookInfo->truyen_ngaydang  ?></span>
                                    </div>
                                    <div class="row ">
                                        <span class="col">Số chương: </span>
                                        <span class="col"> <?= $sochuong  ?></span>
                                    </div>

                                    <div class="row fw-bold">
                                        <span class="col">Thể loại: </span>
                                        <input class="col bg-transparent border-0 text-white fc-custom" value="<?= $tacgia ?>">
                                    </div>
<!--// TODO: Input thể loại-->
                                    <div class="row">
                                        Thể loại: <?= join(', ', $TruyenTheLoai) ?>
                                    </div>
                                    <div class="row">
                                        Tình trạng: <?= $BookInfo->truyen_tinhtrang ?>
                                    </div>
                                </div>

                                <div class="detail col-9 mx-2" style="height: fit-content; block-size: fit-content;">
                                    <blockquote style="color: white; font-size: 24px;" class="col-8">
                                        <?= $BookInfo->truyen_mota ?>
                                    </blockquote>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container about-book mt-3">
        <section>
            <h2 class="about-book-info">Danh sách chương</h2>
            <div class="container">
                <?php foreach ($Chaters as $key => $Chapter) { ?>
                    <div class="container shadow">
                        <a href=<?= "/showChapter?truyen={$this->e($id)}&chuong={$Chapter->chuong_id}" ?>>

                                <a href=<?= "/showChapter?truyen={$this->e($id)}&chuong={$Chapter->chuong_id}" ?>>Chương <?= $Chapter->chuong_so ?></a>

                            <?= $Chapter->chuong_ten ?></td>
                            <?= $Chapter->luotxem ?></td>


                        </a>
                    </div>
                <?php } ?>
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