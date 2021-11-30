<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"main_search", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PAGE_RESULT_COUNT" => "20",
		"RESTART" => "Y",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "Y",
		"USE_TITLE_RANK" => "Y",
		"arrFILTER" => array(
			0 => "iblock_prv_autoservice_articles",
			1 => "iblock_prv_autoservice_about",
			2 => "iblock_prv_autoservice_services",
		),
		"COMPONENT_TEMPLATE" => "main_search",
		"arrFILTER_iblock_prv_autoservice_articles" => array(
			0 => "all",
		),
		"arrFILTER_iblock_prv_autoservice_about" => array(
			0 => "all",
		),
		"arrFILTER_iblock_prv_autoservice_services" => array(
			0 => "all",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>