<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="mdui-divider" style="margin-top: 32px" id="footerTborder"></div>
<footer>
    <div>
        <span><i class="fa fa-code"></i>由强力的 <a href="http://typecho.org/">Typecho</a> 驱动</span>
        <span><i class="fa fa-pencil-square-o"></i>Theme : typecho-theme-illi</span>
    </div>
    <div>Powered by Void ©2018-2018</div>
</footer>
<script>
    hm = $('.header-menu');
    let m1 = 0; // 滚动的值
    let m2 = 0; // 对比时间的值
    let timer = null;
        $(document).ready(function(){
            var p=0;t=0;
            $(window).scroll(function(e){
                clearTimeout(timer); // 每次滚动前 清除一次
            timer = setTimeout(function() {
            m1 = document.documentElement.scrollTop || document.body.scrollTop; //滚动的值
            m2 = document.documentElement.scrollTop || document.body.scrollTop; //对比时间的值
            if (m2 == m1) {
                $('.header-menu').css({transform : 'translate(0,0)'});
                $('.bar').css({transform : 'translate(0,0)'})
                $('.header-menu').css({transform : 'translate(0,0)'})
            }
        }, 560);
            p=$(this).scrollTop();
                if(t<=p){
                    $('.header-menu').css({transform : 'translate(0,-65px)'})
                    $('.bar').css({transform : 'translate(-45px,0)'})
                }else{
                    $('.header-menu').css({transform : 'translate(0,0)'})
                    $('.bar').css({transform : 'translate(-45px,0)'})
                }t = p;
            })
        })
</script>
<?php $this->footer(); ?>
</body>
</html>
