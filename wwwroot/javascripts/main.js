$(document).ready(function() {
  $('.product').click(toggleImgs);
    $('.product').scroll(toggleImgs);
});
function toggleImgs(){

          var container = $(this).parent('.product-container');
        var body = $('body');
          if (body.hasClass('full-screen')) {
              container.removeClass('full-screen');
                  body.removeClass('full-screen');
          } else {
              container.addClass('full-screen');
                  body.addClass('full-screen');
          }
}
function preventScroll(e){
    e.preventDefault();
}
var menuItems=[{title:'关于信豚',href:'/about'},{title:'信豚动态',href:'/news'},{title:'产品展示',href:'/products'},{title:'商业合作',href:'/cooperation'},{title:'招贤纳士',href:'/career'},{title:'联系我们',href:'/contact'}];

function ScrollTop() {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: 0
    }, '500');
}

function showScrollTop() {
    if (!checkVisible($('#top-indicator'))) {
        $('#vertical-nv').removeClass("normal").addClass("pinned");
        $('#scroll-top').removeClass("out").addClass("in");
    } else {
        $('#vertical-nv').removeClass("pinned").addClass("normal");
        $('#scroll-top').removeClass("in").addClass("out");
    }
}

function changeToolBarPosition() {
    var $mceToolbar = $('.mce-toolbar-grp.mce-container.mce-panel.mce-stack-layout-item.mce-first');
    var $editorOps = $('#ops');
    if ($mceToolbar[0]) {
        if (!checkVisible($('.mce-top-indicator'))) {
            $mceToolbar.addClass("pinned");
        } else {
            $mceToolbar.removeClass("pinned");
        }
    }
    if ($editorOps[0]) {
        if (!checkVisible($('footer'))) {
            $editorOps.addClass("pinned");
        } else {
            $editorOps.removeClass("pinned");
        }
    }
}

function checkVisible(elm, evalType) {
    evalType = evalType || 'visible';

    var vpH = $(window).height();
    // Viewport Height
    var st = $(window).scrollTop();

    // Scroll Top
    var y = $(elm).offset().top;
    var elementHeight = $(elm).height();

    if (evalType === 'visible') return y < vpH + st && y > st - elementHeight;
    if (evalType === 'above') return y < vpH + st;
}

function scrollTo(eleId) {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: $(eleId).offset().top
    }, '500');
}
