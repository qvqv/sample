<?= form_open('account/reminder', ['class' => 'form-signin', 'name' => 'form1']) ?>
    <h2 class="form-signin-heading">パスワードリマインダ</h2>
    <hr>
    <div class="form-group <?= has_err('email') ?>">
        <label for="email" class="sr-only">メールアドレス</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="email" class="form-control" placeholder="メールアドレス" autofocus="" value="<?= set_value('email') ?>" maxlength=200>
        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
    <hr>
    <div class="text-right">
        <a href="<?= base_url("account/login") ?>">ログインはこちら</a>
    </div>
</form>