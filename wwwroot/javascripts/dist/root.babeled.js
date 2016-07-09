'use strict';

function uploadImg(editorId) {
    var tempImgInput = $('<input>').attr({
        'type': 'file',
        'class': 'temp-input'
    }).css({
        'display': 'none',
        'position': 'absolute'
    }).change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                tinymce.get(editorId).insertContent('<img class="inline-img" src="' + e.target.result + '" width="100%" >');

                tinymce.get(editorId).uploadImages();
                $('.loader').removeClass('loading');
            };
            reader.readAsDataURL(this.files[0]);
            $('.loader').addClass('loading');
        }

        $('.temp-input').remove();
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
}

function login() {
    $('.loader').addClass('loading');
    var form = $('form#login');
    var xhr = new XMLHttpRequest();
    xhr.open(form.attr('method'), form.attr('action'));

    xhr.onload = function () {
        $('.loader').removeClass('loading');
        var res = JSON.parse(xhr.responseText);
        if (res.status == '504') {
            showTipMsg('登录失败: ' + res.msg, 0);
        } else {
            showTipMsg('登录成功: ' + res.msg, 1);
            $('.main').find('.login-page').hide();
            $('.main').find('#control-panel').remove();
            $('.main').append(res.html);

            $('.ui.accordion').accordion();
            $('.ui.menu .item').tab();
            $('.frm-body .input-body').each(function () {
                initMce('#' + $(this).attr('id'));
            });
            $(window).scroll(function () {
                showScrollTop();
                changeToolBarPosition();
            });
            $(window).resize(changeToolBarPosition);
        }
    };
    var formData = new FormData(form[0]);
    xhr.send(formData);
}

function updatePage(formSelector) {
    uploadPost(formSelector);
}

function updatePass() {
    $('.loader').addClass('loading');
    var form = $('#frm-secu');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/update_pass');

    xhr.onload = function () {
        var res = JSON.parse(xhr.responseText);
        if (res.status == '200') {
            window.location = res.url;
        } else if (res.status == '504') {
            $('.loader').removeClass('loading');
            showTipMsg('更新密码失败: ' + res.msg, 0);
        }
    };
    var formData = new FormData(form[0]);
    xhr.send(formData);
}

function replaceImg(el) {
    var btn = $(el);
    var ops = btn.parent('.ops');
    var img = ops.prev('img');
    var tempImgInput = $('<input>').attr({
        'type': 'file',
        'class': 'temp-input'
    }).css({
        'display': 'none',
        'position': 'absolute'
    }).change(function () {
        $('.loader').addClass('loading');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
                if (btn.data('name') == "hb.jpg") {
                    $('header').css('background', 'url("/images/default-bg.jpg")');
                    $('header').css({
                        'background': 'url("' + e.target.result + '")',
                        'background-size': 'cover'
                    });
                }
            };
            reader.readAsDataURL(this.files[0]);

            var fileUploadReq = new XMLHttpRequest();
            fileUploadReq.withCredentials = false;
            fileUploadReq.open('POST', btn.data('url'));

            fileUploadReq.onload = function () {
                $('.loader').removeClass('loading');
                tempImgInput.remove();
            };

            var formData = new FormData();
            formData.append('image', this.files[0], this.files[0].name);
            formData.append('fname', btn.data('name'));
            formData.append('name', $('input[name=name]').val());
            formData.append('password', $('input[name=password]').val());
            fileUploadReq.send(formData);
        }
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
}

function deleteImg(el) {
    $('.loader').addClass('loading');
    var btn = $(el);
    deleteWithId(btn.data(url));
    btn.parent('.img-container').remove();
}

function deleteWithId(url) {

    var form = $('form#login');
    var xhr = new XMLHttpRequest();
    xhr.open(form.attr('method'), url);

    var formData = new FormData(form[0]);
    xhr.send(formData);
}

function uploadPi(el) {
    var btn = $(el);
    var tempImgInput = $('<input>').attr({
        'type': 'file',
        'class': 'temp-input'
    }).css({
        'display': 'none',
        'position': 'absolute'
    }).change(function () {
        $('.loader').addClass('loading');
        if (this.files && this.files[0]) {

            var fileUploadReq = new XMLHttpRequest();
            fileUploadReq.withCredentials = false;
            fileUploadReq.open('POST', '/upload/images/products/' + btn.data('pid'));

            fileUploadReq.onload = function () {
                var json = JSON.parse(fileUploadReq.responseText);
                var newImgContainer = $('<div>').attr('class', 'col-xs-3 col-sm-3 col-md-3 col-lg-3 img-container');
                var img = $('<div>').attr('class', 'img').append($('<img>').attr('src', '/images/products/' + json.pid + '/' + json.fname));
                var ops = $('<div>').attr('class', 'ops').append($('<a>').attr({
                    "class": "red",
                    "href": "#",
                    "data-name": json.fname,
                    "data-id": json.id,
                    "data-url": "/delete_imgs/" + json.id,
                    "onclick": "deleteImg(this)"
                }).text('删除')).append($('<a>').attr({
                    "href": "#",
                    "data-name": json.fname,
                    "data-url": "/upload/images/products/" + json.pid,
                    "onclick": "replaceImg(this)"
                }).text('替换')).append($('<a>').attr({
                    "href": '/images/products/' + json.pid + '/' + json.fname,
                    "download": json.fname
                }).text('下载'));
                $('.rearange.ps').append(newImgContainer.append(img.append(ops)));
                $('.loader').removeClass('loading');
                tempImgInput.remove();
            };

            var formData = new FormData();
            formData.append('image', this.files[0], this.files[0].name);
            formData.append('name', $('input[name=name]').val());
            formData.append('password', $('input[name=password]').val());
            fileUploadReq.send(formData);
        }
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
}

function uploadPost(formSelector) {
    $('.loader').addClass('loading');
    var form = $(formSelector);

    tinymce.activeEditor.uploadImages(function (success) {
        var xhr = new XMLHttpRequest();
        xhr.open(form.attr('method'), form.attr('action'));

        xhr.onload = function () {
            var res = JSON.parse(xhr.responseText);
            if (res.status == '200') {
                if (formSelector === '#frm-product') {
                    $('a.item.pimg-tab').click();
                    $('.loader').removeClass('loading');
                } else {
                    window.location = res.url;
                }
            } else if (res.status == '504') {
                $('.loader').removeClass('loading');
                showTipMsg('上传失败: ' + res.msg, 0);
            }
        };

        var contentHtml = tinymce.activeEditor.save();
        form.find('input[name=content]').val(contentHtml);
        var formData = new FormData(form[0]);
        xhr.send(formData);
    });
}

function openInNewTab(url) {
    console.log(1);
    var $a = $('<a>').attr({
        'href': url,
        'class': 'hidden',
        'target': '__blank'
    });
    $('body').append($a);
    $a.click();
}

function deleteNews(nid) {
    var $item = $('#it' + nid);
    $item.find('*').hide();
    var $a = $('<a>').attr({
        'class': 'revoke-delete',
        'onclick': 'undoDelete("#it' + nid + '")'
    }).append($('<i>').attr('class', 'fa fa-undo')).append('<span>取消</span>');
    $item.append($a).append('<span class="revoke-delete date">已删除</span>');
    window.setTimeout(function () {
        if ($item.find(".revoke-delete")[0]) {
            $item.remove();
            deleteWithId('/delete_news/' + nid);
        }
    }, 2400);
}

function deleteProducts(pid) {
    var $item = $('#pit' + pid);
    $item.find('*').hide();
    var $a = $('<a>').attr({
        'class': 'revoke-delete',
        'onclick': 'undoDelete("#pit' + pid + '")'
    }).append($('<i>').attr('class', 'fa fa-undo')).append('<span>取消</span>');

    $item.append($a).append('<span class="revoke-delete date">已删除</span>');
    window.setTimeout(function () {
        if ($item.find(".revoke-delete")[0]) {
            $item.remove();
            deleteWithId('/delete_products/' + pid);
        }
    }, 2400);
}

function loadToT(url) {
    $('.loader').addClass('loading');
    $.get(url, function (res) {
        $('.ui.tab.active').removeClass('active');
        $('.ui.tab.temp').html(res).addClass('active');
        $('.ui.tab.temp').find('form').each(function () {
            var form = $(this);
            var mce = form.find('.input-body');
            initMce('#' + mce.attr('id'));
        });
    });
}

function undoDelete(item) {
    var $item = $(item);
    $item.find(".revoke-delete").remove();
    $item.find('*').show();
}

function showTipMsg(txt, isok) {
    var color = isok ? 'green' : 'red';
    $('p.tip-message').text(txt).css({
        'background': isok ? 'rgba(55,222,88,0.3)' : 'rgba(222,55,88,0.3)',
        'color': color,
        'border': '1px solid ' + color
    });
}

function initMce(selector) {
    $('.loader').addClass('loading');
    var imgurl = $(selector).data('imgurl');
    if (!imgurl) imgurl = '/upload/images';
    tinymce.init({
        selector: selector,
        skin: 'mxc1',
        language: 'zh_CN',
        content_css: '/stylesheets/dist/travelogue.min.css',
        body_class: 'travelogue',
        plugins: ["autoresize", "advlist", "autolink", "lists", "link", "image", "charmap", "print", "preview", "anchor", "searchreplace", "visualblocks", "code", "fullscreen", "insertdatetime", "media", "table", "paste", "imagetools"],
        toolbar: 'undo redo styleselect fontsizeselect bold italic underline alignleft aligncenter alignright alignfull advlist lists link',
        image_caption: true,
        paste_data_images: true,
        //block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
        fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt',
        //plugins: "contextmenu",
        //contextmenu: "formatselect bold italic link image inserttable | cell row column deletetable",
        menubar: false,
        relative_urls: false,
        images_upload_url: imgurl,
        statusbar: false,
        min_height: 480,
        max_height: 640,

        setup: function setup(ed) {
            ed.on('change', function (e) {
                var contentHtml = ed.save();
                $('input[name=content]').val(contentHtml).change();
            });
            ed.on('init', function (e) {
                $('.loader').removeClass('loading');
            });
        }
    });
}

function newProduct() {
    $.get('/new_product', function (res) {
        var modal = $('.cust-modal');
        modal.html(res.html);
        $('.menu.tab-product .item').tab();
        initMce('#mce-product');
        modal.removeClass('out');
    });
}

function uploadPic() {
    var img = $(this).next('img');
    var loader = $(this).find('#pic-loader');
    var label = $(this).find('label');
    var tempImgInput = $('<input>').attr({
        'type': 'file',
        'class': 'temp-input'
    }).css({
        'display': 'none',
        'position': 'absolute'
    }).change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
            label.removeClass('btn').addClass('pct');
            var updateProgress = function updateProgress(oEvent) {
                var pct = Math.ceil(100 * oEvent.loaded / oEvent.total);
                var height = 100 - pct;
                loader.css({ 'height': height + 'px' });
                label.text(pct + '%');
            };
            var fileUploadReq = new XMLHttpRequest();
            fileUploadReq.withCredentials = false;
            fileUploadReq.open('POST', '/images');

            fileUploadReq.onload = function () {
                var json = JSON.parse(fileUploadReq.responseText);
                console.log(json.location);
                img.attr('src', json.location);
                label.removeClass('pct').addClass('btn').text('change');
                $('.temp-input').remove();
            };
            fileUploadReq.upload.addEventListener("progress", updateProgress, false);
            var formData = new FormData();
            formData.append('image', this.files[0], this.files[0].name);
            fileUploadReq.send(formData);
        }
    });
    $('body').append(tempImgInput);
    tempImgInput.click();
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
        if (!checkVisible(indi)) {
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