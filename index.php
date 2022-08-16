
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Yönetim Paneli</title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Javascript -->
    <script language="javascript" src="js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        function silKontrol(){
            if(confirm("Silmek istediğinizden emin misiniz?") == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <table class="table" style="margin-top: 50px">
            <thead>
            <tr>
                <th width="10%" scope="col">ID</th>
                <th width="30%" scope="col">AD</th>
                <th width="20%" scope="col">MESLEK</th>
                <th width="20%" scope="col">YAŞ</th>
                <th width="10%" scope="col">GÜNCELLE</th>
                <th width="10%" scope="col">SİL</th>
            </tr>
            </thead>
            <tbody>

            <?

            require_once "baglanti.php";

            global $veritabani;

            ## Kullanıcı Bilgileri Getir ##
            $query = $veritabani->query("SELECT * FROM kullanicilar", PDO::FETCH_ASSOC);
            foreach ($query as $key) {

                echo '<tr>
                        <th scope="row">'.$key["id"].'</th>
                        <td>'.$key["adi"].'</td>
                        <td>'.$key["meslek"].'</td>
                        <td>'.$key["yas"].'</td>
                        <td><a target="_blank" href="/yonetim/guncelle.php?kullaniciid='.$key["id"].'" class="btn btn-success" role="button">Güncelle</a></td>
                        <td><a onclick="silKontrol()" target="_blank" href="/yonetim/sil.php?kullaniciid='.$key["id"].'" class="btn btn-danger" role="button">Sil</a></td>
                    </tr>';
            }
            ?>
            </tbody>
        </table>

        <a target="_blank" href="/yonetim/ekle.php" class="btn btn-info" role="button">Kullanıcı Ekle</a>

    </div>

</body>
</html>