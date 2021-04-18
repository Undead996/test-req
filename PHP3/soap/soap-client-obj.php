<?php
require "../news/News.class.php";

	$client = new SoapClient("http://localhost/soap/news-obj.wsdl", 
		array( 'soap_version' => SOAP_1_2, 'classmap' => array('News' => 'News')) ) ;
//array('classmap' => array('News' => 'News')
//try{

    // Покажем конкретную новость
    $result = $client->getNewsById(2);
    var_dump($result);
//}catch(SoapFault $e){
//    echo 'Операция '.$e->faultcode.' вернула ошибку: '.$e->getMessage();
//} 
?>