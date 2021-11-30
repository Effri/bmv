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

<section id="main_portfolio" class="white_section">
    <div class="container">
        <h2 class="main_header"><?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => str_replace("//", "/", SITE_DIR . "/inc/main_portfolio.php")
            )
        );?></h2>
        <div class="row main_news_container main_portfolio_container">
            <div class="owl-carousel owl-theme main_brand_container" id="portfolio_main_owl">
                <?foreach($arResult["ITEMS"] as $arItem) {
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                    <div<?// class="col-12 col-lg-4"?>>
                        <div class="main_news_item main_portfolio_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <?if(!empty($arItem['PREVIEW_PICTURE']['SRC'])):?>
                                <a class="main_news_img_a" href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                                    <img class="main_news_img main_portfolio_img" src="<?echo $arItem['PREVIEW_PICTURE']['SRC'];?>" alt="<?echo $arItem["NAME"]?>" title="<?echo $arItem["NAME"]?>">
                                </a>
                            <?endif;?>
                            <div class="main_news_name main_portfolio_name"><a href="<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"];?></a></div>
                            <div class="main_news_text main_portfolio_text"><?=$arItem['PREVIEW_TEXT'];?></div>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>
        <div class="clearfix"></div>
        <a class="btn orange_btn" href="<?=$arResult["ITEMS"][0]['LIST_PAGE_URL'];?>"><?=GetMessage("NEWS_ALL_MORE_LINK");?></a>
    </div>
</section>
