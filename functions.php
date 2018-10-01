<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

    $slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array(
        'showon'=>'有图文章显示缩略图，无图文章随机显示缩略图',
        'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图',
        'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图',
        'allsj' => '所有文章一律显示随机缩略图',
        'guanbi' => '关闭所有缩略图显示'
    ), 'showon',
        _t('缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));
    $form->addInput($slimg->multiMode());

    $bg = new Typecho_Widget_Helper_Form_Element_Text('bg', null, null, _t('背景图片'), _t('填入外部连接更新'));
    $form->addInput($bg);
    $pay = new Typecho_Widget_Helper_Form_Element_Text('pay', null, null, _t('赞赏码'), _t('填入外部连接更新'));
    $form->addInput($pay);
    $icon = new Typecho_Widget_Helper_Form_Element_Text('icon', null, null, _t('头像'), _t('填入外部连接更新'));
    $form->addInput($icon);
}
function showThumbnail($widget)
{
    // 当文章无图片时的默认缩略图
    $dir = './usr/themes/illi/img/random/';//随机缩略图目录
    $n= sizeof(scandir($dir))-2;
    if($n <= 0){
        $n=5;
    }// 异常处理，干掉自动判断图片数量的功能，切换至手动
    $rand = rand(1,$n);
    // 随机 n张缩略图
    $random = $widget->widget('Widget_Options')->themeUrl . '/img/random/' . $rand . '.jpg'; // 随机缩略图路径
    if(Typecho_Widget::widget('Widget_Options')->slimg && 'Showimg'==Typecho_Widget::widget('Widget_Options')->slimg
    ){
        $random = $widget->widget('Widget_Options')->themeUrl . '/img/test.png'; //无图时只显示固定一张缩略图
    }
    $cai = '';//这里可以添加图片后缀，例如七牛的缩略图裁剪规则，这里默认为空
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }
//如果是内联式markdown格式的图片
    else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        $ctu = $thumbUrl[1][0].$cai;
    }
    else
        if ($attach && $attach->isImage) {
            $ctu = $attach->url.$cai;
        }
        else
            if ($widget->tags) {
                foreach ($widget->tags as $tag) {
                    $ctu = './usr/themes/illi/img/tag/' . $tag['slug'] . '.jpg';
                    if(is_file($ctu))
                    {
                        $ctu = $widget->widget('Widget_Options')->themeUrl . '/img/tag/' . $tag['slug'] . '.jpg';
                    }
                    else
                    {
                        $ctu = $random;
                    }
                    break;
                }
            }
            else {
                $ctu = $random;
            }
    if(Typecho_Widget::widget('Widget_Options')->slimg && 'showoff'==Typecho_Widget::widget('Widget_Options')->slimg
    ){
        if($widget->fields->thumb){$ctu = $widget->fields->thumb;}
        if($ctu== $random)
            echo '';
        else
            if($widget->is('post')||$widget->is('page')){
                echo $ctu;
            }else{
                echo '<img src="'
                    .$ctu.
                    '">';
            }
    }else{
        if($widget->fields->thumb){$ctu = $widget->fields->thumb;}
        if(!$widget->is('post')&&!$widget->is('page')){
            if(Typecho_Widget::widget('Widget_Options')->slimg && 'allsj'==Typecho_Widget::widget('Widget_Options')->slimg
            ){$ctu = $random;}
        }
        echo $ctu;
    }
}

function ifGet(){
    $reply = '';
    if (is_array($_GET) && count($_GET) > 0){
        if (isset($_GET['replyTo'])){
            $reply = $_GET['replyTo'];
        }
    }
    return $reply;
}
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
        if(!in_array($cid,$views)){
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}
