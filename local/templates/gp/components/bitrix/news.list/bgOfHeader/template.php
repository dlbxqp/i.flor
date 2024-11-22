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

$rk = array_rand($arResult['ITEMS'], 1); //random key
$arItem = $arResult['ITEMS'][$rk];
?>
<script>document.querySelector('Body > Header').style.backgroundImage = 'url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)';</script>