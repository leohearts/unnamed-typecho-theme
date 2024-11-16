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
                    <p>🏷️<?php $this->category('/'); ?>/<?php $this->tags('/', true, '') ?> 🕒<?php $this->date('Y/m/d'); ?> 👀<?php $this->viewsNum(); ?> <span class="set-likes iconfont icon-zan" data-cid="<?php $this->cid(); ?>">💖<span class="get-likes set-likes" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum(); ?></span></span></p></div>
                </div>
                <div class="entryText">
                    <?php

                    $content = $this->content;
                    if (preg_match_all('/<h(\d)>(.*)<\/h\d>/isU', $content, $outarr)){
                    $toc_out = "";
                    $minlevel = 6;
                    for ($key=0; $key<count($outarr[2]); $key++) $minlevel = min($minlevel, $outarr[1][$key]);
                    $curlevel = $minlevel-1;
                    for ($key=0; $key<count($outarr[2]); $key++) {
                        $ta = $content;
                        $tb = strpos($ta, $outarr[0][$key]);
                        $level = $outarr[1][$key];
                        $content = substr($ta, 0, $tb). "<a id=\"" . urlencode(substr($ta, $tb, 32)) ."{$key}\" style=\"position:relative; top:-50px\"></a>". substr($ta, $tb);
                        if ($level > $curlevel) $toc_out.=str_repeat("<ol>\n", $level-$curlevel);
                        elseif ($level < $curlevel) $toc_out.=str_repeat("</ol>\n", $curlevel-$level);
                        $curlevel = $level;
                        $toc_out .= "<li><a href=\"#" . urlencode(substr($ta, $tb, 32)) ."{$key}\">{$outarr[2][$key]}</a></li>\n";
                    }
                    $content = "<div id=\"tableOfContents\">{$toc_out}</div>". $content;
                }
                    echo $content;
                    ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need("footer.php"); ?>
