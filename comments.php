<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>

    <div class="comment-item">
        <div class="comFlex">
            <?php $comments->gravatar('55', ''); ?>
            <div class="com-userCon">
                <div class="com-userName">
                    <h3 class="<?php $comments->theId(); ?>">
                        <span><?php $comments->author(); ?></span>
                        <span class="comDate"><?php $comments->date('Y - m - d H:i'); ?></span>
                        <span class="replyBtn">
                        <?php $comments->reply('回复'); ?>
                        </span>
                    </h3>
                </div>
                <div class="com-user-sayWhy">
                    <?php $comments->content(); ?>
                </div>
            </div>
        </div>
        <div class="comment-children">
        <?php if ($comments->children) { ?>
                <?php $comments->threadedComments($options); ?>
        <?php } ?>
        </div>
    </div>

<?php } ?>
<div class="mdui-row commentBox">
    <div id="comments">
        <?php $this->comments()->to($comments); ?>
        <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        <?php else: ?>
            <div class="comments-404">还没有评论</div>
        <?php endif; ?>

        <?php if($this->allow('comment')): ?>

        <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?>
    </div>
    <div>
        <div id="<?php $this->respondId(); ?>" class="addComment">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                    <style>
                        #user-com-conText {padding-right: 12px !important;}
                    </style>
                <div class="reply-user">
                    <i class="fa fa-user-o" style="margin-right: 5px"></i><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a><a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><i class="fa fa-exchange"></i></a>
                </div>
                <?php else: ?>
                <div class="com-goLogin">
                    <a href="<?php $this->options->adminUrl(); ?>">去登陆？</a>
                </div>
                <div class="commentData-filed">
                    <div class="getData-input-pos">
                        <div>
                            <i class="fa fa-user-o"></i>
                            <input type="text" class="getDataInput" placeholder="昵称" name="author" value="<?php $this->remember('author'); ?>" required />
                        </div>
                        <div>
                            <i class="fa fa-envelope-o"></i>
                            <input type="email" class="getDataInput" placeholder="邮箱" name="mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                        </div>
                        <div>
                            <i class="fa fa-link"></i>
                            <input type="text" class="getDataInput" name="url" placeholder="网址" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
                        </div>
                    </div>
                    <?php endif; ?>
                    <textarea id="user-com-conText" name="text" placeholder="今天也好失败..." required><?php $this->remember('text'); ?></textarea>
                    <button type="button" class="subBtn mdui-ripple"><?php _e('提交评论'); ?></button>
                </div>
            </form>
            <script>
                $('.subBtn').click(function (e) {
                    cn = '<?php echo ifGet(); ?>';
                    oldValue = $('#user-com-conText').val();
                    if (cn && oldValue != ''){
                        newValue = '@'+$('.comment-<?php echo ifGet(); ?> span:first').text()+'  '+oldValue;
                        $('#user-com-conText').val(newValue);
                    }
                    $('#comment-form').submit();
                });
            </script>
        </div>
    </div>
</div>