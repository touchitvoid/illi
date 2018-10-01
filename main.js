window.onload = function () {

    scrollSidebar();

    barEvn =  $('.mask');
    maskP =  $('#maskP')[0];
    var userAgent=navigator.userAgent.toLowerCase(), s, o = {};
    browser={
        version:(userAgent.match(/(?:firefox|opera|safari|chrome|msie)[\/: ]([\d.]+)/))[1],
        safari:/version.+safari/.test(userAgent),
        chrome:/chrome/.test(userAgent),
        firefox:/firefox/.test(userAgent),
        ie:/msie/.test(userAgent),
        opera: /opera/.test(userAgent )
    };
    nowBrowser = "";
    if (browser.ie)
    {nowBrowser = 'IE'
    }else if (browser.safari) {nowBrowser = 'safari'}
    else if (browser.firefox) {nowBrowser = 'firefox'}
    else if (browser.chrome) {nowBrowser = 'chrome'}
    else if (browser.opera) {nowBrowser = 'opera'}
    else {nowBrowser = "你这个是啥浏览器呀"}

    $('.barItem').click(function () {
        evdiv = '.'+$(this).attr('id');
        $('.mask-data > div').css({
            display : 'none'
        });
        $(evdiv).css({
            display : 'block'
        });
       barEvn.css({
            display : 'flex'
        });
       if (barEvn.css('display') === 'flex') {
           maskP.style.webkitTransform = "translate(0,0) scale(1)";
       }
    });
    $('.mask-btn,.clickHidden').click(function () {
        maskP.style.webkitTransform="translate(0,-50px) scale(0.93)";
        $('.mask').css({
            display : 'none'
        })
    });
    // SNc = true;
    // if (SNc) {
    //     setTimeout(snBarOp,500);
    // }
};
// function snBarOp() {
//     $('.snBar-item').css({
//         transform : 'translate(0,0)',
//         opacity : '1'
//     });
//     $('#brn').text(nowBrowser);
//     setTimeout(snBarCl,4000);
//     SNc = false;
// }
// function snBarCl() {
//     $('.snBar-item').css({
//         transform : 'translate(40px,0)',
//         opacity : '0'
//     });
//     setTimeout(function () {
//         $('.snBar-item').remove();
//     },1000);
//     SNc = true;
// }
function scrollSidebar(){
    $('.backPageTop').click(function () {
        $('html,body').stop(true,false).animate({scrollTop : '0px'},800);

    });
    $('.toBottom').click(function () {
        $('html,body').stop(true,false).animate({scrollTop : $(document).height()-$(window).height()+'px'},800);
    });
}