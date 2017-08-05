<?= form_open('user/account/password', ['class' => 'form-signin', 'name' => 'form1']) ?>
    <h2 class="form-signin-heading">パスワード再設定</h2>
    <hr>
    <div class="form-group <?= has_err('old_password') ?>">
        <label for="old_password" class="sr-only">旧パスワード</label>
        <input type="password" name="old_password" class="form-control" placeholder="旧パスワード" required="" autofocus="">
    </div>
    <div class="form-group <?= has_err('password') ?>">
        <label for="password" class="sr-only">新パスワード</label>
        <input type="password" name="password" class="form-control" placeholder="新パスワード" required="" autofocus="">
    </div>
    <div class="form-group <?= has_err('cpassword') ?>">
        <label for="cpassword" class="sr-only">パスワード確認</label>
        <input type="password" name="cpassword" class="form-control" placeholder="パスワード確認" required="" autofocus="">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">更新</button>
</form>