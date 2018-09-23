$(document).ready(function () {


    //fancybox помощи при открытом окне
    $(document).on('click', '.js-open-modal-kosty', function () {
        //открытие
        $('#new-fancybox-overlay').addClass('active');

        $('#fb-help').addClass('active');


        //закрытие
        $('#new-fancybox-overlay, .secret-close-btn').on('click', function () {

            $('#new-fancybox-overlay').removeClass('active');

            $('#fb-help').removeClass('active');
        })
    });

    $('#fb-form-unique').parent().css({"min-height": "330px"});

    /* $(".tel").inputmask({"mask": "+375 (99) 999-99-99"});*/


    //сокрытие панели склад-онлайн в мобильной версии
    if ($(window).width() <= 768) {
        var strPath = location.href;
        var targetStr = '/personal';

        if (~strPath.indexOf(targetStr)) {
            $('.sclad-mobile').hide();
        }
    }
});


$(document).ready(function () {
    /*Маска ввода телефона. Добавил Rising13*/
    var maskList = $.masksSort($.masksLoad("/local/templates/amika/js/inputmask-multi/data/phone-codes.json"),
        ['#'], /[0-9]|#/, "mask");
    var maskOpts = {
        inputmask: {
            definitions: {
                '#': {
                    validator: "[0-9]",
                    cardinality: 1
                }
            },
            //clearIncomplete: true,
            showMaskOnHover: false,
            autoUnmask: true,
            clearMaskOnLostFocus: false
        },
        match: /[0-9]/,
        replace: '#',
        list: maskList,
        listKey: "mask",
        onMaskChange: function (maskObj, completed) {
            /* if (completed) {
             var hint = maskObj.name_ru;
             if (maskObj.desc_ru && maskObj.desc_ru != "") {
             hint += " (" + maskObj.desc_ru + ")";
             }
             $("#descr").html(hint);
             } else {
             $("#descr").html("Маска ввода");
             }*/
            $(this).attr("placeholder", $(this).inputmask("getemptymask"));
        }
    };
    $('.tel').inputmasks(maskOpts);

    //кастомный select
    $('.order-search__year select').select2({
        minimumResultsForSearch: Infinity
    });

    //кнопка reset для формы паспорт отк
    $('.passport-search .search__txt').on('input', function () {

        if ($(this).val()) {
            $(this).next('.reset-btn').addClass('active');
        } else {
            $(this).next('.reset-btn').removeClass('active');
        }

    });

    $('.reset-btn').on('click', function () {
        $(this).removeClass('active');
    })

    //враппер картинок для области применения
    $('.single-goods__second-level__option .option-data-pic').wrapAll('<div class="option-wrap" />');


    $('.tabs-wrap').customTabs();

    jScrollInit();


    $(document).on('click', '.order-detail-item__header', function () {
        var $container = $(this).closest('.order-detail-item').find('.order-detail-item__container'),
        self = $(this);

        $(this).toggleClass('active').closest('.order-detail-item').find('.order-detail-item__container').slideToggle(
            200, "linear", function() {
                jScrollInit();

                if (self.hasClass('active')) {
                    $container.css('opacity', 1);
                } else {
                    $container.css('opacity', 0);
                }
            }
        );

    })
});

function jScrollInit() {
    $('.js_scroll-mobile').each(
        function () {
            $(this).jScrollPane();


            var api = $(this).data('jsp');
            var throttleTimeout;
            $(window).bind(
                'resize',
                function () {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(
                            function () {
                                api.reinitialise();
                                throttleTimeout = null;
                            },
                            50
                        );
                    }
                }
            );
        }
    )
}


/**
 *set datapicker date for id="shipment-date"
 * @returns {string} format dd.mm.yyyy"
 */
function getShimpentDate() {
    return $.datepicker.formatDate("dd.mm.yy", $('#shipment-date').datepicker("getDate"));
}


/**
 * jQuery Tabs plugin
 *
 */
(function ($) {
    var defaults = {
            tabClass: "tab", //класс для табов
            tabContainerClass: "tabs-wrap", //контейнер таба
            panelClass: "panel" //контейнер таба
        },

        //флаг активности мобилной версии
        mobileEnabled = false,

        //текущий элемент
        $el,
        options;

    // наши публичные методы
    methods = {
        // инициализация плагина
        init: function (params) {
            options = $.extend({}, defaults, params);

            return this.each(function () {
                $el = $(this);

                $(window).bind('resize.customTabs', methods.markup);
                $(document).bind('ready.customTabs', methods.markup);
            });
        },

        // изменение ширины экрана
        markup: function () {
            var $tab = $el.find('.' + options.tabClass);

            if ($(window).width() <= 640 && !mobileEnabled) {
                mobileEnabled = true;

                $tab.unbind('click', methods.desktopModel);
                $tab.bind('click', methods.mobileModel);

                methods.mobileView();

            } else if ($(window).width() > 640 && mobileEnabled) {
                mobileEnabled = false;
                methods.reset();

                $tab.unbind('click', methods.mobileModel);
                $tab.bind('click', methods.desktopModel);
                methods.desktopView();

            } else if ($(window).width() > 640 && !mobileEnabled) {
                $tab.bind('click', methods.desktopModel);
            }
        },

        desktopModel: function () {
            $(this).closest('.' + options.tabContainerClass).find('.' + options.tabClass + ', .' + options.panelClass).removeClass('active');
            $(this).addClass('active').closest('.' + options.tabContainerClass)
                .find('div[data-id="' + $(this).data('id') + '"]').addClass('active');
        },

        mobileModel: function () {
            $(this).toggleClass('active').next().stop().slideToggle();
        },

        desktopView: function () {
            var panelsArr = $el.find('.' + options.panelClass),
                i, id;

            for (i = 0; i < panelsArr.length; i++) {
                id = $(panelsArr[i]).data("id");

                $el.find('.panels').append($(panelsArr[i]));
                $el.css('opacity', '1');
            }
        },

        mobileView: function () {
            var panelsArr = $el.find('.' + options.panelClass),
                i, id;

            for (i = 0; i < panelsArr.length; i++) {
                id = $(panelsArr[i]).data("id");

                $el.find('.' + options.tabClass + '[data-id=' + id + ']').after($(panelsArr[i]));
                $el.css('opacity', '1');
            }
        },

        reset: function () {
            $el.find('.' + options.tabClass).removeClass('active');
            $el.find('.' + options.tabClass).first().addClass('active');

            $el.find('.' + options.panelClass).removeClass('active').css('display', '');
            $el.find('.' + options.panelClass).first().addClass('active').css('display', '');
        }
    };


    $.fn.customTabs = function (method) {
        // логика вызова метода
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Метод с именем ' + method + ' не существует для jQuery.customTabs');
        }
    };

})(jQuery);
