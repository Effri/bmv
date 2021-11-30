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
<div class="series container">
    <div class="w row">

        <?
        foreach ($arResult['SECTIONS'] as &$arSection) {
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);


            ?>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="series_item_icon"> <span class="series_name"> <span
                                    class="bmw bold"><? echo $arSection['NAME']; ?></span> </span> <img alt="1"
                                                                                                        src="<?=CFile::GetPath($arSection['UF_CAR_IMG']);?>"
                                                                                                        border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <? foreach ($arResult['ITEMS'][$arSection['ID']] as $item) {
                            ?>
                            <li class="inline_block"><a href="<?=$item['DETAIL_PAGE_URL'];?>" class="model">
                                    <?=$item['NAME'];?> </a></li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
            </div>


            <?
        }
        ?>
    </div>
</div>