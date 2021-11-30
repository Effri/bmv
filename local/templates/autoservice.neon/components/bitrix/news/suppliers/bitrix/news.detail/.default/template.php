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
<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["PREVIEW_PICTURE"])):?>
    <div class="content_container">
        <div class="suppliers_detail_image_container">
            <div class="suppliers_detail_image">
                <img
                    src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
                    alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
                    />
            </div>
        </div>
    </div>
<?endif?>

<div class="container content_container text_content_container">
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
        <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];?></p>
	<?endif;?>
	<?echo $arResult["DETAIL_TEXT"];?>
        
    <a href="#" data-toggle="modal" data-target="#supplierModal" class="btn supplier_btn"><?=GetMessage('PRV_SUPPLIER_SEND');?></a>
    <div class="clearfix"></div>
</div>