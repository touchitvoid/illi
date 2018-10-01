<?php
/**
 * illi 先行版
 *
 * @package typecho-theme-illi
 * @author Void QQ1544020198
 * @version 0.1
 * @link http://icry.info
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
    <div class="mdui-container">
        <style>
            .otherSidebarPos {display: none}
        </style>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
        <div class="vContainer">
            <div class="mdui-row blogBody">
                <div class="mdui-col-md-1 shadow-3">
                    <div class="indexSidebar">
                        <div class="indexSidebarBtn-Pos">
                            <button class="fa fa-angle-up mdui-ripple backPageTop" title="页面顶部"></button>
                            <button class="fa fa-link mdui-ripple openLinkMenu" title="撰写新文章" onclick="linkMenu()"></button>
                            <div class="linkMenu">
                                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                <?php while($pages->next()): ?>
                                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><div class="mdui-ripple"><?php $pages->title(); ?></div></a>
                                <?php endwhile; ?>
                                <a href="<?php $this->options->adminUrl(); ?>">
                                    <div>登陆</div>
                                </a>
                                <a href="<?php $this->options->feedUrl(); ?>">
                                    <div class="mdui-ripple">
                                        <i class="fa fa-rss"></i>
                                    </div>
                                </a>
                                <a class="mdui-ripple" id="sw-userCard" mdui-tooltip="{content: '显示资料卡'}">
                                    <div>
                                        <i class="fa fa-toggle-off"></i>
                                    </div>
                                </a>
                                <script>
                                    $('#sw-userCard').click(function () {
                                        evc = $(this).find('i').attr('class');
                                        if (evc == 'fa fa-toggle-off') {
                                            $(this).find('i').attr('class','fa fa-toggle-on');
                                            $('#userDataControl').hide();
                                            $('.sql-data').css({marginBottom : '12px',});
                                        }else{
                                            $(this).find('i').attr('class','fa fa-toggle-off');
                                            $('#userDataControl').show();
                                            $('.sql-data').css({marginBottom : '50px'});
                                        }
                                    })
                                </script>
                            </div>
                            <button class="fa fa-angle-down mdui-ripple toBottom" title="页面底部"></button>
                        </div>
                    </div>
                </div>
                <div class="mdui-col-md-10 start" style="background: white">
                    <div class="mdui-row sql-data">
                        <div class="mdui-col-md-4 mdui-col-xs-4 sql-data-item">
                            <h1><?php $stat->publishedPostsNum() ?></h1><span>/</span><p>主题</p>
                        </div>
                        <div class="mdui-col-md-4 mdui-col-xs-4 sql-data-item">
                            <h1><?php $stat->publishedCommentsNum() ?></h1><span>/</span><p>评论</p>
                        </div>
                        <div class="mdui-col-md-4 mdui-col-xs-4 sql-data-item">
                            <h1><?php $stat->categoriesNum() ?></h1><span>/</span><p>分类</p>
                        </div>
                    </div>
                    <div class="mdui-divider"></div>
                    <div class="cms">
                        <div class="app">
                            <div class="mdui-row" id="userDataControl">
                                <div class="blog-user-data">
                                    <div class="user-data">
                                        <div id="userIcon" style="background-image: url('<?php Typecho_Widget::widget('Widget_Options')->icon() ?>')"></div>
                                    </div>
                                    <div class="user-more-data">
                                        <div class="user-mdata-i">
                                            <h2>Void</h2>
                                            <p style="color: rgba(0,0,0,.4);">暂未提供接口，请修改index.php</p>
                                        </div>
                                        <div class="ab-user-url">
                                            <a><i class="fa fa-github"></i>&nbspGithub</a>
                                            <a>知乎</a>
                                            <a><i class="fa fa-terminal"></i>&nbsp其他</a>
                                            <a><i class="fa fa-envelope-o"></i>&nbsp邮箱：touchitvoid@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mdui-row">
                                                            <div class="indexCategoryBox">
                                <ul class="indexCategoryCard">
                                    <?php $this->widget('Widget_Metas_Category_List')
                                        ->parse('<a href="{permalink}"><li class="icc-item">{name}
                                        <div class="icc-num">文章数量：{count}</div>
                                        <p class="ca-description">{description}</p>
                                        </li></a>');
                                    ?>
                                </ul>
                            </div>
                            </div>

                            <div style="font-size: 0" class="cardList">
                                <?php while($this->next()): ?>
                                <?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
                                        <?php else: ?>
                                        <?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
                                        <?php else: ?>
                                        <div class="page-card" style="background-image:url('<?php showThumbnail($this); ?>')">
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        <div class="blurBg"></div>
                                        <div class="page-title">
                                            <i class="fa fa-quote-left ptF-icon"></i>
                                            <h2>
                                                <?php $this->title() ?>
                                            </h2>
                                            <i class="fa fa-quote-right ptF-icon"></i>
                                        </div>
                                        <div class="page-con-ex">
                                            <div class="blurText">
                                                <?php $this->excerpt(52,'...'); ?>
                                                <a href="<?php $this->permalink() ?>">
                                                    <button class="clearDc readMore mdui-ripple">继续阅读</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="indexPage-data">
                                            <div>
                                                <i class="fa fa-user"></i><?php $this->author(); ?>
                                            </div>
                                            <div>
                                                <i class="fa fa-clock-o"></i><?php $this->date(); ?>
                                            </div>
                                            <div>
                                                <i class="fa fa-tags"></i><?php $this->category(','); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php $this->pageNav('<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>',2, '...', 'wrapTag=div&wrapClass=nav&itemTag=div&tClass=current&prevClass=prev&nextClass=next'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->need('footer.php'); ?>
<?php $this->need('sidebar.php'); ?>
<?php require 'run.php'; ?>
