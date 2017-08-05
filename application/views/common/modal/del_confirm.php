<div class="modal fade" id="del_confirm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">確認</h4>
      </div>
      <div class="modal-body">本当に削除しますか？</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
        <a href="#" id="del_btn"><button type="button" class="btn btn-danger">削除</button></a>
       </div>
    </div>
  </div>
</div>

<script>
$('#del_confirm').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget).data('link');
    $(this).find('#del_btn').attr("href", link);
});
</script>