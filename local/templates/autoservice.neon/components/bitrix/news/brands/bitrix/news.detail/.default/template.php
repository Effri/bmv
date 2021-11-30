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

<div class="container content_container brands_preview_container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-3 col-lg-2">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["PREVIEW_PICTURE"])):?>
                <img 
                    src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
                    alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
                    />
            <?endif?>
        </div>
        <div class="col-12 col-sm-9 col-lg-8">
                <?=$arResult["PREVIEW_TEXT"];?>
        </div>
    </div>
</div>

<?if(is_array($arResult["DETAIL_PICTURE"])):?>
    <div class="content_container">
        <img 
            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
            title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
    </div>
<?endif?>

<?if(!empty($arResult['DISPLAY_PROPERTIES']['MODELS']['VALUE'])):?>
    <div class="container">
        <div class="brands_models_header"><?=$arResult['DISPLAY_PROPERTIES']['MODELS']['NAME'];?></div>
        <div class="row brand_models_table">
            <?
            $i = 0;
            foreach($arResult['DISPLAY_PROPERTIES']['MODELS']['VALUE'] as $model):
                $i++;?>
                <div class="col-6 col-sm-3 one_model<?if($i>4 && $i<=8):?> row_count_4<?endif;?><?if(in_array($i, array(3,4,7,8))):?> row_count_2<?endif;?>">
                    <?=$model;?>
                </div>
                <?
                if($i==8) {
                    $i = 0;
                }
            endforeach;?>
        </div>
    </div>
<?endif?>

<div class="container content_container text_content_container">
	<?echo $arResult["DETAIL_TEXT"];?>
</div>