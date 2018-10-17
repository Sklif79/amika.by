
    <div class="about-teaser-amika"
         style="background-image: url(<?=$arResult['ITEMS']['DETAIL_PICTURE']['SRC']?>)"
         id="<? echo $this->GetEditAreaId($arResult['ITEMS']['ID']);?>">
        <div class="container">
            <div class="about-teaser-amika__wr">
                <div class="flex-row">
                    <img src="<?=$arResult['ITEMS']['PREVIEW_PICTURE']['SRC']?>" alt="">
                    <div class="text">
                        <div class="about-teaser-amika__title">
                            <?=$arResult['ITEMS']['NAME']?>
                        </div>
                        <div class="text-descr">
                            <?=$arResult['ITEMS']['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--<div class="about-teaser-amika" style="background-image: url({{ item.DETAIL_PICTURE }})" id="{{ GetEditAreaId(item) }}">
    <div class="container">
        <div class="about-teaser-amika__wr">
            <div class="flex-row">
                <img src="{{ item.PREVIEW_PICTURE }}" alt="">
                <div class="text">
                    <div class="about-teaser-amika__title">{{ item.NAME }}</div>
                    <div class="text-descr">
                        {{ item.PREVIEW_TEXT }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
