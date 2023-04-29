<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<main>
    <div class="container page-content">
        <div class="heading-section">
            <h4>
                <em>Truyện Yêu thích</em>
                <div class="nav-border" style="width: 15%; height:1px;"></div>
            </h4>
            
        </div>
        <div class="row m-2">
            <div class="col-sm-3 col-lg-2 mx-2">
                <img class="card-img-top w-100" style="max-width: 160px; object-fit: cover;"
                    src="https://www.dtv-ebook.com/images/cover_1/he-thong-xuyen-nhanh_-boss-phan-dien-dot-kich-mac-linh.jpg"
                    alt="">
            </div>
            <div class="col-sm-7">
                <h4 class="card-text ">
                    <div class="text-truncate" style="max-width:90%">Hệ thống xuyên không: Boss
                        phản diện đột kích</div>
                    <span class="TacGia"><i class="fa fa-light fa-pen fa-xs fa-custom"></i> Mặc Linh</span>
                </h4>
                <h5>
                    Ngôn tình
                </h5>
<!--                <div class="">-->
<!--                    <div class=""><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>-->
<!--                    <div class=""><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm-3 col-lg-2 mx-2">
                <img class="card-img-top w-100" style="max-width: 160px; height: 250px; object-fit: cover;"
                     src="https://afamilycdn.com/150157425591193600/2020/6/19/hinh-anh-bong-toi-buon-co-don-3-15925677010351109427971.jpg"
                     alt="">
            </div>

            <div class="col-sm-7">
                <h4 class="card-text ">
                    <div class="text-truncate" style="max-width:90%">Đợi anh đến năm 35
                        tuổi
                    </div>
                    <span class="TacGia"><i class="fa fa-light fa-pen fa-xs fa-custom"></i> Nam Khang Bạch Khởi</span>
                </h4>
                <h5>
                    Đam Mỹ
                </h5>
                <!--                <div class="">-->
                <!--                    <div class=""><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>-->
                <!--                    <div class=""><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M-->
                <!--                    </div>-->
                <!--                </div>-->
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