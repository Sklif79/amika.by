<?
$arSection = false;
$arGroup = array();
foreach ($arResult['ITEMS'] as $arItem) {
    $arGroup[$arItem['IBLOCK_SECTION_ID']][] = $arItem;
}
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y');
$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
while ($Section = $rsSections->Fetch()) {
    $Section['ITEMS'] = $arGroup[$Section['ID']];
    if($Section['CODE']=='production-area'){
        foreach ($Section['ITEMS'] as &$arItem){
            if (!empty($arItem['PREVIEW_PICTURE'])){
                $img=CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>152, 'height'=>114), BX_RESIZE_IMAGE_EXACT, true);
                $arItem['PREVIEW_PICTURE']['SRC_PREV']=$img['src'];
            }
        }
    }
    $arSection[$Section['CODE']] = $Section;
}
$arResult['ITEMS']=$arSection;


