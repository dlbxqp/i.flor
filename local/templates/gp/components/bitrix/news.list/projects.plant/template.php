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

//die('<pre>' . print_r($arResult['ITEMS'], TRUE) . '</pre>');

foreach($arResult['ITEMS'] AS $arItem){
 $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
 $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

 $a_ = explode('/', $arItem['DETAIL_PAGE_URL']);
 if(strtolower($arItem['CODE']) === $a_[0]){
  //$A .= "<strong>{$arItem['NAME']}</strong>";

  if($arItem['DETAIL_PICTURE']['SRC']){
   $GLOBALS['gpOfProject'] = "<img alt='GP' src='{$arItem['DETAIL_PICTURE']['SRC']}' data-initialWidth='{$arItem['DETAIL_PICTURE']['WIDTH']}' data-initialHeight ='{$arItem['DETAIL_PICTURE']['HEIGHT']}'>";
  }
 } //else{
  if(!isset($arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0])){ $arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0] = $arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE']; }
  $A .= <<<HD
<a href='/{$arItem['CODE']}/'>
 <img alt='i' src='{$arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0]['SRC']}'>
 <h6>{$arItem['NAME']}</h6>
</a>

HD;
 //}
}

$GLOBALS['currentsProjectsList'] = $A;