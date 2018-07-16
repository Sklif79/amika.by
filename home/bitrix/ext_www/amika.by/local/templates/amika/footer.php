<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/footer.php");
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR . "include/main/mobile_stock_online.php"),
    false
); ?>

</div>
</div>

<footer class="footer">
    <div class="footer__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__copyright">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/amika/images/i/footer-logo.png" alt="">
                        <span class="only-desctop">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/footer/block_1.php"),
                                false
                            ); ?>
								</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer__contacnts">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/footer/block_2.php"),
                            false
                        ); ?>
                        <div class="addres">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/footer/block_3.php"),
                                false
                            ); ?>
                        </div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/footer/block_4.php"),
                            false
                        ); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer__actions">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/footer/block_5.php"),
                            false
                        ); ?>
                    </div>
                </div>

                <div class="mobile-copyright">
                    <div class="footer__copyright">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/footer/block_1.php"),
                            false
                        ); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer__gray">
        <? $APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
                "ROOT_MENU_TYPE" => "bottom",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => "",
                "MAX_MENU" => '8',
            )
        ); ?>
    </div>
</footer>
<?/* $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR . "include/popup/social-fixed.php"),
    false
); */?>
</div>
<div id="new-fancybox-overlay"></div>
<? if (!isset($_COOKIE['modalShowTimer'])) { ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR . "include/popup/fb-form-rosa.php"),
        false
    ); ?>
<? } ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR . "include/popup.php"),
    false
); ?>

</body>
</html>