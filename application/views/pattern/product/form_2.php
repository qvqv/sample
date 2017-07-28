<?= form_open('user/product/confirm', ['class' => 'form-horizontal', 'name' => 'form1']) ?>

<div id="main">
    <table class="myTable td-left edit-table">
        <tbody>
            <tr>
                <th nowrap>商品名</th>
                <td>
                    <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>" maxlength="100">
                </td>
            </tr>
            <tr>
                <th nowrap>金額</th>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-yen fa-fw"></i></span>
                        <input type="text" class="form-control" name="price" value="<?= set_value('price') ?>" pattern="\d*" maxlength="10">
                    </div>
                </td>
            </tr>
            <tr>
                <th nowrap>メモ</th>
                <td>
                    <textarea class="form-control" name="memo" rows="3"><?= set_value('memo') ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="text-center">
    <button type="sumbit" class="btn btn-primary ">確認</button>
</div>
</form>