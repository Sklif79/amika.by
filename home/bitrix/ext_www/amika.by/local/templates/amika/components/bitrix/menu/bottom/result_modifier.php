<?php
if (!empty($arResult)) {
    $arMenu = false;
    $i = 0;
    $j = 1;
    $previousLevel = 1;
    foreach ($arResult as $menu) {
        if($j<$arParams['MAX_MENU']) {
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
        }else{
            $arMenu['MENU_2'][]=$menu;
        }
    }
    $arResult=$arMenu;
}