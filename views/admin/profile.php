<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>


<main>
    <div class="container page-content shadow">
        <div class="heading-section">
            <h4>
                <em>Tài khoản của tôi</em>
                <div class="nav-border" style="width: 50%; height:1px;"></div>
            </h4>
        </div>

        <div>
            <h5>
                Giới thiệu
            </h5>

            <form action="" method="">
                Tên: 
                <br>
                Password cũ:
                <br>

                password mới:
                <br>

                Xác nhận password mới:
                <br>

                Yêu cầu Trở thành tác giả
                <br>

                submit
            </form>

        </div>
    </div>
</main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>