<?php
$arData=false;
$i=0;
foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $item){
    $arData[]=array(
        'ID'=>$item['ID'],
        'THUMB'=>$item['THUMB'],
        'SRC'=>$item['SRC'],
        'LINK'=>$item['LINK'],
    );
    if($i==2){
        break;
    }
    $i++;
}
$arResult=false;
$arResult['ITEMS']=$arData;
unset($arData);