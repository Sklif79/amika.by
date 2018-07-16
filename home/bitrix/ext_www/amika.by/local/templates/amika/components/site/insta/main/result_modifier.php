<?php
$arData = false;
$i = 0;
$j = 0;
foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $item) {
    $arData[$j][] = array(
        'ID' => $item['ID'],
        'THUMB' => $item['THUMB'],
        'SRC' => $item['SRC'],
        'LINK' => $item['LINK'],
    );
    if ($i == 5) {
        break;
    }
    $i++;
    if ($i % 3 == 0) {
        $j++;
    }
}
$arResult = false;
$arResult['ITEMS'] = $arData;
unset($arData);