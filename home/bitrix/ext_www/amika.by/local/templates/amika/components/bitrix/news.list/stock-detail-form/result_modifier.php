<?php

use Webcompany\Amika\UploadCsv;

\Bitrix\Main\Loader::includeModule('webcompany.amika');
$obUploadCsv = new UploadCsv;
$date = $obUploadCsv->GetStatFileMTime();

$arData = false;
$LIST_PAGE_URL = $arResult['ITEMS'][0]['LIST_PAGE_URL'];
$NAV_STRING = $arResult['NAV_STRING'];
foreach ($arResult['ITEMS'] as $item) {
    if ($arParams['AVAILABILITY'] == true and !$item['PROPERTIES']['AVAILABILITY']['VALUE']) {
        continue;
    }
    $arData[] = array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'NAME' => $item['NAME'],
        'PROP' => array(
            'LINK' => $item['PROPERTIES']['LINK']['VALUE'],
            'AVAILABILITY' => $item['PROPERTIES']['AVAILABILITY']['VALUE'],
        ),
    );
    $HEAD = $item['PROPERTIES']['NAME']['VALUE'];
}
$arResult = false;
$arResult['ITEMS'] = $arData;
$arResult['HEAD'] = $HEAD;
$arResult['NAV_STRING'] = $NAV_STRING;
$arResult['LIST_PAGE_URL'] = $LIST_PAGE_URL;
unset($arData, $LIST_PAGE_URL, $NAV_STRING);

$arResult['GetStatFileMTime'] = date('d.m.Y , h:i', $date);