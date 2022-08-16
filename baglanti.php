<?php
global $veritabani;

try{
    ## Veritabanı Bağlantısı
    $veritabani = new PDO("mysql:host=localhost;dbname=yonetim",'root','root');

    ob_start();
    session_start();

    ## Karakter Sorunu Çözümü
    $veritabani->exec("set names utf8");


}

catch(PDOException $e){
    echo $e->getMessage();
}


?>
