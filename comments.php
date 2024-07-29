<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <style>

#comments h3 {
  margin-bottom: 0px;
  margin-top: 30px;
}

.comment-form {
  display: flex;
}
.comment-content {
  display: flex;
  margin-bottom: 0px;
}
.comment-content textarea {
  width: 100%;
  border-width: 2px;
  border-style: dashed;
  border-color: lightpink;
  border-radius: 5px;
  padding: 15px;
  list-style-type: none;
  resize: none;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
#response {
  width: 100%;
  display: block;
}

.input-id {
  display: flex;
  flex-direction: column;
  width: 100%;
  align-self: center;
  margin-top: 6px;
}

#comment-form {
  display: flex;
  flex-direction: column;
}
.input-id label {
  height: 1.8em;
}
.input-id input {
  border-width: 1px;
  border-style: solid;
  border-color: #ccc;
  border-radius: 5px;
  height: 2em;
  padding: 0 5px;
}

.input-id-box { 
  display: grid;
  grid-template: "a b c";
  grid-column-gap: 20px;
}
    
.comment-parent {
  border-width: 2px;
  border-style: dashed;
  border-color: cadetblue;
  border-radius: 10px;
  padding: 15px;
  margin-bottom: 15px;
  list-style-type: none;
}
.comment-parent .comment-reply {
  text-align: right;
}
#comments > .comment-list {
  padding-left: 0px;
}
.comment-submit button {
  border-width: 1px;
  height: 40px;
  width: 80px;
  border-style: solid;
  border-color: pink;
  border-radius: 5px;
  background-color: antiquewhite;
}
.comment-submit button:hover {
  background-color: pink;
  transition: background-color 0.2s ease;
}
.comment-meta p {
  margin: 0px;
}
.comment-meta {
  display: grid;
  grid-template: "a b d" auto
    "a c d"
    / auto 1fr auto
    ;
}
.comment-author {
  grid-area: a;
}
.comment-author img {
  border-radius: 10px;
  margin-right: 10px;
  width: 45px;
  height: 45px;
}
.comment-meta cite {
  grid-area: b;
}
.comment-meta p {
  grid-area: c;
}
.comment-reply {
  grid-area: d;
}
#cancel-comment-reply-link {
	border-width: 2px;
	border-style: dashed;
	border-color: burlywood;
	display: inline;
	padding: 5px 8px;
	border-radius: 5px;
	font-size: smaller;
}
#cancel-comment-reply-link:hover {
  background-color: burlywood;
  transition: background-color 0.2s ease;
}
#cancel-comment-reply-link:after {
  display: none;
}
.respond {
    animation: showReplyBox 0.3s ease-in-out;
    margin: 20px 0px 50px 0px;
}
@keyframes showReplyBox {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
@media(orientation: portrait) {
  .input-id-box {
    display: flex;
    flex-direction: column;
  }
}
    
    </style>
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php function threadedComments($comments, $options) {
            $commentClass = '';
            if ($comments->authorId) {
                if ($comments->authorId == $comments->ownerId) {
                    $commentClass .= ' comment-by-author';
                } else {
                    $commentClass .= ' comment-by-user';
                }
            }
        
            $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
        ?>
        
            <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
            if ($comments->levels > 0) {
                echo ' comment-child';
                $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
            } else {
                echo ' comment-parent';
            }
            $comments->alt(' comment-odd', ' comment-even');
            echo $commentClass;
            ?>">
                <div id="<?php $comments->theId(); ?>">
                    <div class="comment-meta">
                        <div class="comment-author">
                            <?php $comments->gravatar('40', ''); ?>
                        </div>
                        <cite class="fn"><?php $comments->author(); ?></cite>
                        <p>
                            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
                            <span><?php //$options->commentStatus(); ?></span>
                        </p>
                        <p class="comment-reply"><?php $comments->reply(); ?></p>
                    </div>
                    <?php $comments->content(); ?>
                    
                </div>
            <?php if ($comments->children) { ?>
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                </div>
            <?php } ?>
            </li>
        <?php } ?>
        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h3 id="response"><?php _e('添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <p class="comment-content">
                    <textarea rows="8" cols="50" name="text" placeholder="写点什么吧" id="textarea" class="textarea"
                              required><?php $this->remember('text'); ?></textarea>
                </p>
                <div class="input-id-box">
                <?php if ($this->user->hasLogin()): ?>
                    <p class=""><?php _e('登录身份: '); ?><a
                            href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
                            href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <p class="input-id">
                        <label for="author" class="required"><?php _e('称呼'); ?></label>
                        <input type="text" name="author" id="author" class="text"
                               value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p class="input-id">
                        <label
                            for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="text"
                               value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p class="input-id">
                        <label
                            for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>"
                               value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                </div>
                <p class="comment-submit">
                    <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
                </p>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
