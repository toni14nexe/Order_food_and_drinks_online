<?php
    session_start();
?>

<?php
        if(isset($_SESSION['user'])){
            $username_mess = $_SESSION['user'];
        }else{
            echo '<meta http-equiv="refresh" content="0;url=../note_pages/odjava.php"/>';
        }

        $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="36000;url=../note_pages/odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - id#<?= $id ?></title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../js/scripts.js"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/waiter_style.css" rel="stylesheet">
    <script src="../js/print.js"></script>
</head>

    <?php
        include './mysql.php';

        $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE id='$id'");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){
            $vrijeme_nar = date("d.m.Y - H:i", strtotime($row['vrijeme'].' +1 hour'));
            $status = $row['status'];
            $user = $row['user'];
            $proizvodi = $row['proizvodi'];
            $adresa = $row['adresa'];
            $mjesto = $row['mjesto'];
            $broj = $row['broj'];
            $napomena = $row['napomena'];
            $cijena = $row['cijena'];
            $ime = $row['ime_prez'];
        }
    ?>

<body style="background-color: white;">
        <div id="print">
            <h6 style='color: black;'>ID narudžbe: <?= $id ?></h6>
            <h6 style='color: black;'>Datum i vrijeme: <?= $vrijeme_nar ?></h6>
            <h6 style='color: black;'>Status: <?= $status ?></h6><br>
            <h6 style='color: black;'>Korisnik: <?= $user ?></h6>
            <h6 style='color: black;'>Ime i prezime: <?= $ime ?></h6>
            <h6 style='color: black;'>Adresa: <?= $adresa ?></h6>
            <h6 style='color: black;'>Mjesto: <?= $mjesto ?></h6>
            <h6 style='color: black;'>Mob/tel: <?= $broj ?></h6><br>
            <h6 style='color: black;'>Napomena/komentar: <?= $napomena ?></h6><br>
            <center>
            <h6 style='color: black;'><?= $proizvodi ?></h6><br>
            </center>
            <h6 style='color: black;'>Ukupna cijena: <?= $cijena ?> kn</h6><br>

        </div>

    <center>
        <br><br>
        <button class="btn_narudzba" style="width: 50%" onclick="printContent('print')">Print Content</button>
    </center>

</body>
</html>