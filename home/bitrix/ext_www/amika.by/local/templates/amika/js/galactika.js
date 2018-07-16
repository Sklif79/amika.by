$(document).ready(function ($) {
    $('body').on('click', '.stock-detail-ajax', function () {
        $('#fb-modal-1 .g-modal-win__content').html('Загрузка...');
        GalactikaStockShow($(this).data('link'), $(this).data('availablity'));
    });

    $('body').on('submit', '#basket-stock-form-ajax', function (event) {
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function (data) {
            $('.fancybox-close').trigger('click');
            $('#fb-modal-1 .g-modal-win__content').html(data);
            GalactikaRefresh();
        });
        return false;
    });

    $('body').on('change', '.counter-input', function () {
        var count = 0;
        $('.counter-input').each(function (indx, element) {
            count += parseInt($(this).val());
        });
        $('#total-count-massa').html(count + ' кг');
    });

    $('body').on('submit', '#stock-order-form-ajax', function (event) {
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function (data) {
            var data3 = '<div>' + data + '</div>';
            if ($(data3).find('#FormClose').val() == 'Y') {
                $('#fb-modal-appruved').html(data);
                GalactikaSuccess();
                GalactikaRefresh();
            } else {
                if ($(data3).find('#FormClosePopup').val() == 'Y') {
                    $('.fancybox-close').trigger('click');
                    GalactikaRefresh();
                } else {
                    $('#fb-modal-2 .g-modal-win__content').html(data);
                    GalactikaRefresh();
                    GalactikaInitDatepicker();
                }
            }

        });
        return false;
    });

    $('body').on('click', '.order-click', function () {
        $('#INPUT-ACTION-FORM').val($(this).val());
    });


    $('body').on('click', '.stock-order-ajax', function () {
        $('#fb-modal-2 .g-modal-win__content').html('Загрузка...');
        GalactikaOrderShow($(this).data('link'));
    });

    $('body').on('keyup', '#search-stock-form', function () {
        var val = $(this).val();
        GalactikaStockList(val);
    });


    $('body').on('click', '.ajax-order-detail', function () {
        var id = $(this).data('id');
        GalactikaDetail(id);
    });

    $('body').on('click', '.ajax-repeat-order', function () {
        var id = $(this).data('id');
        GalactikaRepeat(id);
    })

});

function GalactikaStockList(q) {
    $.get(location.href, {RESTART: 'Y', q: q}, function (data) {
        $('#stock-list-ajax').html(data);
    });
}

function GalactikaBasketItemDelete(id) {
    ActionGalactika(
        {
            'ENTITY': 'BASKET',
            'ACTION': 'DELETE',
            'ID': id
        }, function (data) {
            $('#fb-modal-2 .g-modal-win__content').html(data);
            GalactikaRefresh();
            GalactikaInitDatepicker();
        }
    );
}

function GalactikaOrderShow() {
    ActionGalactika(
        {
            'ENTITY': 'ORDER',
            'ACTION': 'SHOW-FORM'
        }, function (data) {
            $('#fb-modal-2 .g-modal-win__content').html(data);
            $.fancybox.open({
                href: '#fb-modal-2'
            }, {
                wrapCSS: 'fb-modal-win rosa-overlay',
                padding: 0,
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
            GalactikaInitDatepicker();
        }
    );
}


function GalactikaInitDatepicker() {
    $(".datepicker").datepicker({
        monthsFull: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthsShort: ['Янв', 'Февр', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
        weekdaysFull: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
        weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],

        format: 'dd mmmm, yyyy',
        minDate: 0,
        firstDay: 1
    });
}

function GalactikaStockShow(link, availablity) {
    ActionGalactika(
        {
            'ENTITY': 'STOCK',
            'ACTION': 'SHOW-DETAIL',
            'LINK': link,
            'AVAILABILITY': availablity
        }, function (data) {
            $('#fb-modal-1 .g-modal-win__content').html(data);
            $.fancybox.open({
                href: '#fb-modal-1'
            }, {
                wrapCSS: 'fb-modal-win rosa-overlay',
                padding: 0,
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
        }
    );
}

function GalactikaUpload() {
    ActionGalactika(
        {
            'ENTITY': 'UPLOAD-CSV',
            'ACTION': 'UPLOAD',
            'DEBUG': 'Y'
        }, false
    );
}

function ActionGalactika(data, func) {
    $.get('/ajax/', data, func);
}


function GalactikaRefresh() {
    var search = $('#search-stock-form').val();
    if ($('#search-stock-form').length) {
        $.post(location.href, {RESTART: 'Y', q: search}, function (data) {
            $('#stock-list-ajax').html(data);
        });
    } else {
        $.post(location.href, {RESTART: 'Y'}, function (data) {
            $('#stock-list-ajax').html(data);
        });
    }

    if ($('#order-list-ajax').length) {
        GalactikaRefreshOrder();
    }
}


function GalactikaRefreshOrder() {
    $.get(location.href, {RESTART: 'Y'}, function (data) {
        $('#order-list-ajax').html(data);
    });
}


function GalactikaDetail(id) {
    ActionGalactika(
        {
            'ENTITY': 'ORDER',
            'ACTION': 'SHOW-DETAIL',
            'ID': id
        }, function (data) {
            $('#fb-modal-3 .g-modal-win__content').html(data);
            GalactikaInitDatepicker();
            $.fancybox.open({
                href: '#fb-modal-3'
            }, {
                wrapCSS: 'fb-modal-win rosa-overlay',
                padding: 0,
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
        }
    );
}

function GalactikaRepeat(id) {
    ActionGalactika(
        {
            'ENTITY': 'ORDER',
            'ACTION': 'REPEAT',
            'ID': id
        }, function (data) {
            window.location.href = '/personal/new-order/';
            $('#fb-modal-3 .g-modal-win__content').html(data);
        }
    );
}

function GalactikaSuccess() {
    $.fancybox.open({
        href: '#fb-modal-appruved'
    }, {
        wrapCSS: 'fb-modal-win rosa-overlay',
        padding: 0,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });
}

function GalactikaOrderItemDelete(id) {
    $('#order-item-' + id).remove();
}