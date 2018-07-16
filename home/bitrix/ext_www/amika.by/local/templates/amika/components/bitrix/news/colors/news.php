<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="other-page search-page">
    <div class="content-header">
        <div class="container">
            <div class="other-content-header__data">
                <div class="left">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "site",
                        Array(
                            "COMPONENT_TEMPLATE" => "",
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => "s1",
                        )
                    );
                    ?>
                    <h1 class="page-title"><? $APPLICATION->ShowTitle(false) ?></h1>
                </div>
            </div>
        </div>
    </div>
    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "colors",
        Array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array("NAME", "CODE", "ID"),
            "SECTION_ID" => "",
            "SECTION_URL" => "/colors/#SECTION_CODE#/",
            "SECTION_USER_FIELDS" => array("", ""),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "1",
            "VIEW_MODE" => "LINE",
            "URL" => $URL,
        )
    ); ?>
</div>		