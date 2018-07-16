$(document).ready(function () {

    //fancybox помощи при открытом окне
    $(document).on('click', '.js-open-modal-kosty', function () {
        //открытие
        $('#new-fancybox-overlay').addClass('active');

        $('#fb-help').addClass('active');


        //закрытие
        $('#new-fancybox-overlay, .secret-close-btn').on('click',function () {

            $('#new-fancybox-overlay').removeClass('active');

            $('#fb-help').removeClass('active');
        })
    })

    $('#fb-form-unique').parent().css({"min-height":"330px"});

    $(".tel").inputmask({"mask": "+375 (99) 999-99-99"});



    //сокрытие панели склад-онлайн в мобильной версии
    if ( $(window).width() <= 768 ) {
        var strPath = location.href;
        var targetStr = '/personal'

        if ( ~strPath.indexOf(targetStr) ) {
            $('.sclad-mobile').hide();
        }
    }


});