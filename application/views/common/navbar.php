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
            <?php $seg1 = $this->uri->segment(1, ""); ?>
            <?php $seg2 = $seg1."/".$this->uri->segment(2, ""); ?>
            <?php $seg3 = $seg2."/".$this->uri->segment(3, ""); ?>
            <ul class="nav navbar-nav">
                <li <?= active_nav($seg1, "") ?>>
                    <a href="<?= base_url() ?>"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a>
                </li>
                <?php if($this->session->userdata("is_login") == 1): ?>
                <li <?= active_nav($seg3, "user/product/add") ?>>
                    <a href="<?= base_url('user/product/add') ?>"><i class="fa fa-pencil fa-lg"></i>&nbsp;データ登録</a>
                </li>
                <li <?= active_nav($seg3, "user/product/lists") ?>>
                    <a href="<?= base_url('user/product/lists') ?>"><i class="fa fa-table fa-lg"></i>&nbsp;データ一覧</a>
                </li>
                <?php endif; ?>
                <li <?= active_nav($seg1, "contact") ?>>
                    <a href="<?= base_url('contact') ?>"><i class="fa fa-envelope fa-lg"></i>&nbsp;お問い合わせ</a>
                </li>
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