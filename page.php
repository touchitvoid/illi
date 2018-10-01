<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container" role="main">
    <div class="vContainer">
        <div class="mdui-row">
            <div class="mdui-col-md-10 mdui-col-offset-md-1 aboutPage-html">
                <div class="mdui-row">
                    <div class="ab-tImg">
                        <h1 class="post-page-Title"><?php $this->title() ?></h1>
                        <p id="pageAuthor"><?php $this->author(); ?>
                            <span style="margin: 0 5px">·</span><span style="letter-spacing: 1px;"><?php $this->date(); ?></span>
                        </p>
                    </div>
                </div>
                <div class="mdui-row ab-pageBody page">
                    <div class="mdui-col-md-12">
                        <div class="ab-con" itemprop="articleBody">
                            <?php $this->content(); ?>
                        </div>
                    </div>
                </div>
                <div class="mdui-divider" style="margin: 12px 0"></div>

                    <?php $this->need('comments.php'); ?>

            </div>
        </div>
    </div>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>

