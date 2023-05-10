<?php $this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">
        Quản lý người dùng
    </div>

    <div>
        <table class="table table-striped" id="table1">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>123</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td >1</td>
                <td>Nguyeen Khoa</td>
                <td>nguyenkhoa</td>
                <td>123456</td>
                <td>Nguyen Khoa</td>

                <td><a href="">Sửa xóa</a></td>
            </tr>
            <tr>
                <td >1</td>
                <td>Nguyeen Khoa</td>
                <td>2</td>
                <td>123456</td>
                <td>Nguyen Khoa</td>
                <td><a href="">Sửa xóa</a></td>
            </tr>

            </tbody>
        </table>
    </div>



<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>







<?php $this->stop() ?>