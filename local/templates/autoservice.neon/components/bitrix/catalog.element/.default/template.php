<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

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
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["PREVIEW_TEXT"]):?>
                <?=$arResult["PREVIEW_TEXT"];?>
            <?endif;?>
        </div>
    </div>
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

    <?if($arResult['DISPLAY_PROPERTIES']['GETUSLUGI']['LINK_ELEMENT_VALUE']){?>
      <div class="service-block row">
          <? foreach ($arResult['DISPLAY_PROPERTIES']['GETUSLUGI']['LINK_ELEMENT_VALUE'] as $index => $item) {?>
            <div class="item col-xl-6 col-lg-12 col-md-12 col-sm-12 ">
                <div>
                <div class="img"><img src="<?=CFile::GetPath($item['PREVIEW_PICTURE']);?>" alt=""></div>
                <div class="content">
                    <div class="name"><?=$item['NAME'];?></div>
                    <a href="<?=$item['DETAIL_PAGE_URL'];?>" class="btn detail_btn">Подробнее</a>
                </div>
                </div>
            </div>
          <?}?>
      </div>
    <?}?>



    <div class="feedback-block">
        <div class="title-block">Не нашли свою услугу? Закажите звонок и мы Вас проконсультируем</div>
        <div class="button-block">
            <a href="#" data-toggle="modal" data-target="#callbackModal" class="btn main_default_btn">Заказать звонок</a>
        </div>
    </div>
</div>
