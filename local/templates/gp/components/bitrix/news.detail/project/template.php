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

//die('<pre>' . print_r($arResult, TRUE) . '</pre>');

if($arResult['DETAIL_PICTURE']['SRC']){
 $GLOBALS['gpOfProject'] = "<img alt='GP' src='{$arResult['DETAIL_PICTURE']['SRC']}' data-initialWidth='{$arResult['DETAIL_PICTURE']['WIDTH']}' data-initialHeight ='{$arResult['DETAIL_PICTURE']['HEIGHT']}'>";
}
$GLOBALS['logotypeOfProject'] = "<img alt='logotype' src='{$arResult['PREVIEW_PICTURE']['SRC']}'>";
$GLOBALS['descriptionOfProject'] = $arResult['~PREVIEW_TEXT'];

if(!isset($arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][0])){
 $aA = $arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'];
 unset($arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE']);
 $arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][] = $aA;
 unset($aA);
}
foreach($arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'] AS $k => $v){
 if($k === 0 OR $k > 2){ continue; }
 $GLOBALS['aPicturesOfProject'][] = /*$arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE'][*/$v['SRC'];
}