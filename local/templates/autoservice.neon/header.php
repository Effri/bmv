<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<html lang="<?=LANGUAGE_ID;?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="<?=SITE_CHARSET;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?=SITE_DIR;?>favicon.ico" type="image/x-icon">

        
    <script type="text/javascript">
		prv_cancel = "<?=GetMessage('PRV_CANCEL')?>";
		prv_choose = "<?=GetMessage('PRV_CHOOSE')?>";
	</script>

    
    <?$APPLICATION->ShowHead();
    
    use Bitrix\Main\Page\Asset;
    
    $arJsConfig = array(
        "jquery3" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/js/jquery-3.3.1.min.js"
        ),
        "popper" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/js/popper.min.js",              
            "rel" => array('jquery3')
        ),
        "bootstrap" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/js/bootstrap.min.js",
            "css" => array(
                SITE_TEMPLATE_PATH . "/local/css/bootstrap.min.css"
            ),                
            "rel" => array('jquery3', 'popper')
        ),
        "owlcarousel" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/owlcarousel/owl.carousel.min.js",
            "css" => array(
                SITE_TEMPLATE_PATH . "/local/owlcarousel/owl.theme.default.min.css",
                SITE_TEMPLATE_PATH."/local/owlcarousel/owl.carousel.min.css"
            ),                
            "rel" => array('jquery3')
        ),
        "swipe" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/js/jquery.touchSwipe.min.js"
        ),
        "spectrum" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/spectrum-master/spectrum.js",
            "css" => array(
                SITE_TEMPLATE_PATH . "/local/spectrum-master/spectrum.css"
            ),                
            "rel" => array('jquery3')
        ),
        "scroll" => array(
            "js"  => SITE_TEMPLATE_PATH . "/local/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js",
            "css" => array(
                SITE_TEMPLATE_PATH . "/local/mCustomScrollbar/jquery.mCustomScrollbar.min.css"
            ),                
            "rel" => array('jquery3')
        ),
        "PRVScript" => array(
            "js"  => SITE_TEMPLATE_PATH."/local/js/script.js",
            "rel" => array('jquery3', 'bootstrap', 'owlcarousel', 'swipe', "spectrum", "scroll")
        )
    );
    foreach ($arJsConfig as $ext => $arExt) { 
        CJSCore::RegisterExt($ext, $arExt);
    }
    
    CJSCore::Init(array('PRVScript'));
    
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/local/fontawesome/css/font-awesome.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/local/css/fonts.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/local/css/style.css");
    
    if ($section_php = $APPLICATION->GetFileRecursive(".section.php")) { 
        @include($_SERVER['DOCUMENT_ROOT'].$section_php);
        $APPLICATION->SetTitle($sSectionName);
    } else {
        $APPLICATION->SetTitle(GetMessage('PRV_TITLE'));
    }
    ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


      <title><?$APPLICATION->ShowTitle();?></title>
</head>

<body>
    <?$APPLICATION->ShowPanel();?>
        
    <?
    if(!empty($_POST['template_options_submit'])){
        if(!empty($_POST['color'])){
            COption::SetOptionString("prvolga.autoservice", "color_neon", $_POST['color']);
        } elseif(!empty($_POST['custom_color'])) {
            COption::SetOptionString("prvolga.autoservice", "color_neon", $_POST['custom_color']);
        }
        
        if(empty($_POST['float'])) {
            COption::SetOptionString("prvolga.autoservice", "float_neon", false);
        } else {
            COption::SetOptionString("prvolga.autoservice", "float_neon", true);
        }
        
        if(empty($_POST['video_no_slider'])) {
            COption::SetOptionString("prvolga.autoservice", "video_no_slider_neon", false);
        } else {
            COption::SetOptionString("prvolga.autoservice", "video_no_slider_neon", true);
        }
        
        LocalRedirect($APPLICATION->GetCurPage());
	}
    
    $float              = COption::GetOptionString("prvolga.autoservice", "float_neon", true);
    $video_no_slider    = COption::GetOptionString("prvolga.autoservice", "video_no_slider_neon", true);
    $color              = COption::GetOptionString("prvolga.autoservice", "color_neon", '#FFD700');
	$flagColor          = false;
    
    $path_to_page = str_replace(SITE_DIR, "", $APPLICATION->GetCurPage());
	?>
	
	<style type="text/css">
		:root{
			--prvcolor: <?=$color?>;
		}
	</style>
    <div class="white_container">
    <section id="header">
        <div class="container">   
            <nav class="navbar navbar-expand-lg justify-content-between">
                <a class="navbar-brand" href="<?=SITE_DIR;?>">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/inc/logo.php"
                        )
                    );?>
                </a>
                <div class="descriptor">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/inc/descriptor.php"
                        )
                    );?>
                </div>
                <div class="header_info">
                    <div class="header_icon d-none d-lg-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="29" viewBox="0 0 21 29">
                            <path fill="var(--prv_blue_color)" d="M917.5,37A10.513,10.513,0,0,0,907,47.5c0,7.187,9.4,17.738,9.8,18.183a0.945,0.945,0,0,0,1.407,0c0.4-.445,9.8-11,9.8-18.183A10.513,10.513,0,0,0,917.5,37Zm0,26.6c-3.163-3.757-8.609-11.17-8.609-16.1a8.609,8.609,0,1,1,17.218,0C926.109,52.434,920.663,59.846,917.5,63.6Zm0-21.387a5.284,5.284,0,1,0,5.283,5.284A5.289,5.289,0,0,0,917.5,42.217Zm0,8.677a3.393,3.393,0,1,1,3.392-3.393A3.4,3.4,0,0,1,917.5,50.894Z" transform="translate(-907 -37)"/>
                        </svg>
                    </div>
                    <a target="_blank" href="https://yandex.ru/maps/2/saint-petersburg/?ll=30.378787%2C59.922953&mode=routes&rtext=~59.922978%2C30.377930&rtt=auto&ruri=~&z=18" class="header_text d-none d-lg-block">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/inc/header_addr.php"
                            )
                        );?>
                    </a>
                    <div class="header_icon d-none d-lg-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                            <path fill="var(--prv_blue_color)" d="M980.8,44.157A14.992,14.992,0,1,0,961.152,63.8a14.583,14.583,0,0,0,5.823,1.2A14.973,14.973,0,0,0,980.8,44.157Zm-2.394,12.457a13.176,13.176,0,0,1-4.822,4.808,12.919,12.919,0,0,1-6.61,1.772,12.687,12.687,0,0,1-5.118-1.051,12.892,12.892,0,0,1-7-7.023,13.282,13.282,0,0,1,.722-11.734,13.17,13.17,0,0,1,4.806-4.809,13.178,13.178,0,0,1,13.2,0,13.2,13.2,0,0,1,4.823,4.809,12.83,12.83,0,0,1,1.771,6.6A12.962,12.962,0,0,1,978.408,56.613Zm-10.481-6.762v-8.5a0.946,0.946,0,0,0-.952-0.919,0.925,0.925,0,0,0-.9.919v8.632a0.757,0.757,0,0,1,.033.131,0.857,0.857,0,0,0,.246.739l4.9,4.907a0.931,0.931,0,0,0,1.262,0,0.883,0.883,0,0,0,0-1.279Z" transform="translate(-952 -35)"/>
                        </svg>
                    </div>
                    <div class="header_text d-none d-lg-block">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/inc/header_work_time.php"
                            )
                        );?>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#callbackModal" class="header_callback">
                        <div class="header_callback_number d-none d-sm-block">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/inc/header_phone.php"
                                )
                            );?>
                        </div>
                        <div class="header_callback_text d-none d-sm-block"><?=GetMessage('PRV_HEADER_FEEDBACK')?></div>
                        <div class="header_callback_icon d-block d-sm-none"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    </a>
                </div>
            </nav>
        </div>
    </section>
    
    <section id="top_menu_section" class="sticky-top">
        <div class="container navbar_top_container"> 
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top_menu",
                Array(
                    "ROOT_MENU_TYPE" => "top", 
                    "MAX_LEVEL" => "2", 
                    "CHILD_MENU_TYPE" => "left", 
                    "USE_EXT" => "Y" 
                )
            );?>
            
            <div class="search_float_container" style="display:none;">
                <?$APPLICATION->IncludeComponent(
                    "prvolga.autoservice:search.dynamic", 
                    "head_search", 
                    array(
                        "COMPONENT_TEMPLATE" => "head_search",
                        "NUM_CATEGORIES" => "1",
                        "TOP_COUNT" => "5",
                        "ORDER" => "date",
                        "USE_LANGUAGE_GUESS" => "Y",
                        "CHECK_DATES" => "N",
                        "SHOW_OTHERS" => "N",
                        "PAGE" => "#SITE_DIR#search/",
                        "SHOW_INPUT" => "Y",
                        "INPUT_ID" => "head_search_input",
                        "CONTAINER_ID" => "head_search_container",
                        "PRICE_CODE" => array(
                        ),
                        "PRICE_VAT_INCLUDE" => "Y",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "SHOW_PREVIEW" => "Y",
                        "PREVIEW_WIDTH" => "75",
                        "PREVIEW_HEIGHT" => "75",
                        "CATEGORY_0_TITLE" => "",
                        "CATEGORY_0" => array(
                            0 => "iblock_prv_autoservice_articles",
                            1 => "iblock_prv_autoservice_about",
                            2 => "iblock_prv_autoservice_services",
                        ),
                        "CATEGORY_0_iblock_prv_autoservice_articles" => array(
                            0 => "all",
                        ),
                        "CATEGORY_0_iblock_prv_autoservice_about" => array(
                            0 => "all",
                        ),
                        "CATEGORY_0_iblock_prv_autoservice_services" => array(
                            0 => "all",
                        ),
                    ),
                    false
                );?>
            </div>
            
            <?if($USER->IsAdmin()):?>
                <div class="color_switcher">
                    <div class="cs_header">
                        <span class="switch">
                            <svg id="Options.svg" xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24">
                                <defs>
                                  <style>
                                    .cls-2 {
                                      fill: #e3e5e6;
                                      fill-rule: evenodd;
                                    }
                                  </style>
                                </defs>
                                <path id="Ellipse_12_copy_2" data-name="Ellipse 12 copy 2" class="cls-2" d="M743,214H732.858a3.981,3.981,0,0,1-7.717,0H723a1,1,0,1,1,0-2h2.141a3.981,3.981,0,0,1,7.717,0H743A1,1,0,1,1,743,214Zm-14-3a2,2,0,1,0,2,2A2,2,0,0,0,729,211Zm14-5h-2.142a3.981,3.981,0,0,1-7.717,0H723a1,1,0,0,1,0-2h10.141a3.981,3.981,0,0,1,7.717,0H743A1,1,0,0,1,743,206Zm-6-3a2,2,0,1,0,2,2A2,2,0,0,0,737,203Zm-14,17h10.141a3.982,3.982,0,0,1,7.717,0H743a1,1,0,0,1,0,2h-2.142a3.982,3.982,0,0,1-7.717,0H723A1,1,0,0,1,723,220Zm14,3a2,2,0,1,0-2-2A2,2,0,0,0,737,223Z" transform="translate(-722 -201)"></path>
                            </svg>
                        </span>
                        <?=GetMessage('PRV_OPTIONS')?>
                    </div>
                    <div class="cs_scroll_container">
                        <div class="cs_body">
                            <form name="form1" method="POST" action="<?=POST_FORM_ACTION_URI?>">
                                <label class="cs_label"><?=GetMessage('PRV_COLOR_SCHEME')?></label>

                                <label class="cs_color"><input name="color" type="radio" value="#ffe505" <?if($color=='#ffe505'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#b71b1c" <?if($color=='#b71b1c'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#d60c1a" <?if($color=='#d60c1a'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#558a2e" <?if($color=='#558a2e'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#c6ff00" <?if($color=='#c6ff00'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#28b6f6" <?if($color=='#28b6f6'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#2a62ff" <?if($color=='#2a62ff'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#ab46bc" <?if($color=='#ab46bc'): $flagColor = true;?>checked<?endif;?>></label>
                                <label class="cs_color"><input name="color" type="radio" value="#d81a60" <?if($color=='#d81a60'): $flagColor = true;?>checked<?endif;?>></label>
                                <input type="color" name="custom_color" value="<?=$color;?>" class="cs_color_custom <?if(!$flagColor):?>active<?endif;?>">
                                <div class="cs_hr"></div>
                                <label class="cs_label">
                                    <input name="video_no_slider" id="video_no_slider" class="hidden_options_checkbox" type="checkbox" value="YES" <?if($video_no_slider):?>checked<?endif;?>>
                                    <div>
                                        <?=GetMessage('PRV_VIDEO_NO_SLIDER')?>
                                        <br>
                                        <small><?=GetMessage('PRV_VIDEO_NO_SLIDER_DESCRIPTION')?></small>
                                    </div>
                                </label>
                                <div class="cs_hr"></div>
                                <label class="cs_label">
                                    <input name="float" id="float" class="hidden_options_checkbox" type="checkbox" value="YES" <?if($float):?>checked<?endif;?>>
                                    <div>
                                        <?=GetMessage('PRV_FLOAT')?>
                                        <br>
                                        <small><?=GetMessage('PRV_FLOAT_DESCRIPTION')?></small>
                                    </div>
                                </label>
                                <input type="submit" value="<?=GetMessage('PRV_APPLY_SETTINGS')?>" name="template_options_submit" class="cs_apply">
                            </form>
                        </div>
                    </div>
                </div>    
            <?endif;?>
        </div>
    </section>
    <div class="top_menu_bottom_margin"></div>
    
    <?if(!empty(str_replace(SITE_DIR, "", $APPLICATION->GetCurPage()))):?>
        <div class="top_title_block" <?$APPLICATION->AddBufferContent('ShowSectionBG');?>>
            <?if($float):?>
                <div class="container">
                    <h1 class="top_title_header"><?$APPLICATION->ShowTitle();?></h1>
                    <div class="top_title_breadcrumbs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb", 
                            ".default", 
                            array(
                                "START_FROM" => "0",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => "",
                                "SITE_ID" => "br"
                            ),
                            false
                        );?>
                    </div>
                    <? global $APPLICATION;
                    $TEXT_TOP_CATALOG = $APPLICATION->GetDirProperty("TEXT_TOP_CATALOG");
                    if($TEXT_TOP_CATALOG){?>
                    <div class="text-top-catalog"><?=$TEXT_TOP_CATALOG?></div>
                      <?}?>
                </div>
            <?endif;?>
        </div>
        <div class="container">
            <?$APPLICATION->AddBufferContent('ShowLeftMenuHeader');?>
                        <div class="right_block_container <?if($float):?>float_block<?endif;?>">
                            <?if(!$float):?>
                                <div class="nofloat_top_title_block">
                                    <h1 class="top_title_header"><?$APPLICATION->ShowTitle();?></h1>
                                    <div class="top_title_breadcrumbs">
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:breadcrumb", 
                                            ".default", 
                                            array(
                                                "START_FROM" => "0",
                                                "COMPONENT_TEMPLATE" => ".default",
                                                "PATH" => "",
                                                "SITE_ID" => "br"
                                            ),
                                            false
                                        );?>
                                    </div>

                                </div>
                            <?endif;?>
    <?else:
        if($video_no_slider):?>
            <div class="main_slider_owl">  
                <div class="item_video_block">
                    <video autoplay="autoplay" loop="loop" preload="auto" id="video-background" muted="">
                        <source src="<?=SITE_DIR;?>section_background_img/video_background.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        <?else:
            $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_slider", 
	array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "prv_autoservice_about",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "BUTTON_TEXT",
			1 => "BUTTON_LINK",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_slider"
	),
	false
);
        endif;?>
    <?endif;?>