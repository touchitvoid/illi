<?php
/**
 *  友链
 * @package custom
 *
 */
$this->need('header.php');
?>
<div class="mdui-container">
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
                <div class="mdui-row ab-pageBody linksPanel">
                    <div class="mdui-col-md-12">
                        <div class="ab-con page" itemprop="articleBody">
                            <?php $this->content(); ?>
                            <a class="linkCard">
                                <div class="linkIcon" style="background-image: url('http://img.hb.aicdn.com/7dd79ec3bf99c6bcdfcd95dc5ad9d18aa661567918322-riM35x_fw658')"></div>
                                <div class="linkData">
                                    <h3>友链卡片</h3>
                                    <p>会不会想看一下</p>
                                </div>
                            </a>
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
<?php require 'run.php'; ?>

