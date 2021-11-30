<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
while($ob = $res->GetNextElement()){
  $arFields = $ob->GetFields();
  $arResult['ITEMS'][$arFields['IBLOCK_SECTION_ID']][] = $arFields;
}
?>