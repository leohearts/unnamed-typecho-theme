<?php
/**
 * 首页
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
</div>



<?php $this->need("footer.php"); ?>
