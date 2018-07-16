<?php

$arITEMS = $arResult['ITEMS'];

$totalCount = 0;
foreach ($arResult['ITEMS'] as &$item) {
    $item['PROPERTIES']['COUNT']['VALUE']=$item['PROPERTIES']['COUNT']['~VALUE'];
    $totalCount += $item['PROPERTIES']['COUNT']['VALUE'];
    $id = $item['IBLOCK_SECTION_ID'];
}


// Получим список статусов
$rsEnum = CUserFieldEnum::GetList(array('ID' => 'ASC'), array("USER_FIELD_NAME" => "UF_STATUS"));
$arEnums = array();
while ($arEnum = $rsEnum->GetNext()) {
    $arEnums[$arEnum['ID']] = $arEnum;
}


$arFilter = Array("IBLOCK_ID" => 15, "ID" => $id);
$res = \CIBlockSection::GetList(Array('left_margin' => 'asc'), $arFilter, false, array('*', 'UF_*'));
$arSection = $res->GetNext();


$status = $arEnums[$arSection['UF_STATUS']];

$arResult = array(
    'NAME' => $arSection['NAME'],
    'ID' => $arSection['ID'],
    'DATE' => date('d.m.Y', strtotime($arSection['TIMESTAMP_X'])),
    'PROP' => array(
        'STATUS' => array(
            'NAME' => $status['VALUE'],
            'CLASS' => $status['XML_ID'],
        ),
        'DATE' => $arSection['UF_DATE'],
        'BILL' => $arSection['UF_BILL'],
        'DELIVERY' => $arSection['UF_DELIVERY'],
        'DISCRIPTION' => $arSection['DESCRIPTION'],
        'ORDER_ID' => $arSection['UF_ORDER_ID'],
    )
);

$arResult['ORDER_ID'] = $arSection['NAME'];

$arResult['TOTAL_COUNT'] = $totalCount;

$arResult['PROP']['DATE'] = $arSection['UF_DATE'];
$arResult['ITEMS'] = $arITEMS;

