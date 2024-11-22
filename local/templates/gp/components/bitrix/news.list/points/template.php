<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== TRUE) die();
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
$this->setFrameMode(true);

//die('<pre> >' . print_r($arResult['ITEMS'], TRUE) . '</pre>');

foreach($arResult['ITEMS'] AS $arItem){
 $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
 $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

 $a_ = explode('/', $arItem['DETAIL_PAGE_URL']);
 if($arItem['DISPLAY_PROPERTIES']['bindingToProject']['LINK_ELEMENT_VALUE'][$arItem['DISPLAY_PROPERTIES']['bindingToProject']['VALUE']]['CODE'] != $a_[0]){ continue; }
 if(isset($a_[1]) AND strtolower($arItem['DISPLAY_PROPERTIES']['bindingToPlant']['LINK_ELEMENT_VALUE'][$arItem['DISPLAY_PROPERTIES']['bindingToPlant']['VALUE']]['CODE']) != $a_[1]){ continue; }

 if($arItem['DISPLAY_PROPERTIES']['polygonPoints']['VALUE'] != ''){
  $polygons .= "<polygon picture='{$arItem['DISPLAY_PROPERTIES']['gp_picture']['FILE_VALUE']['SRC']}' id='{$arItem['DISPLAY_PROPERTIES']['bindingToPlant']['VALUE']}' points='{$arItem['DISPLAY_PROPERTIES']['polygonPoints']['VALUE']}' />";
 } elseif(
  $arItem['DISPLAY_PROPERTIES']['cx']['VALUE'] != '' AND
  $arItem['DISPLAY_PROPERTIES']['cy']['VALUE'] != '' AND
  $arItem['DISPLAY_PROPERTIES']['rectWidth']['VALUE'] != '' AND
  $arItem['DISPLAY_PROPERTIES']['rectHeight']['VALUE'] != ''
 ){
  $rects .= "<rect picture='{$arItem['DISPLAY_PROPERTIES']['gp_picture']['FILE_VALUE']['SRC']}' id='{$arItem['DISPLAY_PROPERTIES']['bindingToPlant']['VALUE']}' x='{$arItem['DISPLAY_PROPERTIES']['cx']['VALUE']}' y='{$arItem['DISPLAY_PROPERTIES']['cy']['VALUE']}' width='{$arItem['DISPLAY_PROPERTIES']['rectWidth']['VALUE']}' height='{$arItem['DISPLAY_PROPERTIES']['rectHeight']['VALUE']}' />";
 }/* elseif(
  $arItem['DISPLAY_PROPERTIES']['cx']['VALUE'] != '' AND
  $arItem['DISPLAY_PROPERTIES']['cy']['VALUE'] != ''
 ){
  $circles .= "<circle data-id='{$arItem['DISPLAY_PROPERTIES']['bindingToPlant']['VALUE']}' data-cx='{$arItem['DISPLAY_PROPERTIES']['cx']['VALUE']}' data-cy='{$arItem['DISPLAY_PROPERTIES']['cy']['VALUE']}' data-r='16' />";
 }*/

 $GLOBALS['aPlants'][] = $arItem['DISPLAY_PROPERTIES']['bindingToPlant']['VALUE'];
}
$GLOBALS['polygons8rects'] .= "{$polygons}{$rects}";