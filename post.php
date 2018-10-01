<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
    $this->need('header.php');

?>

<div class="mdui-container">
    <div class="vContainer">
      <div class="mdui-row">
        <div class="mdui-col-md-3 mdui-hidden-sm mdui-hidden-xs">
            <div class="page-readNow" id="pTitle-list">
                <div class="readNow-list"></div>
                <div style="margin-top: 24px">
                    <div class="PnP-item">
                        上一条 ：<?php $this->thePrev('%s','没啦'); ?>
                    </div>
                    <div class="PnP-item">
                        下一条 ：<?php $this->theNext('%s','没啦'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdui-col-md-8 page-file-body">
            <div class="getTitle">
                <div class="mdui-row">
                    <?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
                    <?php else: ?>
                        <?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
                        <?php else: ?>
                            <div id="thePageFirstImg" style="background-image: url('<?php showThumbnail($this); ?>')">
                                <h1 class="post-page-Title"><?php $this->title() ?></h1>
                                <p id="pageAuthor"><?php $this->author(); ?>
                                    <span style="margin: 0 5px">·</span><span style="letter-spacing: 1px;"><?php $this->date(); ?></span>
                                    <span>浏览量 ：<?php get_post_view($this) ?></span>
                                </p>

                                <div class="tag-item">
                                    <?php $this->category(''); ?>
                                </div>
                            </div>
                            <script>
                                colors = ['#66ccff', '#fa709a', '5DA980', '5CAFD7'];
                                tags2 = $('.tag-item').find('a');
                                _colorR(tags2.length,tags2);
                                function _colorR(num,ev) {
                                    for (i=0;i<num;i++){
                                        cn = Math.floor(Math.random()*colors.length);
                                        ev.eq(i).css({
                                            backgroundColor : colors[cn]
                                        })
                                    }
                                }
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="post-page-body">
                    <div class="page-head-data">
                        <div class="mdui-float-right post-page-moreTools">
                            <button class="mdui-btn">
                                <i class="fa fa-thumbs-o-up"></i>
                            </button>
                            <button class="mdui-btn">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="mdui-btn">
                                <i class="fa fa-share"></i>
                            </button>
                        </div>
                        <div style="clear: both"></div>
                        <div class="post-page-content page">
                            <?php $this->content('Continue Reading...'); ?>
                            <div class="mdui-divider" style="margin-top: 30px;margin-bottom: 16px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                ev = $('.getTitle');
                h2num = ev.find('h1,h2,h3,h4,h5,h6').length;
                divs = '';
                for (i = 0;i<h2num;i++){
                    divs = divs+'<a class="page-ext0-title" href='+'#ph'+i+'>'+ev.find('h1,h2,h3,h4,h5').eq(i).text()+'</a>';
                    ev.find('h1,h2,h3,h4,h5').eq(i).attr('id','ph'+i);
                }
                $('.readNow-list').html(divs);
                $('#pTitle-list').animate({
                    opacity : '1'
                });
                an_Move('pTitle-list','0','0','400ms');
            </script>
                <div class="post-page-comment">
                    <?php $this->need('comments.php'); ?>
                </div>
        </div>
      </div>  
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
<?php require 'run.php'; ?>
