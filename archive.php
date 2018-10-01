<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="mdui-container">
        <div class="vContainer" role="main">
            <div class="mdui-row">
                <div class="mdui-col-md-10 archiveBody mdui-col-offset-md-1">
                <h3 class="archive-title" style="display: none"><?php $this->archiveTitle(array(
                    'category'  =>  _t('分类 %s 下的文章'),
                    'search'    =>  _t('包含关键字 %s 的文章'),
                    'tag'       =>  _t('标签 %s 下的文章'),
                    'author'    =>  _t('%s 发布的文章')
                ), '', ''); ?></h3>
            <div class="mdui-row">
                <div class="mdui-col-md-12">
                    <div class="ar_indexTitle">
                        <a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home" style="margin-right: 3px"></i>首页</a> / <?php $this->archiveTitle(array(
                            'category'  =>  _t('%s'),
                            'search'    =>  _t('%s'),
                            'tag'       =>  _t('%s'),
                            'author'    =>  _t('%s')
                        ), '', ''); ?>
                    </div>
                    <?php if ($this->have()): ?>
                        <div style="text-align: center;font-size: 18px;margin-bottom: 36px">
                        <p>已在下方列出所有内容</p>
                        <p style="font-size:16px;margin-top:8px">- <?php echo $this->getDescription(); ?> -</p>
                        </div>
                        <div class="cardList">
                            <?php while($this->next()): ?>
                                <div class="page-card">
                                    <div class="page-title">
                                        <i class="fa fa-quote-left ptF-icon"></i>
                                        <a href="<?php $this->permalink() ?>">
                                            <h2>
                                                <?php $this->title() ?>
                                            </h2>
                                        </a>
                                        <i class="fa fa-quote-right ptF-icon"></i>
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
                        </div>
                    <?php else: ?>
                    <div class="notFoundItem" style="text-align: center">
                        <h3>没有找到这个内容</h3>
                        <p>或者换个 '关键字' 进行搜索？或者您可以试试这些</p>
                        <div class="recTags">
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
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
