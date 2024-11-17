<?php $this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entryTags">
                        <p style="display: inline">
                            <span class="tags">🏷️ <?php $this->category('/'); ?>/<?php $this->tags('/', true, '') ?></span>
                            <span class="tags">🕒 <?php $this->date('Y/m/d'); ?></span>
                            <span class="tags">👀 <?php $this->viewsNum(); ?></span>
                            <span class="tags set-likes iconfont icon-zan" data-cid="<?php $this->cid(); ?>">💖 <span class="get-likes set-likes" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum(); ?></span></span>
                        </p>
                    <div class="entryText">
                        <?php $this->content(''); ?>
                    </div>
            </div>
        </div>
    <?php endwhile; ?>

</div>

<?php $this->need("footer.php"); ?>
