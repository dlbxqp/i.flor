<?php
	
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('html_errors', 1);
	
	$data = array(
	'https://www.youtube.com/watch?v=awhqrgoSUGI&list=PLmL9ydY9LoPL9vlFCcgmrhD5Vyacv5Ibd',
	'https://www.youtube.com/watch?v=W1AmLTsyl2Q&list=PLmL9ydY9LoPL9vlFCcgmrhD5Vyacv5Ibd&index=2',
	);
	
?><html>
<head>
	<title>Video QR Codes</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<style type="text/css">
		TABLE {font:normal 14px arial}
		TABLE TD {vertical-align:middle}
	</style>
</head>
<body>
<table><thead><tr><th>Ссылка</th><th>QR</th></tr></thead><tbody>
<?
	foreach ($data as $i => $str) {
		$link = 'codes\\vid' . $i . '.png';
		$file = __DIR__ . '/' . str_replace('\\', '/', $link);
		if (!file_exists($file)) {
			// Generate image
			require_once 'phpqrcode/qrlib.php';
			echo 'Generate ' . $file . '<br />';
			QRcode::png($str, $file, 'M', 8, 8);
		}
		?>
			<tr><td><?=$str ?></td><td><img src="<?=$link ?>" /></td></tr>
		<?
	}
?>
	</tbody></table>
</body>