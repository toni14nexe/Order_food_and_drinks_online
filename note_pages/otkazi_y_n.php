<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub</title>

    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/products_style.css" rel="stylesheet">

</head>

<?php
    if(isset($_SESSION['konobar'])){
        $username_mess = $_SESSION['konobar'];
    }elseif(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=odjava.php"/>';
    }

    $naslov = NULL;
?>

<?php
    $id = $_GET["id"];
?>

<body style="background-color: black; color: white; overflow: hidden;">

    <div>
        <center>
            <hr class='mb-3'>
            <h1>Jeste li sigurni da želite otkazati narudžbu ID=<?= $id ?>?</h3>
            <br>
            <hr class='mb-3'>
            <form action="" method="post">
                <div><br>
                    <div class='tipke_div'>
                        <div class='tipke_s_div'>
                            <button class='btn_kosarica' stype="submit" name="zelim">Da, želim</button>
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
    if(isset($_POST['zelim'])){
        include '../quick_php/mysql.php';

        $sql = "UPDATE narudzbe SET status='Otkazano' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {}

        echo '<meta http-equiv="refresh" content="0;url=../narudzbe_kon.php"/>';
    }

    if(isset($_POST['natrag'])){
        echo '<meta http-equiv="refresh" content="0;url=../narudzbe_kon.php"/>';
    }
?>
    
    <div class="footer_final">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </div>
</body>
</html>