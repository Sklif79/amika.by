<?php

use Webcompany\Amika\Lib;

\Bitrix\Main\Loader::includeModule('webcompany.amika');

$arData = false;
$LIST_PAGE_URL = $arResult['ITEMS'][0]['LIST_PAGE_URL'];
$NAV_STRING = $arResult['NAV_STRING'];
$countAll = 0;
foreach ($arResult['ITEMS'] as $item) {
    $count = $arParams['ID'][$item['ID']];
    $countAll += $count;
    $arData[] = array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'NAME' => $item['NAME'],
        'COUNT' => $count,
        'PROP' => array(
            'LINK' => $item['PROPERTIES']['LINK']['VALUE'],
            'AVAILABILITY' => $item['PROPERTIES']['AVAILABILITY']['VALUE'],
        ),
    );
}

$orderID = Lib::GetOrderCode();
$arResult = false;
$arResult['ITEMS'] = $arData;
$arResult['ORDER_ID'] = $orderID;
$arResult['DATE'] = date('d.m.Y');
$arResult['COUNT_ALL'] = $countAll;
$arResult['NAV_STRING'] = $NAV_STRING;
$arResult['LIST_PAGE_URL'] = $LIST_PAGE_URL;
unset($arData, $LIST_PAGE_URL, $NAV_STRING);

$arResult['GetStatFileMTime'] = date('d.m.Y , h:i', $date);