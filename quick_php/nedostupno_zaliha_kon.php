<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="36000;url=../note_pages/odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/waiter_style.css" rel="stylesheet">
</head>

<?php
    $us = NULL;
    if(isset($_SESSION['konobar'])){
        $username_mess = $_SESSION['konobar'];
        $us = 'kon';
    }elseif(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
        $us = 'admin';
    }else{
        echo '<meta http-equiv="refresh" content="0;url=../prijava.php"/>';
    }
?>

<?php
    $id = $_GET["id"];

    include './broj_kosarica.php';
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = '$id'");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        $naziv = $row['naziv'];
        $zaliha = $row['zaliha'];
    }
?>

<body>
    <div>
        <center>
            <hr class='mb-3'>
            <h1 class="white">Označite kao nedostupno</h3>
            <h5 class="white"><br>ID proizvoda = <?= $id ?><br>Naziv proizvoda = <?= $naziv ?><br>Trenutno stanje proizvoda = <?= $zaliha ?></h5>
            <form method="post">
                <br>
                <hr class='mb-3'>
                <div><br>
                    <div class='tipke_div'>
                        <div class='tipke_s_div'>
                            <button class='btn_kosarica' stype="submit" name="dodaj">Označi kao nedostupno</button>
                        </div>
                        <div class='tipke_s_div'>
                            <button class='btn_red' stype="submit" name="natrag">Natrag</button>
                        </div>
                    </div>
                </div><br>
            </form>
            <hr class='mb-3'>
        </center>
    </div>

    <?php
        if(isset($_POST['dodaj'])){
            $uk_zal = $zaliha + $kol;
    
            include './mysql.php';
    
            $sql = "UPDATE products SET zaliha='0' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {}

            if($us == 'kon'){
                echo '<meta http-equiv="refresh" content="0;url=../konobar.php"/>';
            }else{
                echo '<meta http-equiv="refresh" content="0;url=../admin.php"/>';
            }
        }

        if(isset($_POST['natrag'])){
            if($us == 'kon'){
                echo '<meta http-equiv="refresh" content="0;url=../konobar.php"/>';
            }else{
                echo '<meta http-equiv="refresh" content="0;url=../admin.php"/>';
            }
        }
    ?>

    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>