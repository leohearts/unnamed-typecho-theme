<?php $this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entryTags">
                        <p>🏷️<?php $this->category('/'); ?>/<?php $this->tags('/', true, '') ?> 🕒<?php $this->date('Y/m/d'); ?> 👀<?php $this->viewsNum(); ?> <span class="set-likes iconfont icon-zan" data-cid="<?php $this->cid(); ?>">💖<span class="get-likes set-likes" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum(); ?></span></span></p></div>
                    <div class="entryText">
                        <?php $this->content(''); ?>
                    </div>
            </div>
        </div>
    <?php endwhile; ?>

</div>

<?php $this->need("footer.php"); ?>
