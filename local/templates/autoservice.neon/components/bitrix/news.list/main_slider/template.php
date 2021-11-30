<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div id="main_slider_owl" class="owl-carousel owl-theme main_slider_owl">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>   
        <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="item_block" style="background-image: url(<?echo $arItem['DETAIL_PICTURE']['SRC'];?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 slider_text_block">
                            <?if(!empty($arItem["DETAIL_TEXT"])):?>
                                <?echo $arItem["DETAIL_TEXT"];?>
                            <?endif;?>
                            <?if(!empty($arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]) && !empty($arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"])):?>
                                <a class="main-slider-btn" href="<?=$arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"]?>"><?=$arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]?></a>
                            <?endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>
