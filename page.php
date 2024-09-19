<?php $this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entryTags">
                        <p><?php $this->category('/'); ?> <?php $this->tags('/', true, '') ?> on <?php $this->date('Y/m/d'); ?></p>
                    </div>
                    <div class="entryText">
                        <?php $this->content(''); ?>
                    </div>
            </div>
        </div>
    <?php endwhile; ?>

</div>

<?php $this->need("footer.php"); ?>
