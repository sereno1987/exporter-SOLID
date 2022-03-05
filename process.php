<?php
if($_SERVER['REQUEST_METHOD'] != "POST"){
    // echo "Not Submitted";
    return ;
}
include "autoload.php";
# form submit is OK
[$title,$content,$format] = [$_POST['title'],$_POST['content'],$_POST['format']];
$whitelist = ['Text','Pdf','Json','Csv'];
if(!in_array($format,$whitelist)){
    echo "Invalid Format !!!";
    return ;
}
$format = ucfirst(strtolower($format));
$className = "{$format}Exporter";


if(class_exists($className)){
    $exporter = new $className(['title'=> $title,'content'=> $content]);
    $exporter->export();
}
