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

<section id="main_team" class="black_section">
    <div class="main_team_backgroud"></div>
    <div class="container">
        <h2 class="main_header"><?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => str_replace("//", "/", SITE_DIR . "/inc/main_about_team.php")
            )
        );?></h2>
        <div class="owl-carousel owl-theme team_main_container" id="team_owl">
            <?foreach($arResult["ITEMS"] as $arItem) {
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="team_image" style='<?echo (empty($arItem["PREVIEW_PICTURE"]["SRC"]) ? '' : 'background-image:url("' . $arItem["PREVIEW_PICTURE"]["SRC"] . '");');?>'></div>
                    <div class="team_name"><?=$arItem["NAME"];?></div>
                    <div class="team_post"><?=$arItem['DISPLAY_PROPERTIES']["POST"]['VALUE'];?></div>
                </div>
            <?}?>
        </div>
    </div>
</section>
