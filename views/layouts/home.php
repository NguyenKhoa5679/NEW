<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<main>
    <div class="container">
        <div class="page-content">
            <!-- mostpopular -->
            <div class="most-popular border shadow">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4>
                                <em>Phổ biến hiện tại</em>
                            </h4>
                        </div>

                        <div class="row px-1">
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="item2 card">
                                        <img class="card-img-top w-100 h-50"
                                            src="https://www.dtv-ebook.com/images/cover_1/he-thong-xuyen-nhanh_-boss-phan-dien-dot-kich-mac-linh.jpg"
                                            alt="">
                                        <div class="card-body">
                                            <h4 class="card-text ">
                                                <div class="text-truncate" style="max-width:90%">Hệ thống xuyên không: Boss
                                                    phản diện đột kích</div>
                                                <span>Mặc Linh</span>
                                            </h4>
                                            <div class="row">
                                                <div class="col "><i class="fa fa-regular fa-star fa-custom"></i> 4.8M</div>
                                                <div class="col"><i class="fa fa-regular fa-eye fa-custom"></i> 2.3M
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- truyen moi cap nhat -->
            <div class="container most-popular border shadow">
                <div class="table-responsive">
                    <table class="table 
                    table-borderless
                    align-middle">
                        <thead class="table-light">
                            <!-- <caption>Table Name</caption> -->
                            <tr>
                                <th style="width:40%">Tên truyện</th>
                                <th style="width:20%">Thể loại</th>
                                <th style="width:20%">Chương</th>
                                <th style="width:20%">Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr class="">
                                <td scope="row" class="">
                                    <form action="">
                                        <input name="id" hidden>
                                        <button class="btn-link">
                                        <div class="text-truncate" style="max-width:60%">Hệ thống xuyên không: Boss
                                                    phản diện đột kích</div>
                                        </button>
                                    </form>
                                </td>
                                <td class="d-flex">
                                    <form action="">
                                        <input name="theloai" value="" hidden>
                                        <button class="btn-link">Ngôn tình</button>
                                    </form>
                                    <form action="">
                                        <input name="theloai" value="" hidden>
                                        <button class="btn-link">Xuyên không</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="">
                                        <input name="id" hidden>
                                        <input name="chuong_id" hidden>
                                        <button class="btn-link">10</button>
                                    </form>
                                </td>
                                <td>2 giờ trước</td>


                            </tr>


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
    </div>
    </div>

    <div>

    </div>

</main>
<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>