
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Güncelleme</title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Javascript -->
    <script language="javascript" src="js/bootstrap.min.js" type="text/javascript"></script>

    <?

        require_once "baglanti.php";

        global $veritabani;

        $gelenId = $_GET["kullaniciid"];

        $sorgu = $veritabani->prepare("DELETE FROM kullanicilar WHERE id = ?");
        $sorgu->bindParam(1, $gelenId, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo $sorgu->rowCount() . " kayıt silindi.";
        } else {
            echo "Herhangi bir kayıt silinemedi.";
        }

    ?>

</head>

<body>


</body>
</html>