    <?php foreach($this->session->flashdata() as $key => $value): ?>
    <div class="alert alert-<?= $key ?>"><?= $value ?></div>
    <?php endforeach; ?>
    <?php if(!empty(validation_errors())): ?>
    <div class="alert alert-danger"><?= validation_errors() ?></div>
    <?php endif; ?>