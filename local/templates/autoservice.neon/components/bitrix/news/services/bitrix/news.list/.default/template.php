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
<div class="container services_list_main_container">
    <div class="row justify-content-center">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-12 col-lg-10 services_list_container" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="row">
                    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"];?>" class="col-12 col-md-5 col-lg-12 col-xl-5 services_list_image" style="background-image:url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');"></a>
                    <?endif?>
                    <div class="col-12 col-md-7 col-lg-12 col-xl-7 services_list_info">
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="services_list_title"><?echo $arItem["NAME"]?></a>
                        <div class="services_list_description_text"><?echo $arItem["PREVIEW_TEXT"]?></div>
                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]['PRICE']['VALUE'])):?>
                            <div class="services_list_price_block">
                                <i class="fa fa-rub" aria-hidden="true"></i>
                                <div>
                                    <div class="services_list_price_text"><?=$arItem["DISPLAY_PROPERTIES"]['PRICE']['NAME'];?>:</div>
                                    <div class="services_list_price">
                                        <div class="services_list_price_new"><?=number_format($arItem["DISPLAY_PROPERTIES"]['PRICE']['VALUE'], 0, ',', ' ');?>&nbsp;<?=GetMessage('PRV_SERVICES_LIST_RUB')?>.</div>
                                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]['OLD_PRICE']['VALUE'])):?>
                                            <div class="services_list_price_old"><?=number_format($arItem["DISPLAY_PROPERTIES"]['OLD_PRICE']['VALUE'], 0, ',', ' ');?>&nbsp;<?=GetMessage('PRV_SERVICES_LIST_RUB')?>.</div>
                                        <?endif?>
                                    </div>
                                </div>
                            </div>
                        <?endif?>
                        <div class="services_list_btn_block">
                            <a 
                                href="#" 
                                class="btn order_btn" 
                                data-toggle="modal" 
                                data-target="#orderModal" 
                                data-header="<?=(empty($arItem["PROPERTIES"]['ACCUSATIVE']['VALUE']) ? $arItem['NAME'] : $arItem["PROPERTIES"]['ACCUSATIVE']['VALUE']);?>" 
                                data-name="<?=$arItem['NAME'];?>"
                            ><?=GetMessage('PRV_SERVICES_LIST_ORDER')?></a>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn detail_btn"><?=GetMessage('PRV_SERVICES_LIST_DETAIL_LINK')?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
</div>
