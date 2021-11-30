<?include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("PRV_404_ERROR_HEADER"));
$APPLICATION->SetDirProperty("section_background", "404.png");
$APPLICATION->SetDirProperty("leftmenu", "N");
?>
<div class="content_404_container">
    <div class="content_404_error text-center">
        404	<span class="content_404_error_text"><?=GetMessage('PRV_404_ERROR_MAIN_TEXT')?></span>
    </div>
    <div class="content_404_error_detail text-center">
        <?=GetMessage('PRV_404_ERROR_DETAIL_TEXT')?>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>