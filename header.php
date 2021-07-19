<?php include 'init.php' ?>
<!DOCTYPE html>
<html id="html" lang="<?= $lang ?>" data-platform="<?= $platform ?>" data-site-type="<?= $site_type ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include 'inc/preload.php'?>
  <link rel="canonical" href="<?= $current_url ?>" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link href="<?= $style_url ?>" rel="stylesheet">
  <?php include 'inc/favicon.php' ?>
  <?php include 'inc/metas.php' ?>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  <?php if ($page == 'home' || $page == 'contacto') { ?>
    <!-- Google Captcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $recaptcha_key ?>"></script>
  <?php }
  if($page == 'home'){ ?>
    <link rel="preconnect" href="https://www.google.com"  >
    <link rel="preconnect" href="https://www.youtube.com"  >
  <?php }
  include 'inc/analytics.php' ?>
  <meta name="format-detection" content="telephone=no">
</head>

<body id="top" class="fade-in <?= $page ?> toggler" data-modal="off" data-scroll="top" data-page="<?= $page ?>">

  <header id="header" class="container py-2 py-md-3 py-md-3 align-center trans">

      <div class="col-1-5 col-md-1-3 col-lg-1-3">
        <?php include 'layout/partials/brand.php'; ?>
      </div>

      <div id="desc-title" class="col-6-8 col-md-6-10 col-lg-6-10 justify-self-left z-999">
        <span class="big-title desc-title text-light">Lake Homes</span>
      </div>

      <div class="col-11-13 grid justify-items-end">
        <?php include 'layout/partials/burger.php'; ?>
      </div>

    <?php include 'layout/partials/menu.php'; ?>

  </header>