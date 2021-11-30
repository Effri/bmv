<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION; 
 
if(CModule::IncludeModule("iblock"))
{
    $IBLOCK_ID = "18";
    $arOrder = Array("SORT"=>"ASC");
    $arSelect = Array("ID", "NAME", "SECTION_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
    $res = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);

    $aMenuLinksExt = array();
    while($arFields = $res->GetNext())
    { 
        $aMenuLinksExt[] = Array(
            $arFields['NAME'],
            $arFields['SECTION_PAGE_URL'],
            Array(),
            Array(),
            ""
        );
    }

}
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
