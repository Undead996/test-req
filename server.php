<?php
// $data = json_decode($_POST['data'], );
$file_post = $_SERVER["DOCUMENT_ROOT"] . "/log/post.log";

$d=json_decode(file_get_contents('php://input'), true);
if (isset($d['data'])) {
    // if(isset($d["data"])){
    $fw = fopen($file_post, "a");
    fwrite($fw, var_export($d['data'], true));
    fclose($fw);
    // }
}else{
    $fw = fopen($file_post, "a");
    fwrite($fw, "No data");
    fclose($fw);
}



