<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
 <?/*$APPLICATION->IncludeComponent(
	"bitrix:news",
	"brands",
	Array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "brands",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"DETAIL_TEXT",3=>"DETAIL_PICTURE",4=>"PREVIEW_PICTURE",5=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"MODELS",1=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "prv_autoservice_articles",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"",1=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "navigator",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => SITE_DIR."modeli/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"","section"=>"","detail"=>"#ELEMENT_CODE#/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "Y",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N"
	)
);*/?><br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"modeli", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_SHOW_VIEWED" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "prv_autoservice_articles",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "N",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "2",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"TEMPLATE_THEME" => "blue",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_STORE" => "N",
		"COMPONENT_TEMPLATE" => "modeli",
		"SEF_FOLDER" => "/modeli/",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><br>
<? /* <hr>
    <div class="series container">
        <div class="w row">
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="1-series" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">1</span> <span class="sr">серия</span> </span> <img alt="1" src="/local/templates/autoservice.neon/local/img/bmw_1_5.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="1-series/f20" class="model">
                                F20 </a> </li>
                        <li class="inline_block"> <a href="1-series/e87" class="model">
                                E87 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="3-series" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">3</span> <span class="sr">серия</span> </span> <img alt="3" src="/local/templates/autoservice.neon/local/img/bmw_3_2.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="3-series/e90" class="model">
                                E90 </a> </li>
                        <li class="inline_block"> <a href="3-series/f30" class="model">
                                F30 </a> </li>
                        <li class="inline_block"> <a href="3-series/e92" class="model">
                                E92 </a> </li>
                        <li class="inline_block"> <a href="3-series/f80" class="model">
                                F80 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="5-series" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">5</span> <span class="sr">серия</span> </span> <img alt="5" src="/local/templates/autoservice.neon/local/img/bmw_5_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="5-series/e60" class="model">
                                E60 </a> </li>
                        <li class="inline_block"> <a href="5-series/f10" class="model">
                                F10 </a> </li>
                        <li class="inline_block"> <a href="5-series/g30" class="model">
                                G30 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="7-series" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">7</span> <span class="sr">серия</span> </span> <img alt="7" src="/local/templates/autoservice.neon/local/img/bmw_7_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="7-series/e65" class="model">
                                E65 </a> </li>
                        <li class="inline_block"> <a href="7-series/f01" class="model">
                                F01 </a> </li>
                        <li class="inline_block"> <a href="7-series/g11" class="model">
                                G11 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="x1" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">X1</span> <span class="sr">серия</span> </span> <img alt="X1" src="/local/templates/autoservice.neon/local/img/bmw_x1_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="x1/e84" class="model">
                                E84 </a> </li>
                        <li class="inline_block"> <a href="x1/f48" class="model">
                                F48 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="x3" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">X3</span> <span class="sr">серия</span> </span> <img alt="X3" src="/local/templates/autoservice.neon/local/img/bmw_x3_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="x3/e83" class="model">
                                E83 </a> </li>
                        <li class="inline_block"> <a href="x3/f25" class="model">
                                F25 </a> </li>
                        <li class="inline_block"> <a href="x3/g01" class="model">
                                G01 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="x5" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">X5</span> <span class="sr">серия</span> </span> <img alt="X5" src="/local/templates/autoservice.neon/local/img/bmw_x5_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="x5/e53" class="model">
                                E53 </a> </li>
                        <li class="inline_block"> <a href="x5/e70" class="model">
                                E70 </a> </li>
                        <li class="inline_block"> <a href="x5/f15" class="model">
                                F15 </a> </li>
                        <li class="inline_block"> <a href="x5/f85" class="model">
                                F85 </a> </li>
                    </ul>
                </div>
            </div>
            <div class="series_item col-12 col-sm-6 col-md-4 brands_list_block">
                <div>
                    <a href="x6" class="series_item_icon"> <span class="series_name"> <span class="bmw bold">BMW</span> <span class="bold series_number">X6</span> <span class="sr">серия</span> </span> <img alt="X6" src="/local/templates/autoservice.neon/local/img/bmw_x6_1.png" border="0"> </a>
                </div>
                <div class="models">
                    <ul>
                        <li class="inline_block"> <a href="x6/e71" class="model">
                                E71 </a> </li>
                        <li class="inline_block"> <a href="x6/f16" class="model">
                                F16 </a> </li>
                        <li class="inline_block"> <a href="x6/f86" class="model">
                                F86 </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> */?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>