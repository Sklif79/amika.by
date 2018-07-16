<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('webcompany.amika');
global $USER;
$order = array('sort' => 'asc');
$tmp = 'sort';
$rsUsers = CUser::GetList($order, $tmp, array('ID' => $USER->GetID()), array('SELECT' => array('UF_*')));
$arUser = $rsUsers->Fetch();
$arData = false;
$NAV_STRING = $arResult['NAV_STRING'];

// Получим список статусов

$rsEnum = CUserFieldEnum::GetList(array('ID' => 'ASC'), array("USER_FIELD_NAME" => "UF_STATUS"));
$arEnums = array();

while ($arEnum = $rsEnum->GetNext()) {
    $arEnums[$arEnum['ID']] = $arEnum;
}

$arData = array();
foreach ($arResult['SECTIONS'] as $item) {
    if ($item['DEPTH_LEVEL'] == 2) {
        $status = $arEnums[$item['UF_STATUS']];
        $arData[] = array(
            'ID' => $item['ID'],
            'IBLOCK_ID' => $item['IBLOCK_ID'],
            'NAME' => $item['NAME'],
            'STATUS' => $status['XML_ID'],
            'DATE' => date('d.m.Y', strtotime($item['DATE_CREATE'])),
            'STR' => strtotime($item['DATE_CREATE']),
            'PROP' => array(
                'STATUS_CLASS' => $status['XML_ID'],
                'STATUS_NAME' => $status['VALUE'],
                'DATE' => $item['UF_DATE'],
            ),
        );
    }
}

$arResult = false;

array_multisort(array_column($arData, 'STATUS'), SORT_DESC, array_column($arData, 'STR'), SORT_DESC, $arData);

if ($arParams['NEWS_COUNT']) {
    $arData = array_chunk($arData, $arParams['NEWS_COUNT']);
    $arData = $arData[0];
}

$arResult['ITEMS'] = $arData;
$arResult['NAV_STRING'] = $NAV_STRING;
$arResult['USER'] = $arUser;
$arResult['BLOCKED'] = \Webcompany\Amika\Lib::isBlocked($arUser);
unset($arData, $NAV_STRING);

