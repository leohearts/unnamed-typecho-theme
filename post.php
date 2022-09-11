<?php $this->need('header.php'); ?>
<?php $this->need('utils.php'); ?>

<div class="main">
    <div class="postMainCover">
        <?php if ($this->fields->Cover) { ?>
            <img alt="cover" <?php $fileBlurhash = encodeBlurhash($this->fields->Cover);echo ' width=' . $fileBlurhash['width'] . ' height=' . $fileBlurhash['height'] . ' blurhash="' . $fileBlurhash["hash"] . '"' . ' src="' . $this->fields->Cover.'"'; ?>>
        <?php } else { ?>
            <img alt="cover" <?php $fileBlurhash = encodeBlurhash($this->options->background);echo ' width=' . $fileBlurhash['width'] . ' height=' . $fileBlurhash['height'] . ' blurhash="' . $fileBlurhash["hash"] . '"' . ' src="' . $this->options->background.'"'; ?>>
        <?php } ?>
    </div>
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                <div class="entryTags">
                    <p><?php $this->category('/'); ?> on <?php $this->date('Y/m/d'); ?></p>
                </div>
                <div class="entryText">
                    <?php echo $this->content; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need("footer.php"); ?>
