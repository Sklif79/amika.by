<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;
//delayed function must return a string
if (empty($arResult))
    return "";
$strReturn = '';
$strReturn .= '<ul class="breadcrums clearfix"><li><a href="'.SITE_DIR.'" title="Главная">Главная</a></li>';
$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= ' <li><a href="' . $arResult[$index]["LINK"] . '" title="">'.$title.'</a></li>';
    } else {
        $strReturn .= ' <li class="active" ><a  title="'.$title.'">'.$title.'</a></li>';
    }
}
$strReturn .= ' </ul>';
return $strReturn;
