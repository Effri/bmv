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

<div class="container">
    <h2><?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => str_replace("//", "/", SITE_DIR . "/inc/information_faq_head.php")
        )
    );?></h2>
    <div id="accordion" class="vacancies_accordion">
        <?foreach($arResult["ITEMS"] as $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
            <div class="card vacancies_card" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="card-header" id="heading_<?=$arItem["ID"]?>">
                    <a href="#" class="vacancies_card_header collapsed" data-toggle="collapse" data-target="#collapse_<?=$arItem['ID']?>" aria-expanded="false" aria-controls="collapse_<?=$arItem['ID']?>">
                        <div class="vacancies_card_name faq_card_name"><?=$arItem['NAME']?></div>
                        <div class="fa vacancies_card_button"></div>
                    </a>
                </div>
                <div id="collapse_<?=$arItem['ID']?>" class="collapse" aria-labelledby="heading_<?=$arItem['ID']?>" data-parent="#accordion">
                    <div class="card-body vacancies_card_body">
                        <?=($arItem['DETAIL_TEXT_TYPE'] == 'text' && !empty($arItem['DETAIL_TEXT']))? '<p>' . $arItem['DETAIL_TEXT'] . '</p>' : $arItem['DETAIL_TEXT'];?>
                    </div>
                </div>
            </div>
        <?}?>  
    </div>
</div>
