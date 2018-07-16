<?php
$arItems = json_decode($arResult['~DETAIL_TEXT'], true);
$totalCount = 0;
foreach ($arItems as $val) {
    $totalCount += $val['COUNT'];
}
$arResult = array(
    'NAME' => $arResult['NAME'],
    'ID' => $arResult['ID'],
    'DATE' => date('d.m.Y', strtotime($arResult['TIMESTAMP_X'])),
    'PROP' => array(
        'STATUS' => array(
            'NAME' => $arResult['PROPERTIES']['STATUS']['VALUE'],
            'CLASS' => $arResult['PROPERTIES']['STATUS']['VALUE_XML_ID'],
        ),
        'DATE' => $arResult['PROPERTIES']['DATE']['VALUE'],
        'BILL' => $arResult['PROPERTIES']['BILL']['VALUE'],
        'DELIVERY' => $arResult['PROPERTIES']['DELIVERY']['VALUE'],
        'DISCRIPTION' => $arResult['PROPERTIES']['DISCRIPTION']['VALUE']['TEXT'],
        'ORDER_ID' => $arResult['PROPERTIES']['ORDER_ID']['VALUE'],
    )
);
$arResult['ITEMS'] = $arItems;
$arResult['ORDER_ID'] = $arResult['NAME'];
$arResult['TOTAL_COUNT'] = $totalCount;

$arResult['PROP']['DATE']=date('d.m.Y');