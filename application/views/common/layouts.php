<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/web/img/icon/favicon.ico">
    <link rel="stylesheet" href="/web/css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/web/css/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/web/css/common.css">
    <script src="/web/js/jquery/jquery-2.2.0.min.js"></script>
    <script src="/web/css/bootstrap/bootstrap.min.js"></script>
    <title>サンプルサイト<?= isset($page_title) ? ' | '.$page_title : '' ?></title>
</head>
<body>
    <div id="main-container">

    <?php $this->load->view('/common/navbar') ?>

    <div class="container">
        <?php $this->load->view('common/message') ?>

        <?php foreach($views as $template => $contents): ?>
        <?php $this->load->view($template, $contents) ?>
        <?php endforeach; ?>
    </div>

    <footer id="footer">
      <p>Copyright (C) 2016 qv All Rights Reserved.</p>
      <p><a href="#"><i class="fa fa-arrow-circle-up"></i>&nbsp;top</a></p>
    </footer>

    </div>
    <?php $this->load->view('/common/analytics') ?>
</body>
</html>