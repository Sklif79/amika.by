<?php
$arData = false;
$arGroup = false;
$gi = 0;
foreach ($arResult['ITEMS'] as $item) {
    if ($item['IBLOCK_SECTION_ID']) {
        $arGroup[$item['IBLOCK_SECTION_ID']][$gi] = prepareData($item);
        if (!empty($item['PROPERTIES']['PHOTOS']['VALUE'])) {
            $arPhoto = $item['DISPLAY_PROPERTIES']['PHOTOS'];
            $arGroup[$item['IBLOCK_SECTION_ID']][$gi]['PHOTO'] = prepareDataPhoto($arPhoto['FILE_VALUE']);
        }
        $gi++;
    } else {
        $arData[] = prepareData($item);
    }
}
$arResult = false;
$arResult['ITEMS'] = $arData;
if (!empty($arGroup)) {
    foreach ($arResult['ITEMS'] as &$item) {
        if ($item['SECTION']) {
            $item['COL_LG'] = 12 / count($arGroup[$item['SECTION']]);
        }
    }
}
$arResult['GROUP'] = $arGroup;
unset($arData, $arGroup);

function prepareData($item)
{
    return array(
        'ID' => $item['ID'],
        'IBLOCK_ID' => $item['IBLOCK_ID'],
        'EDIT_LINK' => $item['EDIT_LINK'],
        'DELETE_LINK' => $item['DELETE_LINK'],
        'NAME' => $item['NAME'],
        'PREVIEW_PICTURE' => $item['PREVIEW_PICTURE']['SRC'],
        'DETAIL_PICTURE' => $item['DETAIL_PICTURE']['SRC'],
        'PREVIEW_TEXT' => $item['PREVIEW_TEXT'],
        'DETAIL_TEXT' => $item['DETAIL_TEXT'],
        'TYPE' => $item['PROPERTIES']['TYPE']['VALUE_XML_ID'],
        'SECTION' => $item['PROPERTIES']['SECTION_ID']['VALUE'],
    );
}

function prepareDataPhoto($photo)
{
    $arFile = false;
    foreach ($photo as $file) {
        $big = $file['SRC'];
        $fi = CFile::ResizeImageGet($file['ID'], array('width'=>555, 'height'=>272), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $small = $fi['src'];
        $arFile[] = array(
            'BIG' => $big,
            'SMALL' => $small,
        );
    }
    return $arFile;
}