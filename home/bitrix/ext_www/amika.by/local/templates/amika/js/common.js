$(document).ready(function ($) {
// Маски ввода
//     jQuery(function ($) {
//         $(".tel").mask("+375 (99) 999-99-99");
//     });

// Модальные окна форм
    $(".js-open-modal").fancybox({
        wrapCSS: 'fb-modal-win',
        padding: 0,
        helpers: {
            overlay: {
                locked: false
            }
        },
        afterShow: function () {

        }
    });

    $(".js-open-modal-un").fancybox({
        wrapCSS: 'fb-modal-win',
        padding: 0,
        // height: 332,
        height: "auto",
        width: 360,
        autoSize: false,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });

    $(".js-open-modal-big").fancybox({
        wrapCSS: 'fb-modal-win',
        padding: 0,
        // height: 332,
        // width: 360,
        height: "auto",
        autoSize: false,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });

// Зум
    $(".zoom").fancybox({
        wrapCSS: 'fb-modal-win',
        padding: 0,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });


// очистка формы
    (function ($) {
        var input_class = 'zbz-input-clearable',
            input_class_x = input_class + '__x',
            input_class_x_over = input_class + '__x-over',
            input_selector = '.' + input_class,
            input_selector_x = '.' + input_class_x,
            input_selector_x_over = '.' + input_class_x_over,
            event_main = input_class + '-init',
            event_names = [event_main, 'focus drop paste keydown keypress input change'].join(' '),
            btn_width = 13,
            btn_height = 13,
            btn_margin = 7;

        function tog(v) {
            return v ? 'addClass' : 'removeClass';
        }

        $(document).on(event_names, input_selector, function () {
            $(this)[tog(this.value)](input_class_x);
        });

        $(document).on('mousemove', input_selector_x, function (e) {

            var input = $(this),
                input_width = this.offsetWidth,
                input_height = this.offsetHeight,
                input_border_bottom = parseFloat(input.css('borderBottomWidth')),
                input_border_right = parseFloat(input.css('borderRightWidth')),
                input_border_left = parseFloat(input.css('borderLeftWidth')),
                input_border_top = parseFloat(input.css('borderTopWidth')),
                input_border_hr = input_border_left + input_border_right,
                input_border_vr = input_border_top + input_border_bottom,
                client_rect = this.getBoundingClientRect(),
                input_cursor_pos_x = e.clientX - client_rect.left,
                input_cursor_pos_y = e.clientY - client_rect.top,
                is_over_cross = true;

            is_over_cross = is_over_cross && (input_cursor_pos_x >= input_width - input_border_hr - btn_margin - btn_width);
            is_over_cross = is_over_cross && (input_cursor_pos_x <= input_width - input_border_hr - btn_margin);
            is_over_cross = is_over_cross && (input_cursor_pos_y >= (input_height - input_border_vr - btn_height) / 2);
            is_over_cross = is_over_cross && (input_cursor_pos_y <= (input_height - input_border_vr - btn_height) / 2 + btn_height);

            $(this)[tog(is_over_cross)](input_class_x_over);
        });

        $(document).on('click', input_selector_x_over, function () {
            $(this).removeClass([input_class_x, input_class_x_over].join(' ')).val('').trigger('input');
            GalactikaStockList('');
        });

        $(function () {
            $(input_selector).trigger(event_main);
        });

    })(jQuery);


// tooltip

    $(document).ready(function () {
        simple_tooltip(".setting", "tooltip");
    });

// Образаем спойлер
    jQuery(".text-descr").each(function () {
        var review_full = jQuery(this).html();
        var review = review_full;

        if (review.length > 500) {
            review = review.substring(0, 500);
            jQuery(this).html(review + '<div class="read_more boder-dott">Читать далее...</div>');
        }
        jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
    });
    jQuery(".text-descr-small").each(function () {
        var review_full = jQuery(this).html();
        var review = review_full;

        if (review.length > 360) {
            review = review.substring(0, 360);

			var arr = review.split('.');
			arr.pop();
			var arr2 = arr.join('. ') + '.';

            jQuery(this).html(arr2 + '<div class="read_more boder-dott">Читать далее...</div>');
        }
        jQuery(this).append('<div class="full_text" style="display: none;">' + review_full + '</div>');
    });
    jQuery(".read_more").click(function () {
        jQuery(this).parent().html(jQuery(this).parent().find(".full_text").html());
    });

// Главный слайдер
    $('.js-slider').owlCarousel({
        smartSpeed: 875, // плавность смены слайда
        navText: ['', ''],
        nav: true,
        loop: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 15000,
        navigation: true,
        singleItem: true,
        slideSpeed: 1800,
        responsive: {
            0: {
                items: 1
            },
            768: {
                // mouseDrag: false,
                // touchDrag: false,
                // pullDrag: false,
                animateOut: 'fadeOutDown', // Use classes from Animate library
                animateIn: 'fadeInDown', // Use classes from Animate library
                smartSpeed: 1750 // плавность смены слайда
            }
        }
    });

// Скрипты для мобильной версии
    if (document.documentElement.clientWidth < 768) {
        // Новости
        $('.js-news').owlCarousel({
            smartSpeed: 875, // плавность смены слайда
            items: 1,
            navText: ['', ''],
            margin: 0,
            nav: true
        });

        //текст в таблице
        function title() {
            var elem, size, text;
            var elem = document.getElementsByClassName('tit');
            var text = elem.innerHTML;
            var size = 50;
            var n = 50;
            for (var i = 0; i < elem.length; i++) { /* необходимо вставить цикл, чтоб получить все блоки с классом tit */
                if (elem[i].innerHTML.length > size) {
                    text = elem[i].innerHTML.substr(0, n);
                }
                else {
                    text = elem[i].innerHTML;
                }
                elem[i].innerHTML = text + '...';
            }
        }

        // title();
    }
    ;

// Аккордион Страница Вакансии
    $(function () {
        $(".js-accordion").accordion({
            heightStyle: "content"
        });
    });

// Меню по клику
    $(".js-more-click").click(function () {
        $(".more-click__sub").slideToggle();
        $(this).parent().toggleClass('open');
    });
    $(".js-footer-more-click").click(function () {
        $(this).parent().toggleClass('open');
        $(".footer-more-click__sub").slideToggle();
    });

// Телефоны по клику
    $(".js-header__phone").click(function () {
        $(".header__phone-content").slideToggle();
        $(this).parent().toggleClass('open');
    });

// Сертификаты
    $('.js__slider-group__sl').owlCarousel({
        smartSpeed: 875, // плавность смены слайда
        navText: ['', ''],
        nav: true,
        loop: false,
        items: 1,
        autoplay: false,
        smartSpeed: 1750, // плавность смены слайда
        navigation: true,
        singleItem: true,
        slideSpeed: 1800,
    });

// Кастомизация placeholder
    $(document).ready(function () {
        gradientInit();
        setNotificationCountPosition();
        formUiInit();
        asideAccordion();
        closeBtnInit('.response-close-btn', 'response');

        progressBarInit();

        $('.order .action-btns-container').each(function () {
            var btns = $(this).find('.btn');
            if (!btns.length) {
                $(this).hide();
            }
        });
    });

    function progressBarInit() {
        var bars = $('.progressbar-wrap');
        bars.each(function () {
            var value = $(this).data('progressStatus'),
                progressBar = $(this).find('.progressbar-overlay'),
                inWorkPoint = $(this).find('.progress-point-active-in-work'),
                completedPoint = $(this).find('.progress-point-active-completed');

            progressBar.animate({width: 100 - +value + '%'}, 1000);

            setTimeout(function () {
                if (+value >= 50)
                    inWorkPoint.addClass('progress-point-active');

            }, 500);
            setTimeout(function () {
                if (+value == 100)
                    completedPoint.addClass('progress-point-active');
            }, 850);
        });
    }

    function closeBtnInit(btn, parentToHide) {
        $('body').on('click', btn, function () {
            findParent($(this), parentToHide).slideUp();
        });
    }

    function asideAccordion() {
        var els = $('.group-with-categories .group__title-wrap, .user-nav-item-with-subnav > .user-nav-item__title-wrap');
        els.on('click', function () {
            var parent = $(this).parent();
            $(this).toggleClass('user-nav-item__active');
            parent.find('.group__title, .user-nav-item__title').toggleClass('spin-arrow');
            parent.find('.group-categories, .user-subnav-list').slideToggle(500);
        });

        els.click();
    }

    function formUiInit() {
        customPlaceholderInit();
        $('.custom-select').selectric();
        customInputFiles();
    }

    function customPlaceholderInit() {
        var els = $('.custom-placeholder-wrap');
        // els.each(function () {
        //     $(this).on('click', clickHandler);
        //     $(this).find('input, textarea').on('focus', focusHandler);
        // });


        els.each(function () {
            var input = $(this).find('input, textarea');
            if (input.length) {
                input.parent().addClass('custom-placeholder-active');
            }
        });


        textareaDetect();

        function textareaDetect() {
            els.each(function () {
                var textarea = $(this).find('textarea');
                if (textarea.length) {
                    $(this).find('.custom-placeholder').addClass('textarea-custom-placeholder');
                }
            });
        }

        function clickHandler(e) {
            var el = findParent($(e.target), 'custom-placeholder-wrap'),
                input = el.find('input, textarea');
            el.addClass('custom-placeholder-active');
            input
                .focus()
                .focusout(function () {
                    var val = $(this).val().trim();
                    if (!val) {
                        el.removeClass('custom-placeholder-active');
                    }
                });
        }

        function focusHandler(e) {
            var el = findParent($(e.target), 'custom-placeholder-wrap');
            el.addClass('custom-placeholder-active');
            $(e.target).focusout(function () {
                var val = $(this).val().trim();
                if (!val) {
                    el.removeClass('custom-placeholder-active');
                }
            });
        }
    }

    function setNotificationCountPosition() {
        var els = $('.notifications__count');
        els.each(function () {
            var el = $(this),
                width = el.innerWidth();
            if (width < 22) {
                el.css('right', '-60%');
            }
            if (width > 28) {
                el.css('right', '-150%');
            }
            if (width < 28 && width > 22) {
                el.css('right', '-110%');
            }
        });
    }

    function gradientInit() {
        var colors = [
                [76, 175, 80],
                [47, 172, 203],
                [33, 150, 243],
                [76, 175, 80],
                [47, 172, 203],
                [33, 150, 243]
            ],
            step = 0,
            colorIndices = [0, 1, 2, 3],
            gradientSpeed = 0.002;

        function updateGradient() {

            if ($ === undefined) return;

            var c0_0 = colors[colorIndices[0]];
            var c0_1 = colors[colorIndices[1]];
            var c1_0 = colors[colorIndices[2]];
            var c1_1 = colors[colorIndices[3]];

            var istep = 1 - step;
            var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
            var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
            var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
            var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

            var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
            var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
            var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
            var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

            $('.gradient_theme-animated')
                .css({background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"})
                .css({background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"})
                .css({background: "gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"})
                .css({background: "linear-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"});


            step += gradientSpeed;
            if (step >= 1) {
                step %= 1;
                colorIndices[0] = colorIndices[1];
                colorIndices[2] = colorIndices[3];

                colorIndices[1] = ( colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
                colorIndices[3] = ( colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

            }
        }

        setInterval(updateGradient, 10);
    }

    function customInputFiles() {
        document.querySelectorAll('.custom-input-file').forEach(function (item) {
            item.querySelector('input[type=file]').onchange = function (e) {
                var files = this.files,
                    namesContainer = item.querySelector('.custom-input-file__text');
                if (files.length) {
                    namesContainer.innerHTML = '';
                    for (var i = 0; i < files.length; i++) {
                        var fileContainer = document.createElement('span'),
                            fileName = document.createElement('span'),
                            fileSizeContainer = document.createElement('span'),
                            fileSizeMb = (files[i].size / 1000000).toFixed(3);
                        fileContainer.className = 'custom-input-file__item';
                        fileName.className = 'custom-input-file__item-name';
                        fileName.innerText = files[i].name;
                        fileSizeContainer.innerText = fileSizeMb + ' МБ';
                        fileContainer.appendChild(fileName);
                        fileContainer.appendChild(fileSizeContainer);
                        namesContainer.appendChild(fileContainer);
                    }
                }
            };
        });
    }

    function customInputFile() {
        var el = $(".custom-input-file");
        if (el.length) {
            el.each(function () {
                var that = $(this);
                that.find("input[type='file']").change(function () {
                    var file = $(this).val().replace(/\\/g, "/").split("/").pop();
                    var textField = that.find(".custom-input-file__text");
                    if (textField.attr("value")) {
                        textField.val(file);
                    } else {
                        textField.text(file);
                    }
                });
            });
        }
    }


// Мобильное меню
    $(".js-menu-trigger").click(function () {
        $(".bd-site").toggleClass('aside-open');
    });
    $(".js-back").click(function () {
        $(".bd-site").toggleClass('aside-open');
    });
// Фокус
    $('.search .search__txt').focus(function (event) {
        $(this).parent().addClass('focus');
    });
    $('.search .search__txt').blur(function (event) {
        $(this).parent().removeClass('focus');
    });
    // Класс при скроле
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0) {
            $('.header').addClass('header_fixed_top');
        }
        else {
            $('.header').removeClass('header_fixed_top');
        }
    });
//валидатор формы попап

    var myLanguage = {
        errorTitle: "Ошибка отправки формы!",
        requiredField: "Это обязательное поле",
        requiredFields: "Вы задали не все обязательные поля",
        badTime: "Вы задали некорректное время",
        badEmail: "Вы задали некорректный e-mail",
        badTelephone: "Вы задали некорректный номер телефона",
        badSecurityAnswer: "Вы задали некорректный ответ на секретный вопрос",
        badDate: "Вы задали некорректную дату",
        lengthBadStart: "Значение должно быть в диапазоне",
        lengthBadEnd: " символов",
        lengthTooLongStart: "Значение длинее, чем ",
        lengthTooShortStart: "Значение меньше, чем ",
        notConfirmed: "Введённые значения не могут быть подтверждены",
        badDomain: "Некорректное значение домена",
        badUrl: "Некорретный URL",
        badCustomVal: "Введённое значение неверно",
        andSpaces: " и пробелы ",
        badInt: "Значение - не число",
        badSecurityNumber: "Введённый защитный номер - неправильный",
        badUKVatAnswer: "Некорректный UK VAT номер",
        badStrength: "Пароль не достаточно надёжен",
        badNumberOfSelectedOptionsStart: "Вы должны выбрать как минимум ",
        badNumberOfSelectedOptionsEnd: " ответов",
        badAlphaNumeric: "Значение должно содержать только числа и буквы ",
        badAlphaNumericExtra: " и ",
        wrongFileSize: "Загружаемый файл слишком велик (максимальный размер %s)",
        wrongFileType: "Принимаются файлы следующих типов %s",
        groupCheckedRangeStart: "Выберите между ",
        groupCheckedTooFewStart: "Выберите как минимум ",
        groupCheckedTooManyStart: "Выберите максимум из ",
        groupCheckedEnd: " элемент(ов)",
        badCreditCard: "Номер кредитной карты некорректен",
        badCVV: "CVV номер некорректно",
        wrongFileDim: "Неверные размеры графического файла,",
        imageTooTall: "изображение не может быть уже чем",
        imageTooWide: "изображение не может быть шире чем",
        imageTooSmall: "изображение слишком мало",
        min: "минимум",
        max: "максимум",
        imageRatioNotAccepted: "Изображение с таким соотношением сторон не принимается",
        badBrazilTelephoneAnswer: "Введённый номер телефона неправильный",
        badBrazilCEPAnswer: "CEP неправильный",
        badBrazilCPFAnswer: "CPF неправильный"
    };

    $.validate({
        modules: 'security',
        language: myLanguage
    });

// Таблица респонсив
    $(".responsive").rtResponsiveTables({
        containerBreakPoint: 600
    });
    ;

// Будем дружить
    $(".social-fixed-trigger").click(function () {
        $(".social-fixed").toggleClass('open');
        $(this).toggleClass('close');
    });
    $(".social-fixed__title").click(function () {
        $(".social-fixed").toggleClass('open');
        $('.social-fixed-trigger').toggleClass('close');
    });

});

// Табы в контактах
function getval(sel) {
    var el = sel.value;
    $('.contact-tabs div').css('display', 'none');
    $('.contact-tabs #div' + el).css('display', 'block');
}

function findParent(el, class_) {
    var parent = el.parent();
    if (parent.hasClass(class_)) {
        return parent;
    }
    else {
        return findParent(parent, class_);
    }
}

function simple_tooltip(target_items, name) {
    $(target_items).each(function (i) {
        $("body").append("<div class='" + name + "' id='" + name + i + "'><p>" + $(this).attr('title') + "</p></div>");
        var my_tooltip = $("#" + name + i);

        $(this).removeAttr("title").mouseover(function () {
            my_tooltip.css({opacity: 1, display: "none"}).fadeIn(400);
        }).mousemove(function (kmouse) {
            my_tooltip.css({left: kmouse.pageX - 70, top: kmouse.pageY - 45});
        }).mouseout(function () {
            my_tooltip.fadeOut(400);
        });
    });
}