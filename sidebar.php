<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="bar">
    <a href="<?php $this->options->siteUrl(); ?>" class="barItemBindex">
        <div class="mdui-ripple" id="Get-newCom">
            <i class="fa fa-home"></i>
        </div>
    </a>
    <div class="barItem mdui-ripple" id="Get-newCom">
        <i class="fa fa-commenting"></i>
    </div>
    <div class="barItem mdui-ripple" id="Get-newPage">
        <i class="fa fa-list"></i>
    </div>
    <div class="barItem mdui-ripple" id="Get-Tags">
        <i class="fa fa-tags"></i>
    </div>
    <div class="barItem mdui-ripple" id="pay">
        <i class="fa fa-credit-card"></i>
    </div>
    <div class="barClose mdui-ripple">
        <i class="fa fa-close"></i>
    </div>
</div>
<div class="indexSidebar otherSidebarPos">
    <div class="indexSidebarBtn-Pos">
        <button class="fa fa-angle-up mdui-ripple backPageTop" title="页面顶部"></button>
        <a <!--href="--><?php /*$this->options->adminUrl(); */?>">
            <button class="fa fa-link mdui-ripple openLinkMenu" onclick="linkMenu()" title="撰写新文章"></button>
        </a>
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
        </div>
        <button class="fa fa-angle-down mdui-ripple toBottom" title="页面底部"></button>
    </div>
</div>
<script>
    $('.mb-fixedToolBtn').click(function () {
        $('.bar').css({transform : 'translate(5px,0)'});
        $(this).css({transform: 'translate(-12px,0)',opacity:'0'});
    });
    $('.barClose').on('click',function () {
        $('.bar').css({transform : 'translate(-45px,0)'});
        $('.mb-fixedToolBtn').css({transform: 'translate(0,0)',opacity:'1'});
    });
    scrollSidebar();
</script>