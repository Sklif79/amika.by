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

$arClassBlock = array(
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w25',
    'then-colored__card__col--w50',
    'then-colored__card__col--w50',
);

$arImgOption = array(
    array(
        'width' => 275,
        'height' => 185,
    ),
    array(
        'width' => 275,
        'height' => 185,
    ),
    array(
        'width' => 275,
        'height' => 351,
    ),

    array(
        'width' => 275,
        'height' => 185,
    ),
    array(
        'width' => 275,
        'height' => 153,
    ),
    array(
        'width' => 275,
        'height' => 153,
    ),

    array(
        'width' => 275,
        'height' => 153,
    ),
    array(
        'width' => 563,
        'height' => 185,
    ),
    array(
        'width' => 563,
        'height' => 185,
    ),
);

foreach ($arResult['ITEMS'] as $k => &$arItem) {
    $name = '';
    $DETAIL_PAGE_URL = '';
    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE'],
        array(
            'width' => $arImgOption[$k%9]['width'],
            'height' => $arImgOption[$k%9]['height']
        ),
        BX_RESIZE_IMAGE_EXACT,
        true
    );
    $useElm=array_shift($arItem['DISPLAY_PROPERTIES']['ELEMENT']['LINK_ELEMENT_VALUE']);
    $arItem = array(
        'ORG' => $arItem['PREVIEW_PICTURE']['SRC'],
        'IMG' => $img['src'],
        'DIV_CLASS' => $arClassBlock[$k%9],
        'NAME' => $useElm['NAME'],
        'DETAIL_PAGE_URL' => $useElm['DETAIL_PAGE_URL'],
    );
}