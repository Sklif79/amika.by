<?php
$arData=false;
$LIST_PAGE_URL=$arResult['ITEMS'][0]['LIST_PAGE_URL'];
foreach ($arResult['ITEMS'] as $item){
    $arData[]=array(
        'ID'=>$item['ID'],
        'IBLOCK_ID'=>$item['IBLOCK_ID'],
        'EDIT_LINK'=>$item['EDIT_LINK'],
        'DELETE_LINK'=>$item['DELETE_LINK'],
        'NAME'=>$item['NAME'],
        'PREVIEW_TEXT'=>$item['PREVIEW_TEXT'],
        'DETAIL_PAGE_URL'=>$item['DETAIL_PAGE_URL'],
    );
}
$arResult=false;
$arResult['ITEMS']=$arData;
$arResult['LIST_PAGE_URL']=$LIST_PAGE_URL;
unset($arData,$LIST_PAGE_URL);