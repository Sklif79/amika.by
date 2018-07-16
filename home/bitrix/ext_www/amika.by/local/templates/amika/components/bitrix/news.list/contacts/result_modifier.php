<?php
$arData = false;
$START_ID = false;
$LIST_PAGE_URL = $arResult['ITEMS'][0]['LIST_PAGE_URL'];
$i = 0;
foreach ($arResult['ITEMS'] as $item) {
    $MAP_YA = explode(',', $item['PROPERTIES']['MAP_YA']['VALUE']);
    $arData[] = array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'EDIT_LINK' => $item['EDIT_LINK'],
        'DELETE_LINK' => $item['DELETE_LINK'],
        'NAME' => $item['NAME'],
        'PREVIEW_TEXT' => $item['PREVIEW_TEXT'],
        'PROP' => array(
            'LAT' => $MAP_YA[0],
            'LONG' => $MAP_YA[1],
        ),
    );
    if ($i == 0) {
        $START_ID = $item['ID'];
    }
    $i++;
}
$arResult = false;
$arResult['ITEMS'] = $arData;
$arResult['START_ID'] = $START_ID;
unset($arData);