$(document).ready(function ($) {
// Скрипты доверстанных страниц ##############################
// Слайдер скидки
//     $('.js-sale-slider').owlCarousel({
//         smartSpeed: 875, // плавность смены слайда
//         navText: ['', ''],
//         nav: true,
//         loop: true,
//         margin: 15,
//         autoplay: false,
//         smartSpeed: 1750, // плавность смены слайда
//         navigation: true,
//         singleItem: true,
//         slideSpeed: 1800,
//         responsive: {
//             0: {
//                 items: 1
//             },
//             768: {
//                 mouseDrag: false,
//                 touchDrag: false,
//                 pullDrag: false,
//                 items: 4,
//                 smartSpeed: 1750 // плавность смены слайда
//             }
//         }
//     });

    $(document).one('click', '.js_sale-catalog-btn', function () {
        $('.sale-catalogue__slider').removeClass('sale-slider-view');
    });

    (function () {
        if ($('.js-sale-slider .item').length < 6) {
            $('.js_sale-catalog-btn').hide();
        }
    })();


// Подобрать краску
    $(".aside-help-choise__trigger").click(function () {
        $(".aside-help-choise").toggleClass('open');
    });

// Сетка покрашено масонри
    var $container = $('.js-masonry');
    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.item'
        });
    });

// Миниатюры товара
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });

// Скрипты мобильной версии
    if (document.documentElement.clientWidth < 768) {
        // Табы в производстве
        $(".stage-prod__item__header").click(function () {
            $(this).siblings(".stage-prod__item__content").slideToggle();
            $(this).parent().toggleClass('open');
        });
        // Таб подбора краски
        $(".pick-up-paint__title").click(function () {
            $(".pick-up-paint__row").slideToggle();
            $(this).toggleClass('open');
        });
        // Слайдер карточки товара
        $('.slider-nav').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            vertical: true,
            centerMode: false,
            focusOnSelect: true
        });
    }

// Скрипты основной версии
    if (document.documentElement.clientWidth >= 768) {
        // Миниатюры слайдера карточки товара
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            vertical: true,
            centerMode: false,
            focusOnSelect: true
        });
    }
    ;

// Аккордион лаборатория
//     $('.laboratories__droptabs__card .laboratories__droptabs__content > .laboratories__droptabs__content-item > .droptabs__content-item__header').on('click', function () {
//         var element = $(this).parent('.laboratories__droptabs__content-item');
//         // Слайдер аккордиона
//         if (element.hasClass('open')) {
//             element.removeClass('open');
//             element.find('.laboratories__droptabs__content-item').removeClass('open');
//             element.parent('.laboratories__droptabs__content').parent('.laboratories__droptabs__card').siblings('.laboratories__droptabs__card').find('.laboratories__droptabs__content-item').removeClass('open');
//             element.find('.droptabs__content-item__body').slideUp();
//         }
//         else {
//             element.addClass('open');
//             setTimeout(function () {
//                 $('.js--droptabs-data__slider').owlCarousel({
//                     smartSpeed: 875,
//                     navText: ['', ''],
//                     nav: true,
//                     loop: true,
//                     items: 1,
//                     autoplay: false,
//                     smartSpeed: 1750,
//                     navigation: true,
//                     singleItem: true,
//                     slideSpeed: 1800
//                 });
//             }, 200);
//             element.children('.droptabs__content-item__body').slideDown();
//             element.parent('.laboratories__droptabs__content').parent('.laboratories__droptabs__card').siblings('.laboratories__droptabs__card').find('.laboratories__droptabs__content-item').children('.droptabs__content-item__body').slideUp();
//             element.parent('.laboratories__droptabs__content').parent('.laboratories__droptabs__card').siblings('.laboratories__droptabs__card').find('.laboratories__droptabs__content-item').removeClass('open');
//             element.parent('.laboratories__droptabs__content').parent('.laboratories__droptabs__card').siblings('.laboratories__droptabs__card').find('.droptabs__content-item__body').slideUp();
//             element.siblings('.laboratories__droptabs__content-item').find('.droptabs__content-item__body').slideUp();
//             element.siblings('.laboratories__droptabs__content-item').removeClass('open');
//         }
//     });

    // var dropsDataSlider = $('.js--droptabs-data__slider').owlCarousel({
    //     smartSpeed: 875,
    //     navText: ['',''],
    //     nav: true,
    //     loop: true,
    //     items: 1,
    //     autoplay: false,
    //     smartSpeed:1750,
    //     navigation : true,
    //     singleItem : true,
    //     slideSpeed : 1800
    // });

    (function () {
        var options = {
            slidesToShow: 1,
            slidesToScroll: 1,
            nextArrow: '<div class="droptabs__next"></div>',
            prevArrow: '<div class="droptabs__prev"></div>',
            arrows: true,
            dots: true,
            //variableWidth: true
        };

        $('.js--droptabs-data__slider').slick(options)

        $(document).on('click', '.droptabs__content-item__header', function () {
            var bodyTab = $(this).next('.droptabs__content-item__body');

            bodyTab.slideToggle(0);

            if (bodyTab.is(':visible')) {

                $(".droptabs__content-item__body .js--droptabs-data__slider").slick('destroy');

                $('.droptabs__content-item__body .js--droptabs-data__slider').slick(options)
            }
        });
    })();


// Слайдер производства
    $('.js-production-carousel').owlCarousel({
        smartSpeed: 875,
        navText: ['', ''],
        nav: true,
        loop: true,
        items: 3,
        autoplay: false,
        smartSpeed: 1750,
        navigation: true,
        singleItem: true,
        slideSpeed: 1800
    });


// Скрывает длинное название рекомендуемой новости
    jQuery(".none-more").each(function () {
        var review_full = jQuery(this).html();
        var review = review_full;

        if (review.length > 52) {
            review = review.substring(0, 52);
            jQuery(this).html(review + '...');
        }
    });

});