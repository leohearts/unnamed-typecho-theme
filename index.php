<?php $this->need('header.php'); ?>


<div class="main">
    <?php while ($this->next()) : ?>
        <div class="post">
            <div class="texts">
                <h2 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                <div class="entryTags">
                    <p><?php $this->category('/'); ?> on <?php $this->date('Y/m/d'); ?></p>
                </div>
                <div class="entryText">
                    <?php $this->content(''); ?>
                </div>
            </div>
            <div class="postCover">
                <?php if ($this->fields->Cover) { ?>
                    <img alt="cover" src="<?php echo $this->fields->Cover ?>">
                <?php } else { ?>
                    <img alt="cover" src="<?php echo $this->options->background ?>">
                <?php } ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php $this->need("footer.php"); ?>