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
<div class="container portfolio_list_container">
    <div class="row justify-content-center">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-12 col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a class='portfolio_link' href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style='<?echo (empty($arItem["PREVIEW_PICTURE"]) ? '' : 'background-image:url("' . $arItem["PREVIEW_PICTURE"]['SRC'] . '");');?>'>
                    <div class="portfolio_shadowcontainer">
                        <?if(!empty($arItem["NAME"]) && !empty($arItem["PREVIEW_TEXT"])):?>
                            <div class="portfolio_orange_container">
                                <div class="portfolio_name"><?echo $arItem["NAME"]?></div>
                                <div class="portfolio_text"><?echo $arItem["PREVIEW_TEXT"]?></div>
                            </div>
                        <?endif;?>
                    </div>
                </a>
            </div>
        <?endforeach;?>
    </div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>
