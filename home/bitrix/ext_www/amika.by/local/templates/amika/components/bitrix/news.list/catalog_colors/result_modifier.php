<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

if ($arParams["TEMPLATE_THEME"] == "")
    $arParams["TEMPLATE_THEME"] = "blue";

$arResult["NAV_PARAM"]["TEMPLATE_THEME"] = $arParams["TEMPLATE_THEME"];

$arResult["NAV_STRING"] = $arResult["NAV_RESULT"]->GetPageNavStringEx(
    $navComponentObject,
    $arParams["PAGER_TITLE"],
    $arParams["PAGER_TEMPLATE"],
    $arParams["PAGER_SHOW_ALWAYS"],
    $this->__component,
    $arResult["NAV_PARAM"]
);


$arImgOption = array(
    array(
        'width' => 263,
        'height' => 146,
    ),
    array(
        'width' => 263,
        'height' => 177,
    ),

    array(
        'width' => 263,
        'height' => 177,
    ),
    array(
        'width' => 263,
        'height' => 146,
    ),

    array(
        'width' => 263,
        'height' => 146,
    ),
    array(
        'width' => 263,
        'height' => 177,
    ),

    array(
        'width' => 263,
        'height' => 177,
    ),
    array(
        'width' => 263,
        'height' => 146,
    ),
);

foreach ($arResult['ITEMS'] as $k => &$arItem) {

    $name = '';
    $DETAIL_PAGE_URL = '';
    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE'],
        array(
            'width' => $arImgOption[$k]['width'],
            'height' => $arImgOption[$k]['height']
        ),
        BX_RESIZE_IMAGE_EXACT,
        true
    );
    $useElm = array_shift($arItem['DISPLAY_PROPERTIES']['ELEMENT']['LINK_ELEMENT_VALUE']);
    $arItem = array(
        'IBLOCK_SECTION_ID' => $arItem['IBLOCK_SECTION_ID'],
        'ORG' => $arItem['PREVIEW_PICTURE']['SRC'],
        'IMG' => $img['src'],
        'DIV_CLASS' => $arClassBlock[$k],
        'NAME' => $useElm['NAME'],
        'DETAIL_PAGE_URL' => $useElm['DETAIL_PAGE_URL'],
    );
}

$arResult['SECTION_CODE'] = getCodeByID($arItem['IBLOCK_SECTION_ID'], $arParams['IBLOCK_ID']);
