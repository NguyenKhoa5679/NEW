<?php $this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$users = \App\Models\User::all();
?>

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
                <th>Email</th>
                <th>Vai trò</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($users as $user){
                $count += 1;
                $role = \Illuminate\Database\Capsule\Manager::select("select * from user_role where role = :role limit 1", ['role'=>$user->role])
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $user->fullname?></td>
                <td><?= $user->username?></td>
                <td><?= $user->email ?></td>
                <td><?php
                    foreach ($role as $iem){
                        echo $iem->role_detail;
                    }
                    ?></td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#static<?=$user->user_id?>">
                        <i class="fa fa-custom fa-solid fa-xmark"></i>
                    </button>

                </td>
                <div class="modal fade" id="static<?=$user->user_id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Có chắc xóa người dùng này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/deleteUser" method="post">
                                    <input value="<?= $user->user_id?>" name="idUser" hidden>
                                    <button type="submit" class="btn btn-primary">Xóa</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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