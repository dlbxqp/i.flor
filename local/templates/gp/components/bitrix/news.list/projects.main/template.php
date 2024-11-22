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
?>
<div>
<?
foreach($arResult['ITEMS'] AS $arItem){
 $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
 $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

 if(!isset($arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0])){ $arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0] = $arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE']; }
 $A = <<<HD
<img alt='{$arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0]['ALT']}' src='{$arItem['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0]['SRC']}'>
<h6 title='{$arItem['CODE']}'>{$arItem['NAME']}</h6>

HD;
 //if($arItem['DETAIL_PICTURE']['SRC'] != ''){
  echo " <a href='{$arItem['DETAIL_PAGE_URL']}'>{$A}</a>";
 //} else{
 // echo " <div>{$A}</div>";
 //}
}
?>
</div>