<?= form_open('account/regist', ['class' => 'form-signin', 'name' => 'form1']) ?>
    <h2 class="form-signin-heading">アカウント登録</h2>
    <hr>
    <div class="form-group <?= has_err('user_name') ?>">
        <label for="user_name" class="sr-only">ニックネーム</label>
        <input type="text" name="user_name" class="form-control" placeholder="ニックネーム" required="" autofocus="" value="<?= set_value('user_name') ?>" maxlength=20>
    </div>
    <div class="form-group <?= has_err('user_id') ?>">
        <label for="user_id" class="sr-only">ID</label>
        <input type="text" name="user_id" class="form-control" placeholder="ID" required="" autofocus="" value="<?= set_value('user_id') ?>" maxlength=16>
    </div>
    <div class="form-group <?= has_err('password') ?>">
        <label for="password" class="sr-only">パスワード</label>
        <input type="password" name="password" class="form-control" placeholder="パスワード" required="" autofocus="">
    </div>
    <div class="form-group <?= has_err('cpassword') ?>">
        <label for="cpassword" class="sr-only">パスワード確認</label>
        <input type="password" name="cpassword" class="form-control" placeholder="パスワード確認" required="" autofocus="">
    </div>
    <hr>
    <div class="form-group <?= has_err('email') ?>">
        <label for="email" class="sr-only">メールアドレス</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="email" class="form-control" placeholder="メールアドレス(任意)" autofocus="" value="<?= set_value('email') ?>" maxlength=200>
        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
    <hr>
    <div class="text-right">
        <a href="<?= base_url("account/login") ?>">ログインはこちら</a>
    </div>
</form>