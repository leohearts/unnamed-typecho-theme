<html>
<?php $this->header(); ?>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />

<head>
    <title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/main.css'); ?>" />
</head>

<body>

    <div class="headbar">
        <div class="descriptions">
            <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
            <p><?php $this->options->description() ?></p>
        </div>
        <ul class="navigations">
            <?php $this->widget('Widget_Contents_Page_List')
                ->parse('<a href="{permalink}">{title}</a>'); ?>
        </ul>
    </div>