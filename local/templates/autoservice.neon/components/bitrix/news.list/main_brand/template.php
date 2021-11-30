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
$this->setFrameMode(true);?>
<section id="main_brand" class="white_section">
    <div class="container">
        <h2 class="main_header"><?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => str_replace("//", "/", SITE_DIR . "/inc/main_brand.php")
            )
        );?></h2>
        <div class="owl-carousel owl-theme main_brand_container" id="brand_owl">
            <?foreach($arResult["ITEMS"] as $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="client_logo">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="client_link">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$arItem["NAME"];?>">
                        </a>
                    </div>
                </div>
            <?}?>
        </div>
    </div>
</section>
