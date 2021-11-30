<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
    die();
use Bitrix\Main\Page\Asset;

$arJsConfig = array(
    "jquery3" => array(
        "js"  => $templateFolder . "/jquery-3.2.0.min.js"
    ),
    "slick" => array(
        "js"  => $templateFolder . "/slick/slick.min.js",
        "css" => array(
            $templateFolder . "/slick/slick.css", 
            $templateFolder . "/slick/slick-theme.css"
        ),
        "rel" => array('jquery3')
    ),
    "mCustomScrollbar" => array(
        "js"  => $templateFolder . "/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js",
        "css" => $templateFolder . "/mCustomScrollbar/jquery.mCustomScrollbar.min.css", 
        "rel" => array('jquery3')
    ),
    "PRVclip" => array(
        "js"  => $templateFolder . "/clip.js",
        "rel" => array('jquery3')
    ),
    "PRVslider" => array(
        "js"  => $templateFolder . "/slider.js",
        "rel" => array('jquery3', 'slick')
    ),
    "PRVscroll" => array(
        "js"  => $templateFolder . "/scroll.js",
        "rel" => array('jquery3', 'mCustomScrollbar')
    )
);
foreach ($arJsConfig as $ext => $arExt) { 
    CJSCore::RegisterExt($ext, $arExt);
}
    
if (!empty($arParams['lenght'])) {    
    Asset::getInstance()->addString('<script type="text/javascript">var PRVDots = "...",  PRVCaptionLenght = ' . $arParams['lenght'] . ';</script>');
    CJSCore::Init(array("PRVclip"));
}

if ($arParams['type'] == 'carusel') {        
    Asset::getInstance()->addString('<script type="text/javascript">var PRVInlineCount = ' . $arParams['inline'] . ';</script>');
    CJSCore::Init(array("PRVslider"));
} elseif ($arParams['overflow'] == 'scroll') {
    CJSCore::Init(array("PRVscroll"));
}
?>