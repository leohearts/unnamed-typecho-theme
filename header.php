<!DOCTYPE html>
<html lang="zh-cn">
<?php $this->header(); ?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5.0, minimum-scale=1">
    <title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preload" href="https://chinese-fonts-cdn.deno.dev/packages/lxgwwenkai/dist/LXGWWenKai-regular/result.css" onload="this.onload=null;this.rel='stylesheet'" as="style" />
    <link rel='preload' href='https://fonts.googleapis.com/css2?family=LXGW+WenKai+TC&display=swap' as="style" onload="this.onload=null;this.rel='stylesheet'" /> 
    <link rel="me" href="https://nightcord.de/@Leohearts" >
    <noscript>
        <link rel='stylesheet' href='https://chinese-fonts-cdn.deno.dev/packages/lxgwwenkai/dist/LXGWWenKai-regular/result.css' as="style" />
        <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=LXGW+WenKai+TC&display=swap' /> 
    </noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap">
    </noscript>
    <link rel="preload" href="<?php $this->options->themeUrl('css/prism.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>">
    </noscript>
    <!-- require APlayer -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css"></noscript>
    <script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js" defer></script>
    <!-- require MetingJS -->
    <script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js" defer></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/main.css'); ?>" />
    <script src="<?php $this->options->themeUrl('js/prism.js'); ?>" async></script>
    <?php if ($this->is('post')) : ?>
        <script src="<?php $this->options->themeUrl('js/post.js'); ?>" async></script>
        <script src="https://cdn.jsdelivr.net/npm/fslightbox@3.3.1/index.js" async defer></script>
    <?php endif; ?>
    <?php if ($this->is('post') || $this->is('page')) : ?>
        <script src="<?php $this->options->themeUrl('js/likes.js'); ?>" async defer></script>
    <?php endif; ?>
    <!-- Cloudflare Web Analytics --><script defer src='https://cf-analytics.leohearts.com/cf-bcon.min.js' data-cf-beacon='{"token": "77451a38c1e0446db70a5f594e7c9a64"}'></script><!-- End Cloudflare Web Analytics -->
</head>

<body>
    <!-- blurhash -->
    <script src="<?php $this->options->themeUrl('js/blurhash.js'); ?>"></script>
    <div class="headbar">
        <div class="descriptions">
            <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
            <p><?php $this->options->description() ?></p>
        </div>
        <div class="navigations">
            <a href="/blog.html">博文</a>
            <?php $this->widget('Widget_Contents_Page_List')
                ->parse('<a href="{permalink}">{title}</a>'); ?>
        </div>
    </div>
