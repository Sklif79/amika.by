<?php
$arResult['AUTH_RESULT'] = $arParams['~AUTH_RESULT']['MESSAGE'];
$arResult['socserv'] = array(
    "AUTH_SERVICES" => $_SESSION['AUTH_SERVICES'],
    "AUTH_URL" => $arResult["AUTH_URL"],
    "POST" => $arResult["POST"],
);
$arResult['socserv_hide'] = array("HIDE_ICONS"=>"Y");
$arResult['AUTH_AUTH_URL'] = $APPLICATION->GetCurPage(false);
$arResult['component'] = $component;