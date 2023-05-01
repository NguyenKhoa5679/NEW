<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php 
$BookInfo = \App\Models\Book::getBook($this->e($id));
$Chaters = \App\Models\Chapter::all()->where('truyen_id', $this->e($id));
$tacgia = $BookInfo->TacGia;

$theLoaiList = explode(", ", $BookInfo->truyen_theloai);
$TruyenTheLoai = [];
foreach ($theLoaiList as &$value) {
    $theLoai = \App\Models\TheLoai::getTheLoai(intval($value));
    array_push($TruyenTheLoai, $theLoai->ten_theloai);
}
?> 

<?php $this->start("page") ?>
<div tabindex="-1" class="container-fluid info-book">
    <div class="m-2 w-100">
        <div style="padding-bottom: 2em; width: 100%; gap: 8px"></div>
        <div class="section-container">
            <div class="section-content flex">
                <img src="<?=$BookInfo->truyen_img?>" class="img-book rounded border-light border-2" />
                <h1 class="name-book"><?= $BookInfo->truyen_ten ?> </h1>
                <?php #echo json_encode($BookInfo)?>
                <div class="detail">
                    <p style="color: white; font-size: 24px">
                        <?= $BookInfo->truyen_mota?>
                    </p>
                </div>

                <div class="white-space"></div>

                <div class="custom-btn">
                    <div>
                        <a href="" class="button primary">
                            <span>Đọc từ đầu</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container about-book">
    <section>
        <div>
            <h2 class="about-book-info text-center">Thông tin</h2>
<!--            <table id="Tacgia" class="table table-responsive-xl table-bordered">-->
<!--                <thead class="table-borderless">-->
<!--                    <tr>-->
<!--                        <th></th>-->
<!--                        <th></th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                    <tr>-->
<!--                        <td scope="col">Tác giả</td>-->
<!--                        <td scope="col">--><?php //= $tacgia ?><!--</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td scope="row">Ngày đăng</td>-->
<!--                        <td>--><?php //= $BookInfo->truyen_ngaydang?><!--</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td scope="row">Số chương</td>-->
<!--                        <td>--><?php //= $BookInfo->truyen_sochuong?><!--</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td scope="row">Thể loại</td>-->
<!--                        <td>--><?php //= join(', ', $TruyenTheLoai) ?><!--</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td scope="row">Tình trạng</td>-->
<!--                        <td>--><?php //= $BookInfo->truyen_tinhtrang?><!--</td>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->

            <div class="row">
                <div class="col-6">
                    <p>Tác giả</p>
                </div>
                <div class="col-6">
                    <p><?= $tacgia ?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="my-5">
    <div class="container">
        <h2>Danh sách chương</h2>
    </div>
    <div class="container">
        <table class="table text-center table-bordered table table-striped" id="Chuong">
            <thead>
                <tr>
                    <th>Chương</th>
                    <th>Tên chương</th>
                    <th>Lượt xem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Chaters as $key =>$Chapter){ ?>
                    <tr>
                    <a href=<?="/showChapter?truyen={$this->e($id)}&chuong={$Chapter->chuong_id}" ?>>
                            <td><a href=<?="/showChapter?truyen={$this->e($id)}&chuong={$Chapter->chuong_id}" ?>><?= $Chapter->chuong_so?></a></td>
                            <td><?= $Chapter->chuong_ten?></td>
                            <td><?= $Chapter->luotxem?></td>
                        </a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"/> -->
<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/af-2.5.3/b-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="/css/home.css">
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