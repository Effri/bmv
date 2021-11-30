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
$count = count($arResult["ITEMS"]) - 1;
?>
<div class="container">
    <?
    $i = 0;
    foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $i++;
        $text = '';
        switch ($i) {
            case 1:
                $start = '<div class="row"><div class="col-lg-12 col-xl-8" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_big_container">';
                $text = $arItem["PREVIEW_TEXT"];
                $end = '</div></div>';
                if($key == $count)
                    $end .= '</div>';
                break;
            case 2:
                $start = '<div class="col-lg-12 col-xl-4"><div class="row"><div class="col-md-12 col-lg-6 col-xl-12" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_small_container">';
                $end = '</div></div>';
                if($key == $count)
                    $end .= '</div></div></div>';
                break;
            case 3:
                $start = '<div class="col-md-12 col-lg-6 col-xl-12" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_small_container">';
                $end = '</div></div></div></div></div>';
                break;
            case 4:
                $start = '<div class="row"><div class="col-lg-12 col-xl-8 order-xl-2" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_big_container">';
                $text = $arItem["PREVIEW_TEXT"];
                $end = '</div></div>';
                if($key == $count)
                    $end .= '</div>';
                break;
            case 5:
                $start = '<div class="col-lg-12 col-xl-4 order-xl-1"><div class="row"><div class="col-md-12 col-lg-6 col-xl-12" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_small_container">';
                $end = '</div></div>';
                if($key == $count)
                    $end .= '</div></div></div>';
                break;
            case 6:
                $start = '<div class="col-md-12 col-lg-6 col-xl-12" id="' . $this->GetEditAreaId($arItem['ID']) . '"><div class="news_list_small_container">';
                $end = '</div></div></div></div></div>';
                $i = 0;
                break;
        }
        ?>
        <?=$start;?>
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news_list_image_container">
                    <img
                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                        />
                </a>
            <?endif?>
            <div class="news_list_text_block">
                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div class="news_list_date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
                <?endif?>
                <div class="news_list_title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
                <?=$text;?>
            </div>
        <?=$end;?>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
