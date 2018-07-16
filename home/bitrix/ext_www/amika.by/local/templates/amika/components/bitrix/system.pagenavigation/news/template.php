<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

?>

    <div class="pagination">
        <ul class="pagination__list">
            <? if ($arResult['NavPageNomer'] != 1) {
                ?><li><a class="prev"
                         href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a></li>
            <? } ?>

            <? if ($arResult["bDescPageNumbering"] === true): ?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                    <? if ($arResult["bSavePage"]): ?>
                        <li class=""><a
                                href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">1</a>
                        </li>
                    <? else: ?>
                        <li class=""><a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
                        </li>
                    <? endif ?>
                <? else: ?>
                    <li><span>1</span></li>
                <? endif ?>

                <?
                $arResult["nStartPage"]--;
                while ($arResult["nStartPage"] >= $arResult["nEndPage"] + 1):
                    ?>
                    <? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li><span><?= $NavRecordGroupPrint ?></span></li>
                <? else: ?>
                    <li class=""><a
                            href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
                    </li>
                <? endif ?>

                    <? $arResult["nStartPage"]-- ?>
                <? endwhile ?>

                <? if ($arResult["NavPageNomer"] > 1): ?>
                    <? if ($arResult["NavPageCount"] > 1): ?>
                        <li class=""><a
                                href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= $arResult["NavPageCount"] ?></a>
                        </li>
                    <? endif ?>
                <? else: ?>
                    <? if ($arResult["NavPageCount"] > 1): ?>
                        <li><span><?= $arResult["NavPageCount"] ?></span></li>
                    <? endif ?>
                <? endif ?>

            <? else: ?>

                <? if ($arResult["NavPageNomer"] > 1): ?>
                    <? if ($arResult["bSavePage"]): ?>
                        <li class=""><a
                                href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1</a>
                        </li>
                    <? else: ?>
                        <li class=""><a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
                        </li>
                    <? endif ?>
                <? else: ?>
                    <li><span>1</span></li>
                <? endif ?>

                <?
                $arResult["nStartPage"]++;
                while ($arResult["nStartPage"] <= $arResult["nEndPage"] - 1):
                    ?>
                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li><span><?= $arResult["nStartPage"] ?></span></li>
                <? else: ?>
                    <li class=""><a
                            href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <? endif ?>
                    <? $arResult["nStartPage"]++ ?>
                <? endwhile ?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                    <? if ($arResult["NavPageCount"] > 1): ?>
                        <li class=""><a
                                href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>
                        </li>
                    <? endif ?>
                <? else: ?>
                    <? if ($arResult["NavPageCount"] > 1): ?>
                        <li><span><?= $arResult["NavPageCount"] ?></span></li>
                    <? endif ?>
                <? endif ?>
            <? endif ?>

            <? if ($arResult['NavPageNomer'] != $arResult['NavPageCount']) {
                ?><li><a class="next" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"></a></li>
            <? } ?>
            <? if ($arResult["NavShowAll"]){?>
                <li><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=0" >Все</a></li>
           <? } ?>
        </ul>
    </div>