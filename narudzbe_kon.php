<?php
    session_start();
?>

<?php
    if(isset($_SESSION['konobar'])){
        $username_mess = $_SESSION['konobar'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./note_pages/odjava.php"/>';
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="36000;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - Narudžbe</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script src="./js/scripts.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/waiter_style.css" rel="stylesheet">
</head>

    <body>
        <header id="header" class="fixed-top">
            <nav id="nbar" class="navbar navbar-expand-lg navbar-light bg-dark">
                <div id="myhead">
                    <div class="container-fluid">
                        <button name="submit" value="submit" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item headli">
                                    <a class="nav-link" href="narudzbe_kon.php" style="color: #f2f2f2;">Narudžbe</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="konobar.php" style="color: #f2f2f2;"><img src="./assets/img/user.png" 
                                    style="height: 25px; width: 25px;"> <?php echo $username_mess ?></a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="./note_pages/odjava.php?odjava" style="color: #f2f2f2;">Odjava
                                        <img class="img1" src="./assets/img/odjaviti.png">
                                        <img class="img2" src="./assets/img/odjaviti-hover.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </nav>
        </header>
    <main>
        <center>
            <br><br><br>
            <hr class="mb-3">
            <h3 class="white">Narudžbe</h3>
            <br>
            <hr class="mb-3">
        </center>
        <center>
            <div id="narudzbe_div">
            </div>
        </center>

    </main>
    <?php
    if(isset($_POST['primjeni'])){
        $id = $_POST['id'];
        $za = $_POST['status_drop'];

        include './quick_php/mysql.php';

        $sql = "UPDATE narudzbe SET za_t='$za' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {}

        $sql = "UPDATE narudzbe SET status='U izradi' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {}
    }

    if(isset($_POST['dostava'])){
        $id = $_POST['id'];

        include './quick_php/mysql.php';

        $sql = "UPDATE narudzbe SET za_t='' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {}

        $sql = "UPDATE narudzbe SET status='Predano dostavi' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {}
    }

    if(isset($_POST['otkazi'])){
        $id = $_POST['id'];
        echo '<meta http-equiv="refresh" content="0;url=./note_pages/otkazi_y_n.php?id=' .$id. '"/>';
    }
    ?>

    

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>

    <script language="javascript" type="text/javascript">
        function loadlink(){
            $('#narudzbe_div').load('./quick_php/live_nar_kon.php',function () {
                $(this).unwrap();
            });
        }

        loadlink(); 
        setInterval(function(){
            loadlink()
        }, 30000);
    </script>

</body>
</html>
