<?php
	
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('html_errors', 1);
	
	$data = file_get_contents('flor.csv');
	
	$data = explode(PHP_EOL, $data);
	
?><html>
<head>
	<title>FlorINGRAD QR Codes</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<style type="text/css">
		TABLE {font:normal 14px arial}
		TABLE TD {vertical-align:middle}
	</style>
</head>
<body>
<table><thead><tr><th>Название</th><th>Ссылка</th><th>QR</th></tr></thead><tbody>
<?
	foreach ($data as $str) {
		$str = explode(';', $str);
		if (count($str) != 2) continue;
		$str[1] = trim($str[1]);
		$name = preg_replace('/.*\\/(.+)/', '$1', $str[1]);
		$link = 'codes\\' . $name . '.png';
		$file = __DIR__ . '/' . str_replace('\\', '/', $link);
		if (!file_exists($file)) {
			// Generate image
			require_once 'phpqrcode/qrlib.php';
			echo 'Generate ' . $file . '<br />';
			QRcode::png($str[1], $file, 'M', 8, 8);
		}
		?>
			<tr><td><?=iconv('windows-1251', 'utf-8', $str[0]) ?></td><td><?=$str[1] ?></td><td><img src="<?=$link ?>" /></td></tr>
		<?
	}
?>
	</tbody></table>
</body>