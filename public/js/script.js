$(function () {
    // サインインモーダル
    $('.sign_in').click(function () {
        $('open-modal').css('display', 'block');
        $('#sign_in_box').animate({
            'margin-top': '0',
            'opacity': '1'
        }, 500);
    }) 
    $('#overlay').click(function () {
        $('open-modal').css('display', 'none');
        $('#sign_in_box').css({ 'margin-top': '50vh', 'opacity': '0' });
    })
    $('#sign_in_box').click(function (e) {
        e.stopPropagation();
    })

    // ナビ固定
    $(window).scroll(function () {
        const alertHeight = $('.top-notice').innerHeight();
        const scrollTop = $(window).scrollTop();
        if (scrollTop >= alertHeight) {
            $('#move').addClass('motion');
        } else {
            $('#move').removeClass('motion');
        }
        // jumpボタン
        if (scrollTop >= 500) {
            $('.jump').removeClass('hidden');
        } else {
            $('.jump').addClass('hidden');
        }
    })
    $('.jump').click(function () {
        $('body, html').animate({ scrollTop: 0 }, "slow");
    })

    //ヘッダーボタン
    $('a[href="#cafe_intro"]').click(function () {
        var href = $(this).attr("href");
        var target = $(href);
        var position = target.offset().top;
        $('body, html').stop().animate({ scrollTop: position }, "slow");
    })
    $('a[href="#cafe_exp"]').click(function () {
        var href = $(this).attr("href");
        var target = $(href);
        var position = target.offset().top;
        $("body, html").stop().animate({ scrollTop: position }, "slow");
    })

});