<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

if (!empty($arResult['ITEMS'])) {
    foreach ($arResult['ITEMS'] as &$arItem) {
        if (!empty($arItem['PREVIEW_PICTURE']) and $arItem['PREVIEW_PICTURE']['ID']) {
            $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 180, 'height' => 170), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $arItem['PREVIEW_PICTURE']['SRC'] = $file['src'];
        }
    }
}

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();