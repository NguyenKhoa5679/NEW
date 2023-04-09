<?php $this->layout("layouts/default", ["title" => "Login"]) ?>

<?php $this->start("page") ?>

<div class="container">
   <section>
      <div class="form-box">
         <div class="form-value">
            <form name="Login" action="/login" role="form" method="POST">
               <h2>Login</h2>
               <div class="inputbox">
                  <ion-icon name="person-outline"></ion-icon>
                  <input id="username" type="text" name="username" value="<?= isset($old['username']) ? $this->e($old['username']) : '' ?>" required>
                  <?php if (isset($errors['username'])) : ?>
                     <span class="help-block">
                        <strong><?= $this->e($errors['username']) ?></strong>
                     </span>
                  <?php endif ?>
                  <label for="usernames">Username</label>
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <input id="password" type="password" name="password" required>
                  <?php if (isset($errors['password'])) : ?>
                     <span class="help-block">
                        <strong><?= $this->e($errors['password']) ?></strong>
                     </span>
                  <?php endif ?>
                  <label for="password">Password</label>
               </div>
               <!-- <div class="forget">
                  <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>

               </div> -->
               <button class="button">Log in</button>
               <div class="register">
                  <p>Don't have a account ?<a href="/register">Register</a></p>
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