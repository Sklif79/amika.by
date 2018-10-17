<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$i = 0;
foreach ($arResult['ITEMS'] as $arItem){
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], \CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], \CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'TITLE') { // Блок заголовка?>
        <div class="content-under-head clearfix" id="<? echo $this->GetEditAreaId($arItem['ID']);?>">
            <div class="container">
                <div class="flex-row">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                    <div class="content-under-head__slogan">
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>
                </div>
            </div>
        </div>
    <?}?>


    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'BG_PIC') { // Картинка фоном?>
        <div class="about-bg-color"
             style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"
             id="<? echo $this->GetEditAreaId($arItem['ID']);?>">
        </div>
    <?}?>

    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'PIC_TEXT') { // Картинка - слева, Текст -справа?>
        <div class="about-teaser-mav" id="<? echo $this->GetEditAreaId($arItem['ID']);?>">
            <div class="container">
                <div class="flex-row">
                    <a href="www.mav.by" title=""><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt=""></a>
                    <div class="text">
                        <div class="about-teaser-mav__title"><?=$arItem['NAME']?></div>
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>
                </div>
            </div>
        </div>
    <?}?>

    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'TEXT_BG_BLOCK') { // Текст на фоне в блоке?>
        <div class="about-teaser-amika"
             style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC']?>)"
             id="<? echo $this->GetEditAreaId($arItem['ID']);?>">
            <div class="container">
                <div class="about-teaser-amika__wr">
                    <div class="flex-row">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                        <div class="text">
                            <div class="about-teaser-amika__title">
                                <?=$arItem['NAME']?>
                            </div>
                            <div class="text-descr">
                                <div class=""><?=$arItem['PREVIEW_TEXT']?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?}?>

    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'SECT_IMG_TEXT') { // Раздел с картинками и текстом?>
        <div class="container bb-1">
            <div class="slider-group">
                <div class="row">
                    <div id="<? echo $this->GetEditAreaId($arItem['ID']);?>" class="col-lg-4">
                            <div class="slider-group__item">
                                <?if(!empty($arItem['PROPERTIES']['PHOTOS']['VALUE'])){?>
                                    <div class="slider-group__sl">
                                        <div class="js__slider-group__sl">
                                            <?foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $value){?>
                                                <?
                                                $arFile = CFile::GetFileArray($value);
                                                $file = CFile::ResizeImageGet($value, array('width'=>555, 'height'=>272), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                                ?>
                                                <div class="item">
                                                    <a href="<?=$arFile['SRC']?>" class="zoom title=">
                                                        <img src="<?=$file['src']?>" alt="Photo">
                                                    </a>
                                                </div>
                                            <?}?>
                                        </div>
                                    </div>
                                <?}?>
                                <div class="slider-group__item__title"><?=$arItem['PREVIEW_TEXT']?></div>
                                <div class="text-descr-small">
                                    <?=$arItem['DETAIL_TEXT']?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <?}?>

    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'PIC_TEXT_OPEN') { // Картинка - слева, Текст -справа ,текст подробнее ?>
        <div class="container bb-1" id="<? echo $this->GetEditAreaId($arItem['ID']);?>">
            <div class="assort-about">
                <div class="flex-row">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                    <div class="text">
                        <div class="assort-about__title">
                            <?=$arItem['NAME']?>
                        </div>
                        <div class="text-descr">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?}?>

    <?if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'SECT_IMG_BG_TEXT') { // Раздел с фоновыми картинками и текстом ?>
<!--        --><?//break?>
        <?if($i == 0 ){?>
        <div class="container bb-1">
            <div class="about-best">
                <div class="row">
        <?}?>
                    <div id="<? echo $this->GetEditAreaId($arItem['ID']);?>" class="col-lg-6">
                        <div class="about-best__item best-1" style="background: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>) no-repeat top left">
                            <div class="about-best__title">
                                <?=$arItem['PREVIEW_TEXT']?>
                            </div>
                            <?=$arItem['DETAIL_TEXT']?>
                        </div>
                    </div>
            <?$i++?>
        <?if($i == 2 ){?>
                </div>
            </div>
        </div>
        <?}?>

    <?}?>

<?}?>


<!--<div class="container bb-1">
    <div class="about-best">
        <div class="row">
            <?/*foreach ($arResult['ITEMS'] as $arItem){*/?>
                <?/*if($arItem['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'SECT_IMG_BG_TEXT') { // Раздел с фоновыми картинками и текстом */?>
                    <div id="<?/* echo $this->GetEditAreaId($arItem['ID']);*/?>" class="col-lg-6">
                        <div class="about-best__item best-1" style="background: url(<?/*=$arItem['PREVIEW_PICTURE']['SRC']*/?>) no-repeat top left">
                            <div class="about-best__title">
                                <?/*=$arItem['PREVIEW_TEXT']*/?>
                            </div>
                            <?/*=$arItem['DETAIL_TEXT']*/?>
                        </div>
                    </div>
                <?/*}*/?>
            <?/*}*/?>
        </div>
    </div>
</div>-->
