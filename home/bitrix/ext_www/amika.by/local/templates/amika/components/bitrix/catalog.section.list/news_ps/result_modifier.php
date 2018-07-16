<?
global $URL;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//PR(array_column($arResult['SECTIONS'],'LIST_PAGE_URL'));
$arCode=explode('/',$URL);
$arCode=array_values(array_diff($arCode,array('')));
$code=$arCode[1];

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
        $arSection['ACTIVE'] = ($code == $arSection['CODE'] ? 'active' : '');
        $arSection['SELECTED'] = ($code == $arSection['CODE'] ? 'selected' : '');
    }

}
