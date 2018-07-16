<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/*TAGS*/
if ($arParams["SEARCH_PAGE"]) {
    if ($arResult["FIELDS"] && isset($arResult["FIELDS"]["TAGS"])) {
        $tags = array();
        foreach (explode(",", $arResult["FIELDS"]["TAGS"]) as $tag) {
            $tag = trim($tag, " \t\n\r");
            if ($tag) {
                $url = CHTTP::urlAddParams(
                    $arParams["SEARCH_PAGE"],
                    array(
                        "tags" => $tag,
                    ),
                    array(
                        "encode" => true,
                    )
                );
                $tags[] = '<a href="' . $url . '">' . $tag . '</a>';
            }
        }
        $arResult["FIELDS"]["TAGS"] = implode(", ", $tags);
    }
}
/*VIDEO & AUDIO*/
$mediaProperty = trim($arParams["MEDIA_PROPERTY"]);
if ($mediaProperty) {
    if (is_numeric($mediaProperty)) {
        $propertyFilter = array(
            "ID" => $mediaProperty,
        );
    } else {
        $propertyFilter = array(
            "CODE" => $mediaProperty,
        );
    }

    $elementIndex = array();
    $elementIndex[$arResult["ID"]] = array(
        "PROPERTIES" => array(),
    );

    CIBlockElement::GetPropertyValuesArray($elementIndex, $arResult["IBLOCK_ID"], array(
        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
        "ID" => $arResult["ID"],
    ), $propertyFilter);

    foreach ($elementIndex as $idx) {
        foreach ($idx["PROPERTIES"] as $property) {
            $url = '';
            if ($property["MULTIPLE"] == "Y" && $property["VALUE"]) {
                $url = current($property["VALUE"]);
            }
            if ($property["MULTIPLE"] == "N" && $property["VALUE"]) {
                $url = $property["VALUE"];
            }

            if (preg_match('/(?:youtube\\.com|youtu\\.be).*?[\\?\\&]v=([^\\?\\&]+)/i', $url, $matches)) {
                $arResult["VIDEO"] = 'https://www.youtube.com/embed/' . $matches[1] . '/?rel=0&controls=0showinfo=0';
            } elseif (preg_match('/(?:vimeo\\.com)\\/([0-9]+)/i', $url, $matches)) {
                $arResult["VIDEO"] = 'https://player.vimeo.com/video/' . $matches[1];
            } elseif (preg_match('/(?:rutube\\.ru).*?\\/video\\/([0-9a-f]+)/i', $url, $matches)) {
                $arResult["VIDEO"] = 'http://rutube.ru/video/embed/' . $matches[1] . '?sTitle=false&sAuthor=false';
            } elseif (preg_match('/(?:soundcloud\\.com)/i', $url, $matches)) {
                $arResult["SOUND_CLOUD"] = $url;
            }
        }
    }
}

/*SLIDER*/
$sliderProperty = trim($arParams["SLIDER_PROPERTY"]);
if ($sliderProperty) {
    if (is_numeric($sliderProperty)) {
        $propertyFilter = array(
            "ID" => $sliderProperty,
        );
    } else {
        $propertyFilter = array(
            "CODE" => $sliderProperty,
        );
    }

    $elementIndex = array();
    $elementIndex[$arResult["ID"]] = array(
        "PROPERTIES" => array(),
    );

    CIBlockElement::GetPropertyValuesArray($elementIndex, $arResult["IBLOCK_ID"], array(
        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
        "ID" => $arResult["ID"],
    ), $propertyFilter);

    foreach ($elementIndex as $idx) {
        foreach ($idx["PROPERTIES"] as $property) {
            $files = array();
            if ($property["MULTIPLE"] == "Y" && $property["VALUE"]) {
                $files = $property["VALUE"];
            }
            if ($property["MULTIPLE"] == "N" && $property["VALUE"]) {
                $files = array($property["VALUE"]);
            }

            if ($files) {
                $arResult["SLIDER"] = array();
                foreach ($files as $fileId) {
                    $file = CFile::GetFileArray($fileId);
                    if ($file && $file["WIDTH"] > 0 && $file["HEIGHT"] > 0) {
                        $arResult["SLIDER"][] = $file;
                    }
                }
            }
        }
    }
}
$arResult['SECTION_NAME'] = $arResult['SECTION']['PATH'][0]['NAME'];
/* THEME */
$arParams["TEMPLATE_THEME"] = trim($arParams["TEMPLATE_THEME"]);
if ($arParams["TEMPLATE_THEME"] != "") {
    $arParams["TEMPLATE_THEME"] = preg_replace("/[^a-zA-Z0-9_\-\(\)\!]/", "", $arParams["TEMPLATE_THEME"]);
    if ($arParams["TEMPLATE_THEME"] == "site") {
        $templateId = COption::GetOptionString("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
        $templateId = (preg_match("/^eshop_adapt/", $templateId)) ? "eshop_adapt" : $templateId;
        $arParams['TEMPLATE_THEME'] = COption::GetOptionString('main', 'wizard_' . $templateId . '_theme_id', 'blue', SITE_ID);
    }
    if ($arParams["TEMPLATE_THEME"] != "") {
        if (!is_file($_SERVER["DOCUMENT_ROOT"] . $this->GetFolder() . "/themes/" . $arParams["TEMPLATE_THEME"] . "/style.css"))
            $arParams["TEMPLATE_THEME"] = "";
    }
}
if ($arParams["TEMPLATE_THEME"] == "")
    $arParams["TEMPLATE_THEME"] = "blue";

$srcBg = '/local/templates/amika/amika/images/single-news-pic.png';
if (!empty($arResult['DETAIL_PICTURE'])) {
    $img = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width' => 1440, 'height' => 350), BX_RESIZE_IMAGE_EXACT, true);
    $srcBg = $img['src'];
}
$this->SetViewTarget('news_bg_detail'); ?>background: url(<?= $srcBg ?>) no-repeat top center;<? $this->EndViewTarget();

$rsElement = CIBlockElement::GetList(
    array(
        $arParams["SORT_BY1"] => $arParams["SORT_ORDER1"],
        $arParams["SORT_BY2"] => $arParams["SORT_ORDER2"],
    ),
    array(
        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
        "ACTIVE" => "Y",
    ),
    false,
    array(
        "nPageSize" => 1,
        "nElementID" => $arResult["ID"],
    ),
    array(
        "ID",
        "NAME",
        "DETAIL_PAGE_URL"
    )
);


$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
while ($obElement = $rsElement->GetNextElement()) {
    $arItems[] = $obElement->GetFields();
}
if (count($arItems) == 3) {
    $arResult["TO_RIGHT"] = Array("NAME" => $arItems[0]["NAME"], "URL" => $arItems[0]["DETAIL_PAGE_URL"]);
    $arResult["TO_LEFT"] = Array("NAME" => $arItems[2]["NAME"], "URL" => $arItems[2]["DETAIL_PAGE_URL"]);
} elseif (count($arItems) == 2) {
    if ($arItems[0]["ID"] != $arResult["ID"]) {
        $arResult["TO_RIGHT"] = Array("NAME" => $arItems[0]["NAME"], "URL" => $arItems[0]["DETAIL_PAGE_URL"]);
    } else {
        $arResult["TO_LEFT"] = Array("NAME" => $arItems[1]["NAME"], "URL" => $arItems[1]["DETAIL_PAGE_URL"]);
    }
}
