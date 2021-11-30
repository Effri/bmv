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
/*echo '<pre>';
print_r($arResult);
echo '</pre>';*/
?>
<script src="//yastatic.net/share2/share.js" async="async"></script>

<div class="container content_container">
    <?if($arParams["DISPLAY_DATE"]!="N"):?>
        <?if($arResult["FIELDS"]["DATE_ACTIVE_FROM"]):?>
            <?if($arResult["DATE_ACTIVE_TO"]):?>
                <div class="news_list_date"><?=GetMessage("PRV_PROM_LIST_FROM");?> <?echo FormatDate('j F', MakeTimeStamp($arResult["DATE_ACTIVE_FROM"]));?> <?=GetMessage("PRV_PROM_LIST_TO");?> <?echo FormatDate('j F', MakeTimeStamp($arResult["DATE_ACTIVE_TO"]));?></div>
            <?else:?>
                <div class="news_list_date"><?echo FormatDate('j.m.Y', MakeTimeStamp($arResult["DATE_ACTIVE_FROM"]));?></div>
            <?endif;?>
        <?endif?>
    <?endif?>
</div>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
    <div class="content_container">
        <img 
            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
            title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
    </div>
<?endif?>

<div class="container content_container text_content_container">
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
        <p><b><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></b></p>
	<?endif;?>
	<?echo $arResult["DETAIL_TEXT"];?>
</div>
<div class="container add_container">
<!--    <div class="ya-share2 share_container" data-services="whatsapp,twitter,telegram,vkontakte,facebook,viber"></div>-->
    <div class="ya-share2 share_container" data-services=",vkontakte"></div>
</div>