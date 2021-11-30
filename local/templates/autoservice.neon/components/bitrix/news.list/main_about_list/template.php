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
<section id="main_about" class="white_section">
    <div class="container">
        <h2 class="main_header"><?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => str_replace("//", "/", SITE_DIR . "/inc/main_about_list.php")
            )
        );?></h2>
        <div class="row about_main_container">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-12 col-md-6 col-lg-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class='about_main_link' style='<?echo (empty($arItem['DISPLAY_PROPERTIES']['PREVIEW_IMG']['FILE_VALUE']['SRC']) ? '' : 'background-image:url("' . $arItem['DISPLAY_PROPERTIES']['PREVIEW_IMG']['FILE_VALUE']['SRC'] . '");');?>'>
                        <div class="main_about_icon_border">
                            <div class="main_about_icon_bg">
                                <?if(!empty($arItem['DISPLAY_PROPERTIES']['PREVIEW_IMG']['FILE_VALUE']['SRC'])):?>
                                    <img class="main_about_icon" src="<?echo $arItem['DISPLAY_PROPERTIES']['PREVIEW_IMG']['FILE_VALUE']['SRC'];?>" alt="<?echo $arItem["NAME"]?>" title="<?echo $arItem["NAME"]?>">
                                <?endif;?>                            
                            </div>
                        </div>
                        <div class="about_main_text_container">
                            <?if(!empty($arItem["NAME"]) && !empty($arItem["PREVIEW_TEXT"])):?>
                                <div class="about_main_orange_container">
                                    <div class="about_main_name"><?echo $arItem["NAME"]?></div>
                                    <div class="about_main_text"><?echo $arItem["PREVIEW_TEXT"]?></div>
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>
