<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
1111<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","services_list",
Array(
        "VIEW_MODE" => "TILE",
        "SHOW_PARENT_NAME" => "N",
        "IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "prv_autoservice_services",
        "SECTION_ID" => '',
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "N",
        "COUNT_SECTIONS" => "",
        "TOP_DEPTH" => "1",
        "SECTION_FIELDS" => array(
			0 => "CODE",
			1 => "NAME",
			3 => "PICTURE",
			4 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_PRICE",
			1 => "",
		),
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "Y"
    )		
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>