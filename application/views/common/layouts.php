<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/web/img/icon/favicon.ico">
    <link rel="stylesheet" href="/web/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/web/css/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/web/css/common.css">
    <title>サンプルサイト<?= isset($page_title) ? ' | '.$page_title : '' ?></title>
    <script src="/web/js/jquery/jquery-2.2.0.min.js"></script>
    <script src="/web/css/bootstrap/bootstrap.min.js"></script>
</head>
<body>

    <?php $this->load->view('/common/navbar') ?>

    <div class="container">
        <?php foreach($this->session->get_flash_keys() as $key): ?>
        <div class="alert alert-<?= $key ?>"><?= $this->session->flashdata($key) ?></div>
        <?php endforeach; ?>

        <?php foreach($views as $template => $contents): ?>
        <?php $this->load->view($template, $contents) ?>
        <?php endforeach; ?>
    </div>

    <footer class="blog-footer">
      <p>Copyright (C) 2016 qv All Rights Reserved.</p>
      <p>
        <a href="#">top</a>
      </p>
    </footer>

    <?php $this->load->view('/common/analytics') ?>
</body>
</html>