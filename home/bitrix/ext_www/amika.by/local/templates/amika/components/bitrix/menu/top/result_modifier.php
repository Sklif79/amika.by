<?php
if (!empty($arResult)) {
    $arMenu = false;
    $i = 0;
    $j = 1;
    $previousLevel = 1;
    foreach ($arResult as $menu) {
        if ($menu["DEPTH_LEVEL"] < $previousLevel) {
            $i++;
        } elseif ($menu["DEPTH_LEVEL"] == 1) {
            $i++;
            $j++;
        }
        if ($menu['DEPTH_LEVEL'] == 1) {
            $arMenu['MENU_1'][$i] = $menu;
        } else {
            $arMenu['MENU_1'][$i]['CHILD'][] = $menu;
        }
        $previousLevel = $menu["DEPTH_LEVEL"];
    }
    $arMenuBuf['MENU_1'] = false;
    $arMenuBuf['MENU_2'] = false;
    $i = 1;
    foreach ($arMenu['MENU_1'] as $menu) {
        if ($i < $arParams['MAX_MENU']) {
            $arMenuBuf['MENU_1'][]=$menu;
        } else {
            $arMenuBuf['MENU_2'][]=$menu;
        }
        $i++;
    }
    $arResult = $arMenuBuf;
}

if(SITE_DIR=='/'){
    $arResult['LANG']='RU';
}else{
    $arResult['LANG']='EN';
}