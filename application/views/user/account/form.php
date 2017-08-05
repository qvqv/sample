<?= form_open('user/account/update', ['class' => 'form-horizontal', 'name' => 'form1']) ?>
<div class="panel panel-default">
    <div class="panel-heading">アカウント更新</div>
    <div class="panel-body">
        <div class="form-group">
            <label for="name" class="col-md-2 control-label">ID</label>
            <div class="col-sm-10"><p class="form-control-static"><?= $user->user_id ?></p></div>
        </div>
        <div class="form-group <?= has_err('user_name') ?>">
            <label for="user_name" class="col-md-2 control-label">名前</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="user_name" value="<?= set_value('user_name', $user->user_name) ?>" maxlength="20">
            </div>
        </div>
        <div class="form-group <?= has_err('email') ?>">
            <label for="email" class="col-md-2 control-label">メールアドレス</label>
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    <input type="text" class="form-control" name="email" value="<?= set_value('email', $user->email) ?>" maxlength="200">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <button type="sumbit" class="btn btn-primary">更新</button>
</div>
</form>