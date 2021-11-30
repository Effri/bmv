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

<div class="container">
    <div class="row">
        <?foreach($arResult["ITEMS"] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
            <div class="col-12 reviews_block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="reviews_body">
                    <div class="reviews_header">
                        <span class="reviews_name"><?=$arItem['PROPERTIES']['NAME']['VALUE'];?></span>
                        <?=$arItem['TIMESTAMP_X'];?>
                    </div>
                    <div>
                        <?=$arItem['PROPERTIES']['COMMENT']['VALUE']['TEXT'];?>
                    </div>
                </div>
            </div>
        <?}?>  
    </div>
</div>
