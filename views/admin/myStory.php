<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php $books= json_decode(html_entity_decode($this->e($books)))?>

<main>
    <div class="container page-content">
        <div class="heading-section">
            <h4>
                <em>Truyện của tôi</em>
                <div class="nav-border" style="width: 15%; height:1px;"></div>
            </h4>
            
        <?php foreach ($books as $key => $book) {?>
            <?php $tacgia = \App\Models\User::getUserID($book->idtacgia)?>
            <a href= <?="/showBook?id={$book->truyen_id}"?> class="row">
                
                <div class="col-sm-3 col-lg-2 mx-2">
                    <img class="card-img-top w-100" style="max-width: 160px; object-fit: cover;"
                        src="https://www.dtv-ebook.com/images/cover_1/he-thong-xuyen-nhanh_-boss-phan-dien-dot-kich-mac-linh.jpg"
                        alt="">
                </div>
                <div class="col-sm-7">
                    <h4 class="card-text ">
                        <div class="text-truncate" style="max-width:90%"><?= $book->truyen_ten?></div>
                        <span class="TacGia"><i class="fa fa-light fa-pen fa-xs fa-custom"></i> <?= $tacgia->fullname?></span>
                    </h4>
                    <div class="">
                        <div class=""><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>
                        <div class=""><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M
                        </div>
                    </div>
                </div>
            </a>
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