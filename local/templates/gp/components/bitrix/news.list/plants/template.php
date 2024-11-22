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

 if($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']){
  //< GP_AREAS to array
  if($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']['ID']){
   $A = $arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']; unset($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']);
   $arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'][0] = $A;
   unset($A);
  }
  //> GP_AREAS to array

  //< GP_PICTURES to array
  if($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']['ID']){
   $A = $arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']; unset($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']);
   $arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][0] = $A;
   unset($A);
  }

/*
  if(!isset($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'])){
   $arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'] = [];
  }
  if(!isset($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'])){
   $arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'] = [];
  }
  $A = count($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']) - count($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']);
  if($A < 0){
   $aA = $arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']; unset($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']);
   $arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'] = array_fill(count($aA), $A, $aA[0]);
  }
  unset($A, $aA);
*/
  //> GP_PICTURES to array


  foreach($arItem['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'] as $v){
   if($v['ORIGINAL_NAME'] === "{$arItem['DETAIL_PAGE_URL']}.svg"){
    //< Метки на генплане
    $svg = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/' . $v['SRC'] );
    #
    $a_ = Array(
     "\t" => '',
     "\r\n" => ''
    );
    $svg = strtr($svg, $a_);
    #
    $svg = preg_replace('#[ ]{2,}#', ' ', $svg);
    $svg = str_replace('> <', '><', $svg);
    $a_SVG = explode('><', trim( $svg ) );
    unset($svg);
    //$i = 0;
    foreach($a_SVG as $kk => $vv){ if($kk == 0 OR $kk == count($a_SVG) - 1){ continue; }
     $vv = trim( str_replace('/', '', $vv) );
     if(
      stripos($vv, 'circle') !== FALSE /*OR
      !isset($arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][$i]['SRC'])*/
     ){
      $svg .= "<{$vv} id='{$arItem['ID']}' picture='{$arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][0]['SRC']}' />";
     } /*else{
      $i++;
      $svg .= "<{$vv} id='{$arItem['ID']}' picture='{$arItem['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][$i]['SRC']}' />";
     }*/
    } //unset($i);

    $GLOBALS['circles'] .= $svg;
    //> Метки на генплане

    //< Заголовки
    $href = strtolower("/{$arItem['DETAIL_PAGE_URL']}/" . str_replace(' ', '-', $arItem['CODE']));
    $aB[$arItem['DISPLAY_PROPERTIES']['SEGMENTATION']['VALUE']][] = "<a href='{$href}' data-id='{$arItem['ID']}'>{$arItem['NAME']}</a>";
    //> Заголовки
   }
  }
 }
}

if(isset($aB)){ //die('<pre> >' . print_r($aB, TRUE) . '</pre>');
 foreach($aB as $k => $aV){
  $k = str_replace('во', 'вья', $k);
  $k = str_replace('ик', 'ики', $k);
  $B .= "<div>\r\n <h3>{$k}</h3>\r\n <div>";
  foreach($aV as $v){ $B .= $v; }
  $B .= " </div>\r\n</div>\r\n";
 }

 $GLOBALS['plantsList'] = $B;
}