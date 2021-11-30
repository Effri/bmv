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
<script src="//yastatic.net/share2/share.js" async="async"></script>
<div class="container services_detail_top_container">
    <div class="row justify-content-between">
        <div class="col-md-4 services_detail_topleft_block" style='background-image:url("<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>");'></div>
        <div class="col-12 col-md-8 col-xl-7 services_detail_topright_block">
            <div class="services_detail_preview_text">
                <?=$arResult["FIELDS"]["PREVIEW_TEXT"];?>
            </div>
            <?if(!empty($arResult["DISPLAY_PROPERTIES"]['PRICE']['VALUE'])):?>
                <div class="services_list_price_block">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                    <div>
                        <div class="services_list_price_text"><?=$arResult["DISPLAY_PROPERTIES"]['PRICE']['NAME'];?>:</div>
                        <div class="services_list_price">
                            <?if(!empty($arResult["DISPLAY_PROPERTIES"]['OLD_PRICE']['VALUE'])):?>
                                <div class="services_detail_price_old"><?=number_format($arResult["DISPLAY_PROPERTIES"]['OLD_PRICE']['VALUE'], 0, ',', ' ');?>&nbsp;<?=GetMessage('PRV_SERVICES_DETAIL_RUB')?>.</div>
                            <?endif?>
                            <div class="services_list_price_new"><?=number_format($arResult["DISPLAY_PROPERTIES"]['PRICE']['VALUE'], 0, ',', ' ');?>&nbsp;<?=GetMessage('PRV_SERVICES_DETAIL_RUB')?>.</div>
                        </div>
                    </div>
                </div>
            <?endif?>
            <div class="services_detail_adv_block">
                <?if(!empty($arResult["DISPLAY_PROPERTIES"]['TIME']['VALUE'])):?>
                    <div class="services_list_price_block">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <div>
                            <div class="services_list_price_text"><?=$arResult["DISPLAY_PROPERTIES"]['TIME']['NAME'];?>:</div>
                            <div class="services_list_price">
                                <div class="services_detail_adv_info"><?=$arResult["DISPLAY_PROPERTIES"]['TIME']['VALUE'];?></div>
                            </div>
                        </div>
                    </div>
                <?endif?>
                <?if(!empty($arResult["DISPLAY_PROPERTIES"]['GUARANTEE']['VALUE'])):?>
                    <div class="services_list_price_block">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        <div>
                            <div class="services_list_price_text"><?=$arResult["DISPLAY_PROPERTIES"]['GUARANTEE']['NAME'];?>:</div>
                            <div class="services_list_price">
                                <div class="services_detail_adv_info"><?=$arResult["DISPLAY_PROPERTIES"]['GUARANTEE']['VALUE'];?></div>
                            </div>
                        </div>
                    </div>
                <?endif?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-xl-6">
                    <a 
                        href="#" 
                        class="btn order_btn" 
                        data-toggle="modal" 
                        data-target="#orderModal" 
                        data-header="<?=(empty($arResult["PROPERTIES"]['ACCUSATIVE']['VALUE']) ? $arResult['NAME'] : $arResult["PROPERTIES"]['ACCUSATIVE']['VALUE']);?>" 
                        data-name="<?=$arResult['NAME'];?>"
                    ><?=GetMessage('PRV_SERVICES_LIST_ORDER')?></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container content_container text_content_container">
	<?echo $arResult["DETAIL_TEXT"];?>
</div>

