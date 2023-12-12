<?php

$this->need('header.php'); ?>

<div class="main">
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>">
                        <?php $this->title() ?>
                    </a></h1>
                <div class="entryText">
                    <h1>🥔 Hi there, I'm Leohearts!</h1>
                    <p>可以叫我芋头～</p>
                    <p>这里是我的页面，用来记录一些自己遇到的有趣的事情，以及一点点的心中所想。<br><del>但可能更像一个技术博客？</del></p>
                    <h2>欢迎！</h2>
                    <a href="./blog.html">博客</a>
                    <a href="./friends.html">友链</a>
                    <a href="https://t.me/whatdoespotatoeattoday">芋头今天吃什么</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>


<?php $this->need("footer.php"); ?>
