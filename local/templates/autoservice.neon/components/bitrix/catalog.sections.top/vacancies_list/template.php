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
    <?foreach($arResult["SECTIONS"] as $arSection):
        if(!empty($arSection["ITEMS"])):?>
            <h2><?=$arSection["NAME"];?></h2>
            <div id="accordion_<?=$arSection["ID"]?>" class="vacancies_accordion">
                <?foreach($arSection["ITEMS"] as $arElement):
                    $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCST_ELEMENT_DELETE_CONFIRM')));
                    ?> 
                    <div class="card vacancies_card" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                        <div class="card-header" id="heading_<?=$arSection["ID"]?>_<?=$arElement['ID']?>">
                            <a href="#" class="vacancies_card_header collapsed" data-toggle="collapse" data-target="#collapse_<?=$arSection["ID"]?>_<?=$arElement['ID']?>" aria-expanded="false" aria-controls="collapse_<?=$arSection["ID"]?>_<?=$arElement['ID']?>">
                                <div class="vacancies_card_name"><?=$arElement['NAME']?></div>
                                <div class="vacancies_card_price"><?=$arElement['DISPLAY_PROPERTIES']['PRICE']['VALUE'];?></div>
                                <div class="fa vacancies_card_button"></div>
                            </a>
                        </div>
                        <div id="collapse_<?=$arSection["ID"]?>_<?=$arElement['ID']?>" class="collapse" aria-labelledby="heading_<?=$arSection["ID"]?>_<?=$arElement['ID']?>" data-parent="#accordion_<?=$arSection["ID"]?>">
                            <div class="card-body vacancies_card_body">
                                <?if(!empty($arElement['DISPLAY_PROPERTIES']['DUTIES']['VALUE'])):?>
                                    <p><b><?=$arElement['DISPLAY_PROPERTIES']['DUTIES']['NAME'];?>:</b></p>
                                    <ul>
                                        <?foreach($arElement['DISPLAY_PROPERTIES']['DUTIES']['VALUE'] as $li):?>
                                            <li><?=$li;?></li> 
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>
                                <?if(!empty($arElement['DISPLAY_PROPERTIES']['REQUIREMENTS']['VALUE'])):?>
                                    <p><b><?=$arElement['DISPLAY_PROPERTIES']['REQUIREMENTS']['NAME'];?>:</b></p>
                                    <ul>
                                        <?foreach($arElement['DISPLAY_PROPERTIES']['REQUIREMENTS']['VALUE'] as $li):?>
                                            <li><?=$li;?></li> 
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>
                                <?if(!empty($arElement['DISPLAY_PROPERTIES']['CONDITIONS']['VALUE'])):?>
                                    <p><b><?=$arElement['DISPLAY_PROPERTIES']['CONDITIONS']['NAME'];?>:</b></p>
                                    <ul>
                                        <?foreach($arElement['DISPLAY_PROPERTIES']['CONDITIONS']['VALUE'] as $li):?>
                                            <li><?=$li;?></li> 
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>
                                <?=($arElement['DETAIL_TEXT_TYPE'] == 'text' && !empty($arElement['DETAIL_TEXT']))? '<p>' . $arElement['DETAIL_TEXT'] . '</p>' : $arElement['DETAIL_TEXT'];?>
                                <a href="#" data-toggle="modal" data-target="#resumeModal" class="btn orange_btn"><?=GetMessage('PRV_VACANCIES_SEND_RESUME');?></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        <?endif;
    endforeach?>
</div>