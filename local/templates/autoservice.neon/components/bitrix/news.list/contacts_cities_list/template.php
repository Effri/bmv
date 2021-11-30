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
<script>
	markerArray = [];
</script>
<div class="contacts_map">
    <?
        $arTransParams = array(
            'INIT_MAP_TYPE' => 'MAP',
            'MAP_WIDTH' => '100%',
            'MAP_HEIGHT' => '470px',
            "CONTROLS" => array(
                0 => "ZOOM",
                1 => "TYPECONTROL",
            ),
            'YANDEX_VERSION' => '2.1',
            "OPTIONS" => array(
                0 => "ENABLE_DBLCLICK_ZOOM",
                1 => "ENABLE_RIGHT_MAGNIFIER",
                2 => "ENABLE_DRAGGING"
            ),
            'MAP_ID' => 'contacts_map',
            'ONMAPREADY' => 'BX_SetPlacemarks_contacts_map',
        );
        $APPLICATION->IncludeComponent('bitrix:map.yandex.system', 'contacts_map', $arTransParams, false, array('HIDE_ICONS' => 'Y'));
    ?>
</div>

<div class="container contact_main_office_info_container">
    <div class="row">
        <div class="col-12 col-md-4 contact_main_office_item">
            <div class="contact_main_office_circle">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
            </div>
            <div class="contact_main_office_info">
                <div class="contact_main_office_name"><?=GetMessage('PRV_CONTACTS_MAIN_OFFICE')?></div>
                г. Санкт-Петербург, ул. Миргородская, 30
            </div>
        </div>
        <div class="col-12 col-md-4 contact_main_office_item">
            <div class="contact_main_office_circle">
                <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="contact_main_office_info">
                <div class="contact_main_office_name"><?=GetMessage('PRV_CONTACTS_MAIN_PHONE')?></div>
                <a href="tel:+78002502188">+7 (812) 611-23-11</a>
            </div>
        </div>
        <div class="col-12 col-md-4 contact_main_office_item">
            <div class="contact_main_office_circle">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="contact_main_office_info">
                <div class="contact_main_office_name"><?=GetMessage('PRV_CONTACTS_MAIN_EMAIL')?></div>
                m50bmw@mail.ru
            </div>
        </div>
    </div>
</div>
<script>
    markerArray.push({
        coord: [<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['LATITUDE']['VALUE'];?>, <?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['LONGITUDE']['VALUE'];?>],
        address: '<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'];?>',
        time: '<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'];?>',
        phone: '<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['PHONE']['VALUE'];?>'
    });
</script>
<div class="container text_content_container">
    <? /*<div class="city_name"><?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => str_replace("//", "/", SITE_DIR . "/inc/contacts_cities_list_head.php")
        )
    );?></div>
    <div class="contacts_cities_list_info"><?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => str_replace("//", "/", SITE_DIR . "/inc/contacts_cities_list_info.php")
        )
    );?></div>*/ ?>
    <?/*foreach($arResult["ITEMS"] as $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <div class="city_container" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="city_name"><?=$arItem["NAME"];?></div>
            <div class="city_info_block">
                <?if($arParams["DISPLAY_PICTURE"]!="N"):?>
                    <a class="city_info_left" <?if(is_array($arItem["PREVIEW_PICTURE"])):?> style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');"<?endif;?>>
                        <?if(!is_array($arItem["PREVIEW_PICTURE"])):?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="121" height="51" viewBox="0 0 121 51" version="1.1">
                                <g id="#242424ff">
                                    <path fill="#242424" opacity="1.00" d=" M 23.96 8.03 C 35.05 4.64 46.19 0.25 57.94 0.27 C 70.66 1.13 82.00 7.60 93.41 12.68 C 98.82 13.48 104.44 11.93 109.82 13.47 C 114.56 14.34 118.44 17.54 121.00 21.52 L 121.00 22.04 C 117.32 18.94 112.75 16.86 107.90 16.61 C 95.76 15.73 83.95 19.52 71.90 20.29 C 65.56 20.93 59.18 20.05 53.06 18.40 C 62.64 18.57 72.13 17.15 81.52 15.36 C 79.77 15.13 78.03 14.91 76.29 14.69 C 75.60 13.03 74.93 11.36 74.27 9.69 C 75.76 10.14 77.24 10.61 78.72 11.08 C 79.31 10.82 79.90 10.55 80.48 10.28 C 73.17 8.66 66.69 4.09 59.01 3.87 C 47.18 3.45 35.74 7.48 23.96 8.03 M 86.69 14.14 C 84.56 13.06 82.46 11.93 80.47 10.62 C 80.99 13.79 84.09 13.81 86.69 14.14 Z"/>
                                    <path fill="#242424" opacity="1.00" d=" M 9.69 13.64 C 14.24 9.38 20.96 8.42 26.96 8.73 C 36.71 9.38 46.16 12.10 55.48 14.86 C 46.62 14.33 37.90 12.16 28.98 12.22 C 22.98 12.10 16.36 12.56 11.53 16.57 C 9.09 18.48 7.96 21.45 6.60 24.12 C 6.29 20.42 6.73 16.26 9.69 13.64 Z"/>
                                </g>
                                <g id="#f47622ff">
                                    <path fill="var(--prvcolor)" opacity="1.00" d=" M 19.89 25.59 C 20.92 23.01 22.33 20.27 25.09 19.21 C 29.20 17.42 33.97 19.39 36.38 22.99 C 54.94 22.97 73.50 23.08 92.06 22.93 C 90.98 27.01 91.76 32.99 96.74 33.91 C 93.56 30.47 92.64 25.96 92.39 21.42 C 95.97 18.10 101.81 17.22 105.33 21.16 C 102.69 21.94 100.03 22.64 97.36 23.31 C 97.14 24.61 96.92 25.90 96.70 27.20 C 97.59 28.23 98.48 29.26 99.36 30.30 C 102.09 29.56 104.82 28.84 107.57 28.18 C 106.60 30.75 105.31 33.53 102.58 34.60 C 98.41 36.03 93.71 34.75 91.22 31.01 C 72.71 31.01 54.19 30.96 35.68 31.04 C 36.76 27.03 35.66 21.11 31.10 20.08 C 31.33 21.79 32.99 22.86 33.55 24.46 C 34.47 27.15 34.54 30.04 34.95 32.83 L 34.97 32.99 C 31.25 35.85 25.65 35.89 22.05 32.80 C 24.80 31.95 27.58 31.20 30.35 30.41 C 31.13 27.71 30.20 25.37 28.14 23.58 C 25.41 24.35 22.66 25.03 19.89 25.59 M 38.12 24.62 C 48.07 25.36 58.05 24.85 68.01 25.00 C 75.20 24.83 82.44 25.46 89.58 24.44 C 79.41 23.59 69.19 24.16 59.00 24.00 C 52.04 24.17 45.02 23.50 38.12 24.62 M 38.06 29.61 C 44.68 30.23 51.33 29.95 57.97 30.00 C 68.49 29.84 79.03 30.38 89.53 29.63 C 80.08 28.36 70.50 29.27 60.99 29.00 C 53.35 29.20 45.64 28.46 38.06 29.61 Z"/>
                                </g>
                                <g id="#000000ff">
                                    <path fill="#000000" opacity="1.00" d=" M 5.37 37.46 C 7.69 37.01 11.61 36.79 11.33 40.21 C 9.37 39.89 7.18 38.93 5.34 40.19 C 2.71 41.57 2.69 46.22 5.57 47.34 C 7.30 48.11 9.25 47.46 11.06 47.36 C 11.01 47.98 10.90 49.24 10.85 49.86 C 8.24 50.29 5.33 50.62 3.08 48.91 C -1.01 46.00 0.33 38.46 5.37 37.46 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 26.26 37.49 C 29.58 37.90 34.51 36.17 36.37 39.95 C 37.22 42.31 35.65 44.12 34.01 45.57 C 35.20 47.04 36.39 48.51 37.57 49.99 C 36.75 49.97 35.13 49.91 34.31 49.88 C 32.89 47.96 31.57 45.72 29.09 45.06 C 29.04 46.71 29.00 48.35 28.97 50.00 C 28.30 50.00 26.94 50.00 26.27 49.99 C 26.27 45.83 26.27 41.66 26.26 37.49 M 29.01 39.61 C 29.01 40.56 29.00 42.45 29.00 43.39 C 30.55 43.27 32.12 43.25 33.62 42.82 C 34.71 39.61 31.17 39.63 29.01 39.61 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 42.72 41.92 C 40.83 36.54 51.46 35.12 51.71 40.34 C 49.32 39.88 46.66 38.76 44.66 40.81 C 46.87 42.06 49.38 42.84 51.41 44.40 C 52.86 45.78 51.73 47.75 51.53 49.39 C 48.40 50.39 42.61 51.39 42.11 46.78 C 44.76 47.60 47.66 48.33 50.23 46.83 C 47.95 44.89 44.27 44.54 42.72 41.92 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 65.07 37.71 C 68.10 37.55 71.69 36.74 74.31 38.69 C 76.39 40.98 74.91 44.02 72.78 45.61 C 73.95 47.04 75.12 48.47 76.28 49.91 C 75.52 49.94 74.00 49.99 73.24 50.02 C 71.71 48.10 70.42 45.66 67.81 45.06 C 67.77 46.70 67.74 48.35 67.72 49.99 C 67.04 50.00 65.69 50.00 65.01 50.00 C 65.04 45.91 64.86 41.80 65.07 37.71 M 67.75 39.58 C 67.74 40.82 67.74 42.06 67.73 43.30 C 69.29 43.25 70.85 43.20 72.40 43.14 C 72.41 42.32 72.38 41.50 72.33 40.69 C 71.15 39.46 69.27 39.84 67.75 39.58 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 90.00 37.57 C 90.91 37.53 91.82 37.49 92.73 37.46 C 92.73 41.64 92.73 45.82 92.73 49.99 C 92.05 50.00 90.69 50.00 90.00 50.00 C 90.00 45.86 90.00 41.71 90.00 37.57 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 99.33 37.47 C 101.65 37.01 105.61 36.77 105.33 40.21 C 103.63 40.02 101.82 39.08 100.13 39.82 C 97.09 40.62 96.37 45.37 99.00 47.03 C 100.80 48.27 103.07 47.47 105.06 47.36 C 105.01 47.98 104.90 49.24 104.85 49.86 C 102.25 50.28 99.35 50.63 97.10 48.92 C 92.99 46.04 94.31 38.51 99.33 37.47 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 16.91 37.54 C 17.66 37.53 19.17 37.53 19.93 37.53 C 21.62 41.68 23.31 45.84 25.01 50.00 C 24.31 50.00 22.93 50.00 22.24 50.00 C 21.99 49.43 21.50 48.30 21.26 47.73 C 19.38 47.73 17.49 47.72 15.61 47.72 C 15.35 48.29 14.82 49.43 14.56 50.00 C 13.87 50.00 12.49 49.99 11.81 49.99 C 13.51 45.84 15.19 41.68 16.91 37.54 M 18.37 40.10 C 17.69 41.90 17.01 43.70 16.33 45.50 C 17.72 45.51 19.11 45.52 20.50 45.53 C 19.79 43.72 19.08 41.91 18.37 40.10 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 54.00 37.53 C 57.00 37.53 60.00 37.53 63.00 37.54 C 63.00 38.09 63.00 39.18 63.00 39.73 C 60.91 39.73 58.82 39.74 56.73 39.74 C 56.74 40.44 56.74 41.83 56.74 42.53 C 58.65 42.53 60.56 42.53 62.47 42.52 C 62.49 43.07 62.52 44.18 62.53 44.73 C 60.60 44.73 58.67 44.74 56.74 44.74 C 56.74 45.43 56.73 46.82 56.73 47.52 C 58.82 47.53 60.91 47.53 63.00 47.54 C 63.00 48.16 63.00 49.38 63.00 50.00 C 60.00 50.00 57.00 50.00 54.00 50.00 C 54.00 45.84 54.00 41.69 54.00 37.53 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 76.11 37.16 C 76.82 37.32 78.25 37.65 78.96 37.82 C 80.48 40.68 81.24 43.85 82.36 46.87 C 83.53 43.86 84.33 40.68 85.83 37.80 C 86.55 37.66 87.98 37.36 88.69 37.22 C 87.14 41.51 85.41 45.73 83.78 50.00 C 83.08 50.00 81.69 50.00 81.00 50.00 C 79.35 45.73 77.63 41.48 76.11 37.16 Z"/>
                                    <path fill="#000000" opacity="1.00" d=" M 107.24 37.52 C 110.25 37.53 113.26 37.54 116.27 37.54 L 116.27 39.72 C 114.18 39.73 112.09 39.74 109.99 39.74 C 110.00 40.44 110.00 41.84 110.00 42.54 C 111.93 42.53 113.85 42.52 115.78 42.51 C 115.76 43.06 115.73 44.17 115.72 44.72 C 113.81 44.73 111.90 44.74 109.99 44.74 C 110.00 45.44 110.01 46.84 110.02 47.54 C 112.10 47.54 114.19 47.53 116.28 47.53 C 116.27 48.15 116.27 49.38 116.26 50.00 C 113.26 50.00 110.26 50.00 107.26 49.99 C 107.27 45.83 107.28 41.68 107.24 37.52 Z"/>
                                </g>
                            </svg>
                        <?endif;?>
                    </a>
                <?endif?>
                <div class="city_info_right">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'])):?>
                                <div class="city_info_name"><?=$arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'];?></div>
                            <?endif;?>
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'])):?>
                                <div class="city_info_time">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i><?=$arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'];?>
                                </div>
                            <?endif;?>
                        </div>
                        <div class="col-12 col-xl-4">
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'])):?>
                                <div class="city_info_phone"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'];?></div>
                            <?endif;?>
                            <div class="city_info_tooltipe_block">
                                <a href="javascript:void(0);" class="city_info_tooltipe city_info_tooltipe_momey <?if($arItem['DISPLAY_PROPERTIES']['CASH_PAYMENT']['VALUE_XML_ID'] == 'YES'):?>active<?endif;?>" data-toggle="tooltip" data-placement="top" data-offset="8" title="<?=GetMessage("PRV_CONTACTS_LIST_CASH_PAYMENT");?>"><i class="fa fa-money" aria-hidden="true"></i></a>
                                <a href="javascript:void(0);" class="city_info_tooltipe city_info_tooltipe_card <?if($arItem['DISPLAY_PROPERTIES']['CASHLESS_PAYMENT']['VALUE_XML_ID'] == 'YES'):?>active<?endif;?>" data-toggle="tooltip" data-placement="top" data-offset="8" title="<?=GetMessage("PRV_CONTACTS_LIST_CASHLESS_PAYMENT");?>"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?if(!empty($arItem['DISPLAY_PROPERTIES']['LATITUDE']['VALUE']) && !empty($arItem['DISPLAY_PROPERTIES']['LONGITUDE']['VALUE'])):?>
                <script>
                    markerArray.push({
                        coord: [<?=$arItem['DISPLAY_PROPERTIES']['LATITUDE']['VALUE'];?>, <?=$arItem['DISPLAY_PROPERTIES']['LONGITUDE']['VALUE'];?>],
                        address: '<?=$arItem['DISPLAY_PROPERTIES']['ADDRESS']['VALUE'];?>',
                        time: '<?=$arItem['DISPLAY_PROPERTIES']['WORKTIME']['VALUE'];?>',
                        phone: '<?=$arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'];?>'
                    });
                </script>
            <?endif;?>
        </div>
    <?}*/?>
</div>