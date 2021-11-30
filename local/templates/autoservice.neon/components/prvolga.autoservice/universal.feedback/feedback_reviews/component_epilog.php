<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
    die();

$arJsConfig = array(
    /*"jquery3"       => array(
        "js"  => $templateFolder . "/js/jquery-3.2.0.min.js"
    ),*/
    "maskedinput"   => array(
		"js"  => $templateFolder . "/js/jquery.maskedinput.min.js",
		"rel" => array("jquery3")
	),
    "validation" => array(
       "js"  => array(
           $templateFolder . "/js/jquery.validate.min.js",
           $templateFolder . "/js/localization/messages_ru.min.js"
       ),
       "rel" => array('jquery3', 'maskedinput')
    ),
    "PRVUniversalFeedbackFormInit" => array(
        "js"  => $templateFolder . "/js/init.js",
        "rel" => array('jquery3', 'maskedinput', 'validation')
    )
);
foreach ($arJsConfig as $ext => $arExt) { 
    CJSCore::RegisterExt($ext, $arExt);
}
CJSCore::Init(array("PRVUniversalFeedbackFormInit"));
?>