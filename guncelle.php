
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

        if($_POST){

            $sorgu = $veritabani->prepare("UPDATE kullanicilar SET adi = ?, meslek = ?, yas = ? WHERE id = ?");
            $sorgu->bindParam(1, $_POST["inputAdi"], PDO::PARAM_STR);
            $sorgu->bindParam(2, $_POST["inputMeslegi"], PDO::PARAM_STR);
            $sorgu->bindParam(3, $_POST["inputYasi"], PDO::PARAM_INT);
            $sorgu->bindParam(4, $gelenId, PDO::PARAM_INT);
            $sorgu->execute();

            if ($sorgu->rowCount() > 0) {
                echo $sorgu->rowCount() . " kayıt güncellendi.";
            } else {
                echo "Herhangi bir kayıt güncellenemedi.";
            }

        }

        ## Kullanıcı Bilgileri Getir ##
        $query = $veritabani->query("SELECT * FROM kullanicilar WHERE id = '$gelenId'", PDO::FETCH_ASSOC);
        foreach ($query as $key) {

            $id = $key["id"];
            $adi = $key["adi"];
            $meslek = $key["meslek"];
            $yas = $key["yas"];
        }
    ?>

</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3 row" >
                <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<? echo $id; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAdi" class="col-sm-2 col-form-label">ADI</label>
                <div class="col-sm-10">
                    <input type="text" value="<? echo $adi; ?>" class="form-control" name="inputAdi" id="inputAdi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMeslegi" class="col-sm-2 col-form-label">MESLEĞİ</label>
                <div class="col-sm-10">
                    <input type="text" value="<? echo $meslek; ?>" class="form-control" name="inputMeslegi" id="inputMeslegi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputYasi" class="col-sm-2 col-form-label">YAŞI</label>
                <div class="col-sm-10">
                    <input type="text" value="<? echo $yas; ?>" class="form-control" name="inputYasi" id="inputYasi">
                </div>
            </div>
            <div class="mb-3 row">
                <button class="btn btn-success" type="submit">Güncelle</button>
            </div>
        </form>
    </div>

</body>
</html>