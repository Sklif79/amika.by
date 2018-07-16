$(document).ready(function ($) {

    function fancyboxShowTimer() {
        $.fancybox.open({
            href: '#fb-form-rosa'
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

    if ($.cookie('modalShowTimer') == undefined) {
        var time = parseInt(TEPLATE_VAR.time_popup_show);
        setTimeout(function () {

            if (!$('.fancybox-opened').length) {
                fancyboxShowTimer();
            }

        }, time);
    }
    $.cookie('modalShowTimer', 'true');
    $('body').on('submit', '.formMailAjax', function () {
            var form = $(this);
            $.post(form.attr('action'), form.serialize(), function (response) {
                if (response.STATUS == 'OK') {
                    form.find('input[type="text"]').val('');
                    form.find('input[type="email"]').val('');
                    form.find('textarea').html('');
                    form.find('textarea').val('');
                }
                form.find('.response').html(response.MESSAGE);
            });
            return false;
        }
    );


    $('body').on('submit', '#catalog-smart-filter', function () {
            var form = $(this);
            $.get(form.attr('action'), form.serialize(), function (data) {
                $('#ajax-container-block-catalog').html(data);
            });
            return false;
        }
    );

    $('body').on('change', '#catalog-smart-filter select', function () {
            $('#catalog-smart-filter').submit();
        }
    );

    $('body').on('click', '.pick-up-paint-tags__delete', function (e) {
        e.preventDefault();
        $.get($(this).attr('href'), {}, function (data) {
            $('#ajax-container-block-catalog').html(data);
        });
    });


    $('body').on('submit', '.formPaswordAjax', function () {
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function (response) {
            if (response.STATUS == 'OK') {
                form.find('input[type="password"]').val('');
                setTimeout(function () {
                    form.find('.response').html('');
                }, 1000);
            }
            form.find('.response').html(response.MESSAGE);
        });
        return false;
    });

    $('body').on('submit', '#search-otk', function (e) {
        e.preventDefault();
        ajaxGetData();
    });

    $('body').on('change', '#search-otk select', function (e) {
        ajaxGetData();
    });

    $('body').on('keyup', '#search-otk input[name="q"]', function (e) {
        ajaxGetData();
    });


    $('body').on('click', '#search-otk input[type="reset"]', function (e) {
        ajaxGetData2();
    });

    $(".fancybox").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });


    $(".border-bottom-solid span").click(function (e) {
        e.preventDefault();
        $(this).replaceWith($('.lab-description .full_text').html());
    });

    $('#shipment-date').datepicker({
       // minDate: new Date(),//если нужно сделать старые даты неактивными
        onSelect: function (dateText) {//метод срабатывает после выбора даты
            var data = {};
            data = {
                'ENTITY': 'ORDER',
                'ACTION': 'STOCK-DATE',
                'DATE': dateText
            };
            $.post('/ajax/', data, function (dt) {
                $('.panel-main tbody').html(dt);
            });
        }
    });

});

function ajaxGetData() {
    $('#stock-list-ajax').css('opacity', 0.5);
    var year = $('#search-otk select[name="year"]').val();
    var q = $('#search-otk input[name="q"]').val();
    $.post(location.pathname, {q: q, year: year, AJAX: 'Y'}, function (data) {
        $('#stock-list-ajax').html(data);
        $('#stock-list-ajax').css('opacity', 1);
    });
}

function ajaxGetData2() {
    $('#stock-list-ajax').css('opacity', 0.5);
    var year = $('#search-otk select[name="year"]').val();
    $.post(location.pathname, {year: year, AJAX: 'Y'}, function (data) {
        $('#stock-list-ajax').html(data);
        $('#stock-list-ajax').css('opacity', 1);
    });
}
