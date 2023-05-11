<?php $this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$yeuCauList =\Illuminate\Database\Capsule\Manager::select("SELECT * FROM quyentacgia where tinhtrang = 0;")
?>

<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">
        Yêu cầu quyền tác giả
    </div>

    <div>
        <table class="table table-striped" id="table1">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tài khoản yêu cầu</th>
                <th>Email</th>
                <th>Đồng ý</th>
                <th>Xóa yêu cầu</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($yeuCauList as $item){
                $count += 1;
                $user = \App\Models\User::getUserbyIDUser($item->user_id);
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>

                <td>
                    <form action="/updatePermission" method="post">
                        <input value="<?= $user->user_id?>" name="idUser" hidden="hidden">
                        <button type="submit" class="btn">
                            <i class="fa fa-custom fa-solid fa-check"></i>
                        </button>
                    </form>

                </td>

                <td>
                    <form action="/deniedPermission" method="post">
                        <input value="<?= $user->user_id?>" name="idUser" hidden="hidden">
                        <button type="submit" class="btn">
                            <i class="fa fa-custom fa-solid fa-xmark"></i>
                        </button>
                    </form>

                </td>

            </tr>

                <?php
            }
                ?>
            </tbody>
        </table>
    </div>



<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>