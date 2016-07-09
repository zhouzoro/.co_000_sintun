'use strict';

$(document).ready(function () {
    showScrollTop();
    changeToolBarPosition();
    $(window).scroll(function () {
        showScrollTop();
        changeToolBarPosition();
    });
});

function exitPimgs(pid) {
    var product = $('#' + pid);
    product.find('#pimg-slide').remove();
    product.find('.p-img').show();
    product.removeClass('full-screen');
    $('body').removeClass('full-screen');
}

function showPimgs(pid) {
    $('#loader').show();
    var product = $('#' + pid);
    $.get('/pimgs/' + product.attr('id'), function (res) {
        product.find('.p-img').hide();
        product.append(res);
        $('.carousel').carousel('pause');
        $('#loader').hide();
        product.addClass('full-screen');
        $('body').addClass('full-screen');
    });
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

function showScrollTop() {
    if (!checkVisible($('#top-indicator'))) {
        $('#scroll-top').removeClass("out").addClass("in");
    } else {
        $('#scroll-top').removeClass("in").addClass("out");
    }
}

function changeToolBarPosition() {
    $('.bottom-indicator').each(function () {
        var indi = $(this);
        var ops = $(this).prev('.ops');
        if (checkVisible(ops) && !checkVisible(indi)) {
            ops.addClass('sticky');
        } else {

            ops.removeClass('sticky');
        }
    });
}

function ScrollTop() {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: 0
    }, '400');
}