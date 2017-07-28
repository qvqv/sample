<?php if(isset($id) && !empty($id)): ?>
<?= form_open('user/product/edit/'.$id, ['class' => 'form-horizontal', 'name' => 'form1']) ?>
<?php else: ?>
<?= form_open('user/product/add', ['class' => 'form-horizontal', 'name' => 'form1']) ?>
<?php endif; ?>
<div class="panel panel-default">
    <div class="panel-heading">
        データ登録
    </div>
    <div class="panel-body">
        <input type="hidden" name="seg" value="regist_form">
        <div class="form-group <?= has_err('name') ?>">
            <label for="name" class="col-md-2 control-label">商品名</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="<?= set_value('name', @$data->name) ?>" maxlength="40">
            </div>
        </div>
        <div class="form-group <?= has_err('price') ?>">
            <label for="price" class="col-md-2 control-label">金額</label>
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-yen fa-fw"></i></span>
                    <input type="text" class="form-control" name="price" value="<?= set_value('price', @$data->price) ?>" pattern="\d*" maxlength="10">
                </div>
            </div>
        </div>
        <div class="form-group <?= has_err('memo') ?>">
            <label for="memo" class="col-md-2 control-label">メモ</label>
            <div class="col-md-10">
                <textarea class="form-control" name="memo" rows="3"><?= set_value('memo', @$data->memo) ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <button type="sumbit" class="btn btn-primary ">登録</button>
</div>
</form>