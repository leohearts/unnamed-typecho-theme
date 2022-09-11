<?php
/**
 * 关于
 *
 * @package custom
 */

$this->need('header.php'); ?>

<div class="main">
    <?php while ($this->next()) : ?>
        <div class="postPost">
            <div class="postText">
                    <div class="entryText">
                        <?php $this->content(''); ?>
                    </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need("footer.php"); ?>
