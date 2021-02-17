<?php $this->need('header.php'); ?>


<div class="main">
    <div class="postMainCover">
        <?php if ($this->fields->Cover) { ?>
            <img alt="cover" src="<?php echo $this->fields->Cover ?>">
        <?php } else { ?>
            <img alt="cover" src="<?php echo "https://leohearts.com/usr/uploads/2020/09/324859977.webp" ?>">
        <?php } ?>
    </div>
    <?php while ($this->next()) : ?>
        <div class="post">
            <div class="postText">
                <h2 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                <div class="entryTags">
                    <p><?php $this->category('/'); ?> on <?php $this->date('Y/m/d'); ?></p>
                </div>
                <div class="entryText">
                    <?php $this->content(''); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php $this->need("footer.php"); ?>