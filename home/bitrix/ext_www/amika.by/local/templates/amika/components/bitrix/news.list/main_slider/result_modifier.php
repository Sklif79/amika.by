<?php
$arSlider=false;
foreach ($arResult['ITEMS'] as $item){
    $arSlider[]=array(
        'ID'=>$item['ID'],
        'IBLOCK_ID'=>$item['IBLOCK_ID'],
        'EDIT_LINK'=>$item['EDIT_LINK'],
        'DELETE_LINK'=>$item['DELETE_LINK'],
        'NAME'=>$item['NAME'],
        'PREVIEW_TEXT'=>$item['PREVIEW_TEXT'],
        'PREVIEW_PICTURE'=>$item['PREVIEW_PICTURE']['SRC'],
        'DETAIL_PICTURE'=>$item['DETAIL_PICTURE']['SRC'],
        'PROP'=>array(
            'URL'=>$item['PROPERTIES']['URL']['VALUE'],
            'LINCK_TEXT'=>$item['PROPERTIES']['LINCK_TEXT']['VALUE'],
            'TARGET'=>$item['PROPERTIES']['TARGET']['VALUE'],
        ),
    );
}
$arResult=false;
$arResult['ITEMS']=$arSlider;
unset($arSlider);