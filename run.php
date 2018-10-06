<script>
    $(document).pjax('.replyBtn a,#cancel-comment-reply-link','.commentBox',{
        fragment : '.commentBox',
        timeout  : '999999'
    });
    $(document).pjax('.nav a','.cardList',{
        fragment : '.cardList',
        timeout  : '999999',
    });
    $(document).pjax('.PnP-item a,.linkMenu a,.indexCategoryCard a,.tag-item a,#wsTitle,.barItemBindex,.switch-list a,.blurText a,.ar_indexTitle a,.page-title > a,.Get-newCom a','.mdui-container',{
        fragment : '.mdui-container',
        timeout  : '999999'
    });
    $(document).off('pjax:complete').on('pjax:complete',function () {
        mdui.mutation();
        scrollSidebar();
    });
    colors = ['#66ccff', 'lightpink', '#fa709a', '#fed6e3', '5DA980', '5CAFD7'];
    tags = $('.tags-list').find('li');
    for (i=0;i<tags.length;i++){
        cn = Math.floor(Math.random()*colors.length);
        $('.tags-list').find('li').eq(i).css({
            backgroundColor : colors[cn]
        })
    }
    function linkMenu() {
        $('.linkMenu').slideToggle();
    }
</script>
