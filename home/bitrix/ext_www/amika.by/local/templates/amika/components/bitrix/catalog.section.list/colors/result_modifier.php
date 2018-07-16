<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


$arSelect = Array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "PREVIEW_PICTURE",
    "IBLOCK_SECTION_ID",
    "PROPERTY_F_263_177",
    "PROPERTY_F_263_146",
    "PROPERTY_F_540_177",
    "PROPERTY_F_263_369",
    "PROPERTY_ELEMENT",
);
$arGroupElement = array();
$arUseElementID = array();
$arUseElement = array();
$arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", "!PROPERTY_ELEMENT" => false);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while ($arFields = $res->GetNext()) {
    $prevPic = $arFields['PREVIEW_PICTURE'];

    $F_263_177 = $arFields['PROPERTY_F_263_177_VALUE'] ? $arFields['PROPERTY_F_263_177_VALUE'] : $prevPic;
    $F_263_146 = $arFields['PROPERTY_F_263_146_VALUE'] ? $arFields['PROPERTY_F_263_146_VALUE'] : $prevPic;
    $F_540_177 = $arFields['PROPERTY_F_540_177_VALUE'] ? $arFields['PROPERTY_F_540_177_VALUE'] : $prevPic;
    $F_263_369 = $arFields['PROPERTY_F_263_369_VALUE'] ? $arFields['PROPERTY_F_263_369_VALUE'] : $prevPic;
    $F_263_351 = $arFields['PROPERTY_F_263_351_VALUE'] ? $arFields['PROPERTY_F_263_351_VALUE'] : $prevPic;


    $F_263_177_i = CFile::ResizeImageGet($F_263_177, array('width' => 263, 'height' => 177), BX_RESIZE_IMAGE_EXACT, true);
    $F_263_177 = $F_263_177_i['src'];

    $F_263_146_i = CFile::ResizeImageGet($F_263_146, array('width' => 263, 'height' => 146), BX_RESIZE_IMAGE_EXACT, true);
    $F_263_146 = $F_263_146_i['src'];

    $F_540_177_i = CFile::ResizeImageGet($F_540_177, array('width' => 540, 'height' => 177), BX_RESIZE_IMAGE_EXACT, true);
    $F_540_177 = $F_540_177_i['src'];

    $F_263_369_i = CFile::ResizeImageGet($F_263_369, array('width' => 263, 'height' => 369), BX_RESIZE_IMAGE_EXACT, true);
    $F_263_369 = $F_263_369_i['src'];

    $F_263_351_i = CFile::ResizeImageGet($F_263_351, array('width' => 263, 'height' => 351), BX_RESIZE_IMAGE_EXACT, true);
    $F_263_351 = $F_263_351_i['src'];

    $arUseElementID[$arFields['PROPERTY_ELEMENT_VALUE']] = $arFields['PROPERTY_ELEMENT_VALUE'];
    $arGroupElement[$arFields['IBLOCK_SECTION_ID']][] = array(
        'ELEMENT' => $arFields['PROPERTY_ELEMENT_VALUE'],
        'ORG' => CFile::GetPath($prevPic),
        'F_263_177' => $F_263_177,
        'F_263_146' => $F_263_146,
        'F_540_177' => $F_540_177,
        'F_263_369' => $F_263_369,
        'F_263_351' => $F_263_351,
    );
}

$arUseElementID = array_values($arUseElementID);

$arSelect = Array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "DETAIL_PAGE_URL",
);
$arFilter = Array("IBLOCK_ID" => 23, "ACTIVE" => "Y", "ID" => $arUseElementID);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while ($arFields = $res->GetNext()) {
    $arUseElement[$arFields['ID']] = $arFields;
}

foreach ($arGroupElement as &$arGroup) {
    foreach ($arGroup as &$arElement) {
        $UseElm = $arUseElement[$arElement['ELEMENT']];
        $arElement['NAME'] = $UseElm['NAME'];
        $arElement['DETAIL_PAGE_URL'] = $UseElm['DETAIL_PAGE_URL'];
    }
}

$arResult['ITEMS'] = array();

$arSlice = array(4, 4, 4, 3);
foreach ($arResult['SECTIONS'] as $k => $arSection) {
    $arItems = array();
    $kl = $k % 4;
    $arElements = array_slice($arGroupElement[$arSection['ID']], 0, $arSlice[$kl]);
    switch ($kl) {
        case '0':
            $arItems[] = GetViewArBlock($arSection, array(), 'section', '263_177');
            if ($arElements[0]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[0], '263_177');
            }
            if ($arElements[1]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[1], '263_146');
            }
            if ($arElements[2]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[2], '263_146');
            }
            if ($arElements[3]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[3], '540_177');
            }
            break;
        case '1':
            if ($arElements[0]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[0], '263_146');
            }
            $arItems[] = GetViewArBlock($arSection, array(), 'section', '263_146');
            if ($arElements[1]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[1], '263_369');
            }
            if ($arElements[2]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[2], '263_177');
            }
            if ($arElements[3]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[3], '263_177');
            }
            break;
        case '2':
            if ($arElements[0]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[0], '263_177');
            }
            if ($arElements[1]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[1], '263_177');
            }
            $arItems[] = GetViewArBlock($arSection, array(), 'section', '263_146');
            if ($arElements[2]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[2], '263_146');
            }
            if ($arElements[3]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[3], '540_177');
            }
            break;
        case '3':
            if ($arElements[0]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[0], '540_177');
            }
            if ($arElements[1]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[1], '263_351');
            }
            $arItems[] = GetViewArBlock($arSection, array(), 'section', '263_160');
            if ($arElements[2]) {
                $arItems[] = GetViewArBlock($arSection, $arElements[2], '263_177');
            }
            break;
    }
    $arResult['ITEMS'][] = $arItems;
}
unset($arResult['SECTIONS']);
