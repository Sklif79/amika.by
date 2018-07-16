<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

CModule::IncludeModule('iblock');
CModule::IncludeModule('highloadblock');
/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$arResult['ADVANTAGE'] = $arResult['PROPERTIES']['ADVANTAGE']['VALUE'];
$arResult['SETTING'] = array();
if (!empty($arResult['PROPERTIES']['SETTING']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['SETTING']['VALUE'] as $k => $val) {
        $arResult['SETTING'][$k] = array(
            'NAME' => $val,
            'VALUE' => $arResult['PROPERTIES']['SETTING']['DESCRIPTION'][$k],
        );
    }
}

$arResult['SCOPE_ICO'] = array();

if ($arResult['PROPERTIES']['SCOPE_ICO']['VALUE']) {
    $hlblock = HL\HighloadBlockTable::getById(3)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entityClass = $entity->getDataClass();
    $res = $entityClass::getList(array(
            'select' => array('*'),
            'filter' => array('UF_XML_ID' => $arResult['PROPERTIES']['SCOPE_ICO']['VALUE'])
        )
    );

    $row = $res->fetchAll();
    if (!empty($row)) {
        foreach ($row as $r) {
            $arResult['SCOPE_ICO'][] = array(
                'NAME' => $r['UF_NAME'],
                'HREF' => $r['UF_LINK'],
                'SRC' => CFile::GetPath($r['UF_FILE']),
            );
        }
    }
}

$arResult['SLIDER'] = array();
if (!empty($arResult['PROPERTIES']['MORE_PHOTE']['VALUE'])) {

    foreach ($arResult['PROPERTIES']['MORE_PHOTE']['VALUE'] as $id) {
        $imgB = CFile::ResizeImageGet($id, array('width' => 390, 'height' => 290), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $imgS = CFile::ResizeImageGet($id, array('width' => 40, 'height' => 40), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['SLIDER'][] = array(
            'SMALL' => $imgS['src'],
            'BIG' => $imgB['src'],
        );
    }

} else {
    $arResult['SLIDER'][] = array(
        'BIG' => $arResult['MORE_PHOTO'][0]['SRC'],
        'SMALL' => $arResult['MORE_PHOTO'][0]['SRC'],
    );
}

$arResult['LIST_LEFT_SETTING'] = array();
$arKeyLeftSetting = array('DRAWING', 'REJECTION', 'THICKNESS');
foreach ($arKeyLeftSetting as $key) {
    $prop = $arResult['PROPERTIES'][$key];
    if ($prop['VALUE']) {
        $arResult['LIST_LEFT_SETTING'][] = array(
            'NAME' => $prop['NAME'],
            'VALUE' => $prop['VALUE'],
        );
    }
}

$arResult['DOCUMENTATION'] = array();
if (!empty($arResult['PROPERTIES']['FILES']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['FILES']['VALUE'] as $id) {
        $rsFile = CFile::GetByID($id);
        $arFile = $rsFile->Fetch();
        $arResult['DOCUMENTATION'][] = array(
            'NAME' => $arFile['DESCRIPTION'],
            'FILE_SIZE' => FBytes($arFile['FILE_SIZE']),
            'HREF' => CFile::GetPath($id),
        );
    }
}