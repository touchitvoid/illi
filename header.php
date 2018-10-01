<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link href="https://cdn.bootcss.com/mdui/0.4.1/css/mdui.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/main.css'); ?>">
    <link href="<?php $this->options->themeUrl('css/new.css'); ?>" rel="stylesheet">
    
    <script src="https://cdn.bootcss.com/mdui/0.4.1/js/mdui.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="<?php $this->options->themeUrl('main.js'); ?>" type="text/javascript"></script>
    <?php $this->header(); ?>
</head>
<body>
<div class="header-menu">
    <div class="mdui-hidden-xs">
        <a href="<?php $this->options->siteUrl(); ?>" id="wsTitle">
            <?php $this->options->title(); ?>
        </a>
    </div>
    <div class="header-tools">
        <form action="" method="post" class="search">
            <i class="fa fa-search"></i>
            <input type="text" name="s" placeholder="搜索内容" autocomplete="off" class="search-input">
        </form>
    </div>
    <div style="clear: both"></div>
</div>
<script>
    scLock = false;
    hm = $('.header-menu');
    wst = $('#wsTitle')[0];
    window.addEventListener('scroll',onScroll,false);
    function onScroll(){
        if(!scLock) {
            requestAnimationFrame(realFunc);
            scLock = true;
        }
    }
    function realFunc(){
        if (document.documentElement.scrollTop > 250) {
            hm.css({
                background : 'white',
                boxShadow : '0 1px 8px -1px rgba(0,0,0,.15)'
            });
            wst.style = "color : rgba(0,0,0,.55)";
        }else {
            hm.css({
                background : 'transparent',
                boxShadow: 'none'
            });
            $('.indexSidebarBtn-Pos').css({transform: 'translate(0,-65px)'});
            wst.style = "color : white"
        }
        scLock = false;
    }
    scrollSidebar();
</script>
    <?php if(Typecho_Widget::widget('Widget_Options')->bg == ''): ?>
        <div class="an">
    <?php else: ?>
        <div class="an" style="background-image:url('<?php Typecho_Widget::widget('Widget_Options')->bg() ?>')">
    <?php endif; ?>
        <h2><?php $this->options->description() ?></h2>
    </div>
    <div class="mask">
        <div class="clickHidden" style="width: 100%;height: 100%;position: absolute;top: 0;left: 0;"></div>
        <div class="mask-panel" id="maskP">
            <button class="mask-btn clearDc">
                <i class="fa fa-close"></i>
            </button>
            <div class="mask-data">
                <div class="nC-list Get-newCom">
                    <div class="mask-title">
                        New comments
                    </div>
                    <div class="mask-sTitle">
                        最近留下的评论
                    </div>
                    <div class="colorBar" style="width: 100px;margin-top: 5px;"></div>
                    <?php
                    $this->widget('Widget_Comments_Recent','pageSize=6')->to($comments);
                    ?>
                    <?php while($comments->next()): ?>
                        <a href="<?php $comments->permalink(); ?>">
                            <div class="newComment-item">
                                <?php $comments->gravatar('50', ''); ?>
                                <div class="newComment-data">
                                    <h3><?php $comments->author(false); ?></h3>
                                    <p><?php $comments->excerpt(24, '...'); ?></p>
                                </div>
                                <i class="fa fa-arrow-right newComArrow"></i>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <div class="nP-list Get-newPage">
                    <div class="mask-title">
                        New Pagelist
                    </div>
                    <div class="mask-sTitle">
                        最新六篇文章
                    </div>
                    <div class="colorBar" style="width: 100px;margin-top: 5px;"></div>
                    <?php
                    $recent = $this->widget('Widget_Contents_Post_Recent','pageSize=6');
                    if($recent->have()):
                        while($recent->next()):
                            ?>
                        <a href="<?php $recent->permalink(); ?>">
                            <div class="newPage-item">
                                <?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
                                <?php else: ?>
                                    <?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
                                    <?php else: ?>
                                        <div class="nP-iImg" style="background-image: url('<?php showThumbnail($this); ?>')"></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="nP-iTitle">
                                    <?php $recent->title();?>
                                </div>
                                <div class="nP-iData">
                                    <?php $recent->date('Y / F j'); ?>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; endif;?>
                    <script>
                        $('.newPage-item:even').css({
                            marginRight : '5%'
                        })
                    </script>
                </div>
                <div class="tagCloud Get-Tags">
                    <div class="mask-title">
                        TAG Cloud
                    </div>
                    <div class="mask-sTitle">
                        会输出标签云哦~
                    </div>
                    <div class="colorBar" style="width: 100px;margin-top: 5px;"></div>
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                    <?php if($tags->have()): ?>
                    <ul class="tags-list">
                        <?php while ($tags->next()): ?>
                            <li class="mdui-ripple"><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a></li>
                        <?php endwhile; ?>
                        <?php else: ?>
                            <li><?php _e('没有任何标签'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="pay">
                    <img src="<?php Typecho_Widget::widget('Widget_Options')->pay() ?>">
                </div>
            </div>
        </div>
    </div>
