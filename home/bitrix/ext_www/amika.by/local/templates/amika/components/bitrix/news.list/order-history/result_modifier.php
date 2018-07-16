<?php
\Bitrix\Main\Loader::includeModule('webcompany.amika');
global $USER;
$order = array('sort' => 'asc');
$tmp = 'sort';
$rsUsers = CUser::GetList($order, $tmp, array('ID' => $USER->GetID()), array('SELECT' => array('UF_*')));
$arUser = $rsUsers->Fetch();
$arData = false;
$NAV_STRING = $arResult['NAV_STRING'];
foreach ($arResult['ITEMS'] as $item) {
    $arData[] = array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'NAME' => $item['NAME'],
        'DATE'=> date('d.m.Y',strtotime($item['TIMESTAMP_X'])),
        'PROP' => array(
            'STATUS_CLASS' => $item['PROPERTIES']['STATUS']['VALUE_XML_ID'],
            'STATUS_NAME' => $item['PROPERTIES']['STATUS']['VALUE'],
            'DATE' => $item['PROPERTIES']['DATE']['VALUE'],
        ),
    );
}

$arResult = false;
$arResult['ITEMS'] = $arData;
$arResult['NAV_STRING'] = $NAV_STRING;
$arResult['USER'] = $arUser;
$arResult['BLOCKED'] = \Webcompany\Amika\Lib::isBlocked($arUser);
unset($arData, $NAV_STRING);