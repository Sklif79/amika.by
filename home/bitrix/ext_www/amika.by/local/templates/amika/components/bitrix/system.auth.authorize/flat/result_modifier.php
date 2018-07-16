<?php
$arResult['AUTH_RESULT'] = $arParams['~AUTH_RESULT']['MESSAGE'];
$arResult['AUTH_RESULT_TYPE'] = $arParams['~AUTH_RESULT']['TYPE'];
$_SESSION['AUTH_SERVICES'] = $arResult["AUTH_SERVICES"];
$arResult['socserv'] = array(
    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
    "AUTH_URL" => $arResult["AUTH_URL"],
    "POST" => $arResult["POST"],
);
$arResult['socserv_hide'] = array("HIDE_ICONS" => "Y");
$arResult['component'] = $component;
