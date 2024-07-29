<?php
/**
 * 友链
 *
 * @package custom
 */

$this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                <h1 class="entryTitle"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entryText">
                        <?php $this->content(''); ?>
                        <div class="friends-grid">
                        </div>

                    </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('css/friends.css'); ?>" />
<script src="<?php $this->options->themeUrl('js/friends.js'); ?>" defer></script>

<?php $this->need("footer.php"); ?>
