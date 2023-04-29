<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php $books= json_decode(html_entity_decode($this->e($books)))?>

<main>
    <div class="container page-content">
        <div class="heading-section">
            <h4 class="row">
                <div class="col-9">
                    <em>Truyện của tôi</em>
                    <div class="nav-border" style="width: 15%; height:1px;"></div>
                </div>

                <div class="col-2">
                    <a name="" id="" class="btn btn-primary" href="/addBook" role="button">Thêm truyện</a>
                </div>
            </h4>
            
        <?php foreach ($books as $key => $book) {?>
<!--            --><?php //$tacgia = \App\Models\User::getUserID($book->idtacgia)?>
            <div class="m-2 p-1">
                <a href= <?= "/showBook?id={$book->truyen_id}" ?> class="row">

                    <div class="col-sm-3 col-lg-2 mx-2">
                        <img class="card-img-top w-100" style="max-width: 160px; object-fit: cover;"
                             src="<?=$book->truyen_img?>"
                             alt="">
                    </div>
                    <div class="col-sm-7">
                        <h4 class="card-text ">
                            <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten ?></div>
                            <span class="TacGia"><i class="fa fa-light fa-pen fa-xs fa-custom"></i> <?= $book->TacGia ?></span>
                        </h4>
                        <h5>
                            <?php $theLoai = \App\Models\theloai::getUserID($book->truyen_theloai) ?>
                            <?= $theLoai->ten_theloai ?>
                        </h5>
                        <!--                    <div class="">-->
                        <!--                        <div class=""><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>-->
                        <!--                        <div class=""><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
</main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>