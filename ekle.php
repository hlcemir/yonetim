
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Ekleme</title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Javascript -->
    <script language="javascript" src="js/bootstrap.min.js" type="text/javascript"></script>

    <?

        require_once "baglanti.php";

        global $veritabani;

        if($_POST){

            $query = $veritabani->prepare("INSERT INTO kullanicilar SET
                                adi = ?,
                                meslek = ?,
                                yas = ?");

            $insert = $query->execute(array(
                $_POST["inputAdi"], $_POST["inputMeslegi"], $_POST["inputYasi"]
            ));
            if ( $insert ){
                $last_id = $veritabani->lastInsertId();
                echo "kayıt işlemi başarılı!";
            }

        }
    ?>

</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="inputAdi" class="col-sm-2 col-form-label">ADI</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" placeholder="Adınız" name="inputAdi" id="inputAdi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputMeslegi" class="col-sm-2 col-form-label">MESLEĞİ</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" placeholder="Mesleğiniz" name="inputMeslegi" id="inputMeslegi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputYasi" class="col-sm-2 col-form-label">YAŞI</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" placeholder="Yaşınız" name="inputYasi" id="inputYasi">
                </div>
            </div>
            <div class="mb-3 row">
                <button class="btn btn-success" type="submit">Ekle</button>
            </div>
        </form>
    </div>

</body>
</html>