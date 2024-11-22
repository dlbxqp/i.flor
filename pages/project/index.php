<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Cтраница ЖК');

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('/pages/project/style.css');
Asset::getInstance()->addJs('/pages/project/script.js');

$APPLICATION->IncludeComponent(
 'bitrix:news.detail',
 'project',
 array(
  'ACTIVE_DATE_FORMAT' => 'ymd',
  'ADD_ELEMENT_CHAIN' => 'N',
  'ADD_SECTIONS_CHAIN' => 'N',
  'AJAX_MODE' => 'N',
  'AJAX_OPTION_ADDITIONAL' => '',
  'AJAX_OPTION_HISTORY' => 'N',
  'AJAX_OPTION_JUMP' => 'N',
  'AJAX_OPTION_STYLE' => 'Y',
  'BROWSER_TITLE' => '-',
  'CACHE_GROUPS' => 'N',
  'CACHE_TIME' => '36000000',
  'CACHE_TYPE' => 'A',
  'CHECK_DATES' => 'Y',
  'DETAIL_URL' => '',
  'DISPLAY_BOTTOM_PAGER' => 'N',
  'DISPLAY_DATE' => 'N',
  'DISPLAY_NAME' => 'Y',
  'DISPLAY_PICTURE' => 'Y',
  'DISPLAY_PREVIEW_TEXT' => 'N',
  'DISPLAY_TOP_PAGER' => 'N',
  'ELEMENT_CODE' => $project,
  'ELEMENT_ID' => '',
  'FIELD_CODE' => array(
   'PREVIEW_PICTURE'
  ),
  'IBLOCK_ID' => 2,
  'IBLOCK_TYPE' => 'main',
  'IBLOCK_URL' => '',
  'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
  'MESSAGE_404' => '',
  'META_DESCRIPTION' => '-',
  'META_KEYWORDS' => '-',
  'PAGER_BASE_LINK_ENABLE' => 'N',
  'PAGER_SHOW_ALL' => 'N',
  'PAGER_TEMPLATE' => '.default',
  'PAGER_TITLE' => 'Страница',
  'PROPERTY_CODE' => array(
   'PICTURES'
  ),
  'SET_BROWSER_TITLE' => 'N',
  'SET_CANONICAL_URL' => 'N',
  'SET_LAST_MODIFIED' => 'N',
  'SET_META_DESCRIPTION' => 'N',
  'SET_META_KEYWORDS' => 'N',
  'SET_STATUS_404' => 'N',
  'SET_TITLE' => 'N',
  'SHOW_404' => 'N',
  'STRICT_SECTION_CHECK' => 'N',
  'USE_PERMISSIONS' => 'N',
  'USE_SHARE' => 'N',
  'COMPONENT_TEMPLATE' => 'project'
 ),
 false
);
?>

<article class='width1'>
<?if(isset($aPicturesOfProject) AND count($aPicturesOfProject) > 0){?>
 <section id='description1'>
  <div>
   <div><?=$logotypeOfProject?></div>
   <div>
    <div><?=$descriptionOfProject?></div>
   </div>
  </div>
  <div>
   <?
   foreach($aPicturesOfProject AS $v){
    echo "<div><img alt='{$project}' src='{$v}'></div>";
   }
   ?>
  </div>
<?} else{?>
 <section id='description2'>
  <div>
   <?=$logotypeOfProject?>
   <?=$descriptionOfProject?>
  </div>
<?}?>
 </section>


<?
$APPLICATION->IncludeComponent(
 'bitrix:news.list',
 'points',
 Array(
  'ACTIVE_DATE_FORMAT' => 'ymd', // Формат показа даты
  'ADD_SECTIONS_CHAIN' => 'N', // Включать раздел в цепочку навигации
  'AJAX_MODE' => 'N', // Включить режим AJAX
  'AJAX_OPTION_ADDITIONAL' => '', // Дополнительный идентификатор
  'AJAX_OPTION_HISTORY' => 'N', // Включить эмуляцию навигации браузера
  'AJAX_OPTION_JUMP' => 'N', // Включить прокрутку к началу компонента
  'AJAX_OPTION_STYLE' => 'Y', // Включить подгрузку стилей
  'CACHE_FILTER' => 'N', // Кешировать при установленном фильтре
  'CACHE_GROUPS' => 'Y', // Учитывать права доступа
  'CACHE_TIME' => '36000000', // Время кеширования (сек.)
  'CACHE_TYPE' => 'A', // Тип кеширования
  'CHECK_DATES' => 'Y', // Показывать только активные на данный момент элементы
  'DETAIL_URL' => $project, // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
  'DISPLAY_BOTTOM_PAGER' => 'N', // Выводить под списком
  'DISPLAY_DATE' => 'N', // Выводить дату элемента
  'DISPLAY_NAME' => 'Y', // Выводить название элемента
  'DISPLAY_PICTURE' => 'Y', // Выводить изображение для анонса
  'DISPLAY_PREVIEW_TEXT' => 'N', // Выводить текст анонса
  'DISPLAY_TOP_PAGER' => 'N', // Выводить над списком
  'FIELD_CODE' => array(),
  'FILTER_NAME' => '', // Фильтр
  'HIDE_LINK_WHEN_NO_DETAIL' => 'N', // Скрывать ссылку, если нет детального описания
  'IBLOCK_ID' => 3, // Код информационного блока
  'IBLOCK_TYPE' => 'main', // Тип информационного блока (используется только для проверки)
  'INCLUDE_IBLOCK_INTO_CHAIN' => 'N', // Включать инфоблок в цепочку навигации
  'INCLUDE_SUBSECTIONS' => 'N', // Показывать элементы подразделов раздела
  'MESSAGE_404' => '', // Сообщение для показа (по умолчанию из компонента)
  'NEWS_COUNT' => 999, // Количество новостей на странице
  'PAGER_BASE_LINK_ENABLE' => 'N', // Включить обработку ссылок
  'PAGER_DESC_NUMBERING' => 'N', // Использовать обратную навигацию
  'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000', // Время кеширования страниц для обратной навигации
  'PAGER_SHOW_ALL' => 'N', // Показывать ссылку 'Все'
  'PAGER_SHOW_ALWAYS' => 'N', // Выводить всегда
  'PAGER_TEMPLATE' => '.default', // Шаблон постраничной навигации
  'PAGER_TITLE' => 'Точки на генплане', // Название категорий
  'PARENT_SECTION' => '', // ID раздела
  'PARENT_SECTION_CODE' => '', // Код раздела
  'PREVIEW_TRUNCATE_LEN' => '', // Максимальная длина анонса для вывода (только для типа текст)
  'PROPERTY_CODE' => array(
   'bindingToProject',
   'bindingToPlant',
   'gp_picture',
   'polygonPoints',
   'cx',
   'cy',
   'rectWidth',
   'rectHeight'
  ),
  'SET_BROWSER_TITLE' => 'N', // Устанавливать заголовок окна браузера
  'SET_LAST_MODIFIED' => 'N', // Устанавливать в заголовках ответа время модификации страницы
  'SET_META_DESCRIPTION' => 'N', // Устанавливать описание страницы
  'SET_META_KEYWORDS' => 'N', // Устанавливать ключевые слова страницы
  'SET_STATUS_404' => 'N', // Устанавливать статус 404
  'SET_TITLE' => 'N', // Устанавливать заголовок страницы
  'SHOW_404' => 'N', // Показ специальной страницы
  'SORT_BY1' => 'NAME', // Поле для первой сортировки новостей
  'SORT_BY2' => 'SORT', // Поле для второй сортировки новостей
  'SORT_ORDER1' => 'ASC', // Направление для первой сортировки новостей
  'SORT_ORDER2' => 'ASC', // Направление для второй сортировки новостей
  'STRICT_SECTION_CHECK' => 'N', // Строгая проверка раздела для показа списка
 ),
 false
);

$APPLICATION->IncludeComponent(
 'bitrix:news.list',
 'plants',
 Array(
  'ACTIVE_DATE_FORMAT' => 'ymd', // Формат показа даты
  'ADD_SECTIONS_CHAIN' => 'N', // Включать раздел в цепочку навигации
  'AJAX_MODE' => 'N', // Включить режим AJAX
  'AJAX_OPTION_ADDITIONAL' => '', // Дополнительный идентификатор
  'AJAX_OPTION_HISTORY' => 'N', // Включить эмуляцию навигации браузера
  'AJAX_OPTION_JUMP' => 'N', // Включить прокрутку к началу компонента
  'AJAX_OPTION_STYLE' => 'Y', // Включить подгрузку стилей
  'CACHE_FILTER' => 'N', // Кешировать при установленном фильтре
  'CACHE_GROUPS' => 'Y', // Учитывать права доступа
  'CACHE_TIME' => '36000000', // Время кеширования (сек.)
  'CACHE_TYPE' => 'A', // Тип кеширования
  'CHECK_DATES' => 'Y', // Показывать только активные на данный момент элементы
  'DETAIL_URL' => $project, // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
  'DISPLAY_BOTTOM_PAGER' => 'N', // Выводить под списком
  'DISPLAY_DATE' => 'N', // Выводить дату элемента
  'DISPLAY_NAME' => 'Y', // Выводить название элемента
  'DISPLAY_PICTURE' => 'Y', // Выводить изображение для анонса
  'DISPLAY_PREVIEW_TEXT' => 'N', // Выводить текст анонса
  'DISPLAY_TOP_PAGER' => 'N', // Выводить над списком
  'FIELD_CODE' => array(),
  'FILTER_NAME' => '', // Фильтр
  'HIDE_LINK_WHEN_NO_DETAIL' => 'N', // Скрывать ссылку, если нет детального описания
  'IBLOCK_ID' => 1, // Код информационного блока
  'IBLOCK_TYPE' => 'main', // Тип информационного блока (используется только для проверки)
  'INCLUDE_IBLOCK_INTO_CHAIN' => 'N', // Включать инфоблок в цепочку навигации
  'INCLUDE_SUBSECTIONS' => 'N', // Показывать элементы подразделов раздела
  'MESSAGE_404' => '', // Сообщение для показа (по умолчанию из компонента)
  'NEWS_COUNT' => 99, // Количество новостей на странице
  'PAGER_BASE_LINK_ENABLE' => 'N', // Включить обработку ссылок
  'PAGER_DESC_NUMBERING' => 'N', // Использовать обратную навигацию
  'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000', // Время кеширования страниц для обратной навигации
  'PAGER_SHOW_ALL' => 'N', // Показывать ссылку 'Все'
  'PAGER_SHOW_ALWAYS' => 'N', // Выводить всегда
  'PAGER_TEMPLATE' => '.default', // Шаблон постраничной навигации
  'PAGER_TITLE' => 'Растения', // Название категорий
  'PARENT_SECTION' => '', // ID раздела
  'PARENT_SECTION_CODE' => '', // Код раздела
  'PREVIEW_TRUNCATE_LEN' => '', // Максимальная длина анонса для вывода (только для типа текст)
  'PROPERTY_CODE' => array(
   'SEGMENTATION',
   'GP_PICTURES',
   'GP_AREAS'
  ),
  'SET_BROWSER_TITLE' => 'N', // Устанавливать заголовок окна браузера
  'SET_LAST_MODIFIED' => 'N', // Устанавливать в заголовках ответа время модификации страницы
  'SET_META_DESCRIPTION' => 'N', // Устанавливать описание страницы
  'SET_META_KEYWORDS' => 'N', // Устанавливать ключевые слова страницы
  'SET_STATUS_404' => 'N', // Устанавливать статус 404
  'SET_TITLE' => 'N', // Устанавливать заголовок страницы
  'SHOW_404' => 'N', // Показ специальной страницы
  'SORT_BY1' => 'NAME', // Поле для первой сортировки новостей
  'SORT_BY2' => 'SORT', // Поле для второй сортировки новостей
  'SORT_ORDER1' => 'ASC', // Направление для первой сортировки новостей
  'SORT_ORDER2' => 'ASC', // Направление для второй сортировки новостей
  'STRICT_SECTION_CHECK' => 'N', // Строгая проверка раздела для показа списка
 ),
 false
);
?>
 <section id='gp'>
  <div><?=$plantsList?></div>
  <div>
   <div>
<?=$gpOfProject?>
    <svg>
<?=$circles?>
<?=$polygons8rects?>
    </svg>
    <div></div>
   </div>
  </div>
 </section>

 <section>
  <button onclick="document.location.href='/'">Вернуться на главную</button>
 </section>
</article>


<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');