<?php
/*
Создаём сжатый файл с различными данными

Распаковать потом можно командой 'gzip -d foo-bar.txt.gz'

*/

$fp = fopen ("compress.zlib://foo-bar.txt.gz", "wb");
if (!$fp) die("Невозможно создать файл.");

fwrite($fp, "Тестовые данные.\n");

fclose($fp);
?>