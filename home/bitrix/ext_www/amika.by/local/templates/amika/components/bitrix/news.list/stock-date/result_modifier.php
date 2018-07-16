<?php

use Webcompany\Amika\UploadCsv;
use Webcompany\Amika\Iblock;

$activeKEY = array();
if (is_array($arParams['ID']) and !empty($arParams['ID'])) {
    $arActiveId = array_keys($arParams['ID']);
    $arActiveEL = Iblock::GetList(
        array('ID' => 'ASC'),
        array('ID' => $arActiveId),
        array('ID', 'CODE', 'NAME', 'IBLOCK_ID'),
        'LINK',
        'PROP'
    );
    $activeKEY = array_keys($arActiveEL);
}

\Bitrix\Main\Loader::includeModule('webcompany.amika');
$obUploadCsv = new UploadCsv;
$date = $obUploadCsv->GetStatFileMTime();

$arData = false;
$LIST_PAGE_URL = $arResult['ITEMS'][0]['LIST_PAGE_URL'];
$NAV_STRING = $arResult['NAV_STRING'];
foreach ($arResult['ITEMS'] as $item) {
    $red = '';
    $link = $item['PROPERTIES']['LINK']['VALUE'];
    if (!empty($activeKEY)) {
        if (in_array($link, $activeKEY)) {
            $red = 'red';
        }
    }
    $arData[] = array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'RED' => $red,
        'NAME' => $item['NAME'],
        'CODE' => $item['CODE'],
        'PROP' => array(
            'LINK' => $link,
            'COUNT' => $item['PROPERTIES']['COUNT']['VALUE'],
        ),
    );
}
$arResult = false;
$arResult['ITEMS'] = $arData;
$arResult['NAV_STRING'] = $NAV_STRING;
$arResult['LIST_PAGE_URL'] = $LIST_PAGE_URL;
unset($arData, $LIST_PAGE_URL, $NAV_STRING);

$arResult['GetStatFileMTime'] = date('d.m.Y , h:i', $date);