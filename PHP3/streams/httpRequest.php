<?php

$opts = [
	'http' => [
		'method' => 'GET',
		'header' => "Accept-language: en\r\n" .
					"Cookie: foo=bar\r\n"
	]
];

$context = stream_context_create($opts);

/*
	Отправляем http-запрос на домен www.example.com
	с дополнительными заголовками, показанными выше
*/

$fp = fopen('http://www.example.com', 'r', false, $context);
fpassthru($fp);
fclose($fp);

?>