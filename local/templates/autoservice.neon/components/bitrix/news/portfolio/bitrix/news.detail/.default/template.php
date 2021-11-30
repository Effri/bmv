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

<script src="/local/templates/autoservice.neon/components/bitrix/news/portfolio/bitrix/news.detail/.default/share.js"></script>
<!--<script src="//yastatic.net/share2/share.js"></script>-->
<!--<script src="//yastatic.net/share2/share.js" async="async"></script>-->
<div class="container content_container text_content_container portfolio_detail_container">
    <img src='<?=$arResult['DISPLAY_PROPERTIES']['IMAGES']['FILE_VALUE'][0]['SRC'];?>' class="portfolio_main_img" />
    <div class="owl-carousel owl-theme" id="portfolio_owl">
        <?foreach($arResult['DISPLAY_PROPERTIES']['IMAGES']['FILE_VALUE'] as $key => $arItem) { ?>
            <a class="item portfolio_item <?if($key == 0):?>active<?endif;?>" style='background-image:url("<?=$arItem["SRC"];?>");' data-src="<?=$arItem["SRC"];?>"></a>
<!--               href="javascript:void(0);"-->
        <?}?>
    </div>
	<?echo $arResult["DETAIL_TEXT"];?>
<!--    <div class="ya-share2 share_container" data-services="whatsapp,twitter,telegram,vkontakte,facebook,viber"></div>-->
    <div class="ya-share2 share_container" data-services="whatsapp,vkontakte"></div>
</div>