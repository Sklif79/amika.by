<?
global $URL;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//PR(array_column($arResult['SECTIONS'],'LIST_PAGE_URL'));


if (!empty($arResult['SECTIONS'])) {
    array_unshift(
        $arResult['SECTIONS'],
        array(
            'NAME' => 'Все',
            'SECTION_PAGE_URL' => '/news/',
            'ACTIVE' => false,
            'SELECTED' => false,
        )
    );

    foreach ($arResult['SECTIONS'] as &$arSection) {
        $arSection['ACTIVE'] = ($URL == $arSection['SECTION_PAGE_URL'] ? 'active' : '');
        $arSection['SELECTED'] = ($URL == $arSection['SECTION_PAGE_URL'] ? 'selected' : '');
    }

}
