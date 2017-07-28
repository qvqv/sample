<?php $this->load->view('common/datatables') ?>
<?php if ($query->num_rows() > 0): ?>
<div id="listTableDiv" class="table-responsive">
    <table id="listTable">
        <thead>
            <tr style="background-color: darkgray;">
                <th nowrap class="date hidden-xs" width="15%">日付</th>
                <th nowrap class="name" width="20%">商品名</th>
                <th nowrap class="price" width="10%">値段</th>
                <th nowrap class="memo" width="">メモ</th>
                <th nowrap class="edit" width="8%"></th>
                <th nowrap class="delete" width="8%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query->result() as $i => $row): ?>
            <tr>
                <td nowrap class="date hidden-xs"><?= f_datetime($row->create_date) ?></td>
                <td nowrap class="name"><?= h($row->name) ?></td>
                <td nowrap class="price"><i class="fa fa-yen"></i><?= number_format($row->price) ?></td>
                <td nowrap class="memo"><?= nl2br(h($row->memo)) ?></td>
                <td nowrap class="edit text-center">
                    <a href="<?= base_url('user/product/edit/' . $row->id) ?>"><i class="fa fa-pencil fa-lg"></i></a>
                </td>
                <td nowrap class="delete text-center">
                    <a href="<?= base_url('user/product/delete/' . $row->id) ?>"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
<div class="panel panel-success">
    <div class="panel-heading">
        データがありません
    </div>
    <div class="panel-body">
        <a href="<?= base_url('user/product/add') ?>"><button type="button" class="btn btn-primary">データ登録</button></a>
    </div>
</div>
<?php endif; ?>