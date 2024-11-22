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
?>

<section id='description'>
 <h2><?=$arResult['NAME']?></h2>
 <div>
  <div>
   <img alt='<?=$arResult['NAME']?>' src='<?=$arResult['PREVIEW_PICTURE']['SRC']?>'>
  </div>
  <div>
   <div id='text'>
    <div><b><?=$arResult['CODE']?></b></div>
<?
if($arResult['DISPLAY_PROPERTIES']['FAMILY']){
 echo <<<HD
<div>
 <strong>{$arResult['DISPLAY_PROPERTIES']['FAMILY']['NAME']}</strong>
{$arResult['DISPLAY_PROPERTIES']['FAMILY']['VALUE']}
</div>

HD;
}
if($arResult['DISPLAY_PROPERTIES']['ORIGIN']){
 echo <<<HD
<div>
 <strong>{$arResult['DISPLAY_PROPERTIES']['ORIGIN']['NAME']}</strong>
{$arResult['DISPLAY_PROPERTIES']['ORIGIN']['VALUE']}
</div>

HD;
}
if($arResult['DISPLAY_PROPERTIES']['BOTANICAL_DESCRIPTION']){
 echo <<<HD
<div>
 <strong>{$arResult['DISPLAY_PROPERTIES']['BOTANICAL_DESCRIPTION']['NAME']}</strong>
{$arResult['DISPLAY_PROPERTIES']['BOTANICAL_DESCRIPTION']['~VALUE']['TEXT']}
</div>

HD;
}
if($arResult['DISPLAY_PROPERTIES']['GROWTH_CONDITIONS_AND_PREFERENCES']){
 echo <<<HD
<div class='yellow'>
 <strong>{$arResult['DISPLAY_PROPERTIES']['GROWTH_CONDITIONS_AND_PREFERENCES']['NAME']}</strong>
{$arResult['DISPLAY_PROPERTIES']['GROWTH_CONDITIONS_AND_PREFERENCES']['~VALUE']['TEXT']}
</div>

HD;
}
if($arResult['DISPLAY_PROPERTIES']['USAGE']){
 echo <<<HD
<div class='yellow'>
 <strong>{$arResult['DISPLAY_PROPERTIES']['USAGE']['NAME']}</strong>
{$arResult['DISPLAY_PROPERTIES']['USAGE']['~VALUE']['TEXT']}
</div>

HD;
}
if($arResult['DISPLAY_PROPERTIES']['IMPORTANT']){
 echo <<<HD
<div id='important'>
 <div>!</div>
 <div>{$arResult['DISPLAY_PROPERTIES']['IMPORTANT']['~VALUE']['TEXT']}</div>
</div>

HD;
}
?>
   </div>
   <div id='fragments'>
<?
if(is_array($arResult['DISPLAY_PROPERTIES']['PART_PICTURES']['FILE_VALUE'])){
 foreach($arResult['DISPLAY_PROPERTIES']['PART_PICTURES']['FILE_VALUE'] as $v){
  $a_ = explode('.', $v['ORIGINAL_NAME']);
  $extension = array_pop($a_);
  $nameOfFile = implode(' ', $a_);
  $name = mb_strtoupper(mb_substr($nameOfFile, 0, 1)) . mb_substr($nameOfFile, 1);

  if($name == 'Лист' or $name == 'Хвоя'){
   $A = 1;
  }
  elseif($name == 'Цветок' or $name == 'Побег'){
   $A = 2;
  }
  elseif($name == 'Плод' or $name == 'Шишка'){
   $A = 3;
  }

  $aA[$A] = <<<HD
 <div>
  <h6>{$name}</h6>
  <div>
   <img alt='{$name}' src='{$v['SRC']}'>
  </div>
 </div>

HD;
 }
 ksort($aA);
 foreach($aA as $v){
  echo $v;
 }
 unset($aA, $A);
}
?>
   </div>
  </div>
 </div>
</section>

<?
if($arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']){
 //< GP_AREAS to array
 if($arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']['ID']){
  $A = $arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']; unset($arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE']);
  $arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'][0] = $A;
  unset($A);
 }
 //> GP_AREAS to array

 //< GP_PICTURES to array
 if($arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']['ID']){
  $A = $arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']; unset($arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE']);
  $arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][0] = $A;
  unset($A);
 }
 //> GP_PICTURES to array

 foreach($arResult['DISPLAY_PROPERTIES']['GP_AREAS']['FILE_VALUE'] AS $v){
  if($v['ORIGINAL_NAME'] === "{$arResult['DETAIL_PAGE_URL']}.svg"){
   //< Метки на генплане
   $svg = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/' . $v['SRC']);
   #
   $a_ = array("\t" => '', "\r\n" => '');
   $svg = strtr($svg, $a_);
   #
   $svg = preg_replace('#[ ]{2,}#', ' ', $svg);
   $svg = str_replace('> <', '><', $svg);
   $a_SVG = explode('><', trim($svg));
   unset($svg);
   //$i = 0;
   foreach($a_SVG AS $kk => $vv){
    if($kk == 0 OR $kk == count($a_SVG) - 1){ continue; }
    $vv = trim(str_replace('/','', $vv));

    if(stripos($vv, 'circle') !== FALSE){// OR !isset($arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][$i]['SRC'])){
     $svg .= "<{$vv} id='{$arResult['ID']}' picture='{$arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][0]['SRC']}' />";
    } /*else{
     $i++;
     $svg .= "<{$vv} id='{$arResult['ID']}' picture='{$arResult['DISPLAY_PROPERTIES']['GP_PICTURES']['FILE_VALUE'][$i]['SRC']}' />";
    }*/
   }
   //unset($i);

   $GLOBALS['circles'] .= $svg;
  }
  //> Метки на генплане
 }
}