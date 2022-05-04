<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600;url=../note_pages/odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/admin_style.css" rel="stylesheet">

</head>

<?php
    if(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=../prijava.php"/>';
    }
?>

<?php
    $mess = NULL;
    $username = $_GET["username"];
    $role = $_GET["role"];

    if($role == 'user'){
        $mess = 'Jeste li sigurni da želite obrisati korisnika <b><u> ' . $username . '</u></b> & sve njegove narudžbe?';
    }elseif($role == 'konobar'){
        $mess = 'Jeste li sigurni da želite obrisati konobara <b><u> ' . $username . '</u></b>?';
    }
?>

<body>    
    <div>
        <center>
            <hr class='mb-3'>
            <h1 class="white"><?= $mess ?></h3>
            <br>
            <hr class='mb-3'>
            <form action="" method="post">
                <div><br>
                    <div class='tipke_div'>
                        <div class='tipke_s_div'>
                            <button class='btn_kosarica' stype="submit" name="zelim">Da, želim</button>
                        </div>
                        <div class='tipke_s_div'>
                            <button class='btn_kosarica' stype="submit" name="natrag">Natrag</button>
                        </div>
                    </div>
                </div><br>
            </form>
            <hr class='mb-3'>
        </center>
    </div>

    <?php
        if(isset($_POST['zelim'])){
            include './mysql.php';
            $sql = "DELETE FROM users WHERE username='$username'";
            if ($conn->query($sql) === TRUE) { } 
            else { }

            include './mysql.php';
            $sql = "DELETE FROM narudzbe WHERE user='$username'";
            if ($conn->query($sql) === TRUE) { } 
            else { }

            $conn->close();

            echo '<meta http-equiv="refresh" content="0;url=../note_pages/uspjesno_obrisano_admin.php"/>';
        }

        if(isset($_POST['natrag'])){
            echo '<meta http-equiv="refresh" content="0;url=../admin_users.php"/>';
        }
    ?>


    <br><br><br><br><br><br>
    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>