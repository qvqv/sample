<?= form_open('account/login', ['class' => 'form-signin', 'name' => 'form1']) ?>
    <h2 class="form-signin-heading">ログイン</h2>
    <hr>
    <div class="form-group <?= has_err('user_id') ?>">
        <label for="user_id" class="sr-only">ID</label>
        <input type="text" name="user_id" class="form-control" placeholder="ID" required="" autofocus="" value="<?= set_value('user_id') ?>">
    </div>
    <div class="form-group <?= has_err('password') ?>">
        <label for="password" class="sr-only">パスワード</label>
        <input type="password" name="password" class="form-control" placeholder="パスワード" required="" autofocus="">
    </div>
    <?php /*
    <div class="checkbox">
        <label>
            <input type="checkbox" value="1" name="autologin" <?= set_checkbox('autologin', '1') ?>> 次回からは自動的にログイン
        </label>
    </div>
    */ ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
    <hr>
    <div class="text-right">
        <a href="<?= base_url("account/regist") ?>">新規登録はこちら</a>
    </div>
</form>