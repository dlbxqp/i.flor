<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Cтраница растения");

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('/pages/plant/style.css');
Asset::getInstance()->addJs('/pages/plant/script.js');
?><article class='width1'>
<?
$plant = str_replace('-', ' ', $plant);

$APPLICATION->IncludeComponent(
 "bitrix:news.detail",
 "plant",
 Array(
	 "ACTIVE_DATE_FORMAT" => "ymd",	// Формат показа даты
		"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => $project,	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_CODE" => $plant,	// Код новости
		"ELEMENT_ID" => "",	// ID новости
		"FIELD_CODE" => array(	// Поля
			"PREVIEW_PICTURE"
		),
		"IBLOCK_ID" => 1,	// Код информационного блока
		"IBLOCK_TYPE" => "main",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Страница",	// Название категорий
		"PROPERTY_CODE" => array(	// Свойства
			'SEGMENTATION',
			'FAMILY',
   'ORIGIN',
   'BOTANICAL_DESCRIPTION',
   'GROWTH_CONDITIONS_AND_PREFERENCES',
  	'USAGE',
  	'IMPORTANT',
   'PART_PICTURES',
   'GP_AREAS',
   'GP_PICTURES'
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"USE_SHARE" => "N",	// Отображать панель соц. закладок
		"COMPONENT_TEMPLATE" => "plant"
	),
	false
);

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
  'DETAIL_URL' => "{$project}/{$plant}", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
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
  'SORT_ORDER1' => 'DESC', // Направление для первой сортировки новостей
  'SORT_ORDER2' => 'ASC', // Направление для второй сортировки новостей
  'STRICT_SECTION_CHECK' => 'N', // Строгая проверка раздела для показа списка
 ),
 false
);

$APPLICATION->IncludeComponent(
 'bitrix:news.list',
 'projects.plant',
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
  'DETAIL_URL' => "{$project}/{$plant}", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
  'DISPLAY_BOTTOM_PAGER' => 'N', // Выводить под списком
  'DISPLAY_DATE' => 'N', // Выводить дату элемента
  'DISPLAY_NAME' => 'Y', // Выводить название элемента
  'DISPLAY_PICTURE' => 'N', // Выводить изображение для анонса
  'DISPLAY_PREVIEW_TEXT' => 'N', // Выводить текст анонса
  'DISPLAY_TOP_PAGER' => 'N', // Выводить над списком
  'FIELD_CODE' => array(
   'DETAIL_PICTURE'
  ),
  'FILTER_NAME' => '', // Фильтр
  'HIDE_LINK_WHEN_NO_DETAIL' => 'N', // Скрывать ссылку, если нет детального описания
  'IBLOCK_ID' => 2, // Код информационного блока
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
  'PAGER_TITLE' => 'ЖК', // Название категорий
  'PARENT_SECTION' => '', // ID раздела
  'PARENT_SECTION_CODE' => '', // Код раздела
  'PREVIEW_TRUNCATE_LEN' => '', // Максимальная длина анонса для вывода (только для типа текст)
  'PROPERTY_CODE' => array(
   'PICTURES'
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
  'SORT_ORDER1' => 'DESC', // Направление для первой сортировки новостей
  'SORT_ORDER2' => 'ASC', // Направление для второй сортировки новостей
  'STRICT_SECTION_CHECK' => 'N', // Строгая проверка раздела для показа списка
 ),
 false
);
?>

 <section id='gp'>
  <div>
   <h3>Где растёт</h3>
  </div>
  <div>
   <div id='currentsProjectsList'><?=$currentsProjectsList?></div>
<?if(isset($gpOfProject)){?>
   <div id='gp'>
<?=$gpOfProject?>
    <svg>
<?=$circles?>
<?=$polygons8rects?>
    </svg>
    <div></div>
   </div>
 <?}?>
  </div>
 </section>

 <section>
  <button onclick="document.location.href='/'" style='margin-left: 0; margin-right: auto'>Вернуться на главную</button>
 </section>
</article>



<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');