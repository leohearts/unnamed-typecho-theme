<?php $this->need('header.php'); ?>
<?php $this->need('utils.php'); ?>

<div class="indexMain">
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
                    <img alt="cover" <?php $fileBlurhash = encodeBlurhash($this->fields->Cover);echo ' width=' . $fileBlurhash['width'] . ' height=' . $fileBlurhash['height'] . ' blurhash="' . $fileBlurhash["hash"] . '"' . ' src="' . $this->fields->Cover.'"'; ?>>
                <?php } else { ?>
                    <img alt="cover" <?php $fileBlurhash = encodeBlurhash($this->options->background);echo ' width=' . $fileBlurhash['width'] . ' height=' . $fileBlurhash['height'] . ' blurhash="' . $fileBlurhash["hash"] . '"' . ' src="' . $this->options->background.'"'; ?>>
                <?php } ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php $this->need("footer.php"); ?>
