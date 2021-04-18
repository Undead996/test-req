<?php
const RSS_URL = "http://localhost/news/rss.xml" ;
const FILE_NAME = "news.xml" ;

function download($url, $filename){
    file_put_contents(FILE_NAME, file_get_contents(RSS_URL));
}

if(!file_exists(FILE_NAME) or fileatime(FILE_NAME)+3600 > time() ){
    download(RSS_URL, FILE_NAME);
}

?>

<!DOCTYPE html>

<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
$sxml = simplexml_load_file(FILE_NAME);

for($i=0;$i<count($sxml->channel[0]->item); $i++ ){
    echo "<h2>".$sxml->channel[0]->item[$i]->title."</h2>".$sxml->channel[0]->item[$i]->pubDate ;
    echo "<p>".$sxml->channel[0]->item[$i]->description."</p>" ;
    echo "<p>".$sxml->channel[0]->item[$i]->source."</p>" ;
} 
?>
</body>
</html>