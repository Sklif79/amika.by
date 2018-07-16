<?php
$arTemp=array(
    'VKontakte',
    'Facebook',
    'Twitter',
    'YandexOAuth',
    'Odnoklassniki',
    'MyMailRu',
);
$arIcon=array(
    'VKontakte'=>'vk',
    'Facebook'=>'fb',
    'Twitter'=>'tw',
    'YandexOAuth'=> 'ya',
    'Odnoklassniki'=>'ok',
    'MyMailRu'=> 'ml',
);

if(!empty($arResult['DB_SOCSERV_USER'])){
    $arActiveSOC=false;
    foreach ($arResult['DB_SOCSERV_USER'] as $soc){
        $arActiveSOC[$soc['EXTERNAL_AUTH_ID']]=$soc;
    }
}
$arItog=false;
foreach ($arTemp as $key){
    if(!empty($arActiveSOC[$key])){
        $arItog[$key]['ACTIVE']='active';
        $arItog[$key]['ONCLICK']='';
        $arItog[$key]['HREF']=$arActiveSOC[$key]['DELETE_LINK'];
    }else{
        $arItog[$key]['ACTIVE']='';
        $arItog[$key]['ONCLICK']=$arResult['AUTH_SERVICES'][$key]['ONCLICK'];
        $arItog[$key]['HREF']='javascript:void 0';
    }
    $arItog[$key]['KEY']=$key;
    $arItog[$key]['ICON']=$arIcon[$key];
}
$arResult=false;
$arResult['ITEMS']=$arItog;