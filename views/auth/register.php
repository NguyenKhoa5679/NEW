<?php $this->layout("layouts/default", ["title" => "Login"]) ?>

<?php $this->start("page") ?>
    <div class="container">
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form name="Register" role="form" action="/register" method="POST">
                        <h2>Register</h2>
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input id="fullname" type="text" required id="fullname" name="fullname">
                            <?php if (isset($errors['fullname'])): ?>
                                <span class="help-block">
                        <strong>
                           <?= $this->e($errors['fullname']) ?>
                        </strong>
                     </span>
                            <?php endif ?>
                            <label for="fullname">Full Name</label>

                        </div>
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input id="email" type="email" required id="email" name="email">
                            <?php if (isset($errors['email'])): ?>
                                <span class="help-block">
                        <strong>
                           <?= $this->e($errors['email']) ?>
                        </strong>
                     </span>
                            <?php endif ?>
                            <label for="email">Email</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input id="username" type="text" name="username" required>
                            <?php if (isset($errors['username'])): ?>
                                <span class="help-block">
                        <strong>
                           <?= $this->e($errors['username']) ?>
                        </strong>
                     </span>
                            <?php endif ?>
                            <label for="username">User Name</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input id="password" type="password" name="password" required>
                            <?php if (isset($errors['password'])): ?>
                                <span class="help-block">
                        <strong>
                           <?= $this->e($errors['password']) ?>
                        </strong>
                     </span>
                            <?php endif ?>
                            <label for="password">Password</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input id="password_confirmation" type="password" name="password_confirmation" required>
                            <?php if (isset($errors['password_confirmation'])): ?>
                                <span class="help-block">
                        <strong>
                           <?= $this->e($errors['password_confirmation']) ?>
                        </strong>
                     </span>
                            <?php endif ?>
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                        <!-- <div class="forget">
                              <label for=""><a href="#">Already an account</a></label>
                           </div> -->
                        <button class="button">Register</button>
                        <div class="register">
                            <p>Already an account ?<a href="/login">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

<?php $this->stop() ?>
<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/Res_Login.css">
    <link rel="stylesheet" href="/css/index.css">
<?php $this->stop() ?>