<?= form_open('user/account/edit', ['class' => '', 'name' => 'form1']) ?>
    <h2 class="form-signin-heading">アカウント情報</h2>
    <hr>
    <div class="form-group row">
        <label for="user_id" class="col-sm-2">ID</label>
        <div class="col-sm-10"><p class="form-control-static"><?= $user->user_id ?></p></div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2">パスワード</label>
        <div class="col-sm-10"><p class="form-control-static">*****</p></div>
    </div>
    <div class="form-group row">
        <label for="user_name" class="col-sm-2">名前</label>
        <div class="col-sm-10"><p class="form-control-static"><?= $user->user_name ?></p></div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2">メールアドレス</label>
        <div class="col-sm-10"><p class="form-control-static"><?= $user->email ?></p></div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="access_date" class="col-sm-2">最終ログイン日時</label>
        <div class="col-sm-10"><p class="form-control-static"><?= f_datetime($user->access_date) ?></p></div>
    </div>
    <div class="form-group row">
        <label for="create_date" class="col-sm-2">登録日時</label>
        <div class="col-sm-10"><p class="form-control-static"><?= f_datetime($user->create_date) ?></p></div>
    </div>
    <div class="form-group row">
        <label for="update_date" class="col-sm-2">更新日時</label>
        <div class="col-sm-10"><p class="form-control-static"><?= f_datetime($user->update_date) ?></p></div>
    </div>
    <hr>
    <a class="btn btn-primary" href="<?= base_url('/user/account/update') ?>">更新</a>
</form>