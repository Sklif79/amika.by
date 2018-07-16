<?
$arSection = false;
$arGroup = array();
foreach ($arResult['ITEMS'] as $arItem) {
    $arGroup[$arItem['IBLOCK_SECTION_ID']][] = $arItem;
}
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y');
$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
while ($Section = $rsSections->Fetch()) {
    $Section['PICTURE']=CFile::GetPath($Section['PICTURE']);
    $Section['ITEMS'] = $arGroup[$Section['ID']];
    $arSection[$Section['ID']] = $Section;
}
$arResult['ITEMS']=$arSection;


