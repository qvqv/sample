<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand-div">
                <a class="navbar-brand" href="/">サンプルサイト<br /><small>テンプレート</small></a>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php $seg = $this->uri->segment(1, ""); ?>
            <ul class="nav navbar-nav">
                <li <?= active_nav($seg, "") ?>><a href="<?= base_url() ?>">Home</a></li>
                <?php if($this->session->userdata("is_login") == 1): ?>
                <li <?= active_nav($seg, "form") ?>><a href="<?= base_url('form') ?>">データ登録</a></li>
                <li <?= active_nav($seg, "lists") ?>><a href="<?= base_url('lists') ?>">データ一覧</a></li>
                <?php endif; ?>
                <li <?= active_nav($seg, "contact") ?>><a href="<?= base_url('contact') ?>">お問い合わせ</a></li>
            </ul>
            <div class="navbar-form navbar-right">
                <?php if($this->session->userdata("is_login") == 1): ?>
                <a href="<?= base_url("account/logout") ?>"><button type="button" class="btn btn-danger">ログアウト</button></a>
                <?php else: ?>
                <a href="<?= base_url("account/login") ?>"><button type="button" class="btn btn-success">ログイン</button></a>
                <?php endif; ?>
            </div>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>