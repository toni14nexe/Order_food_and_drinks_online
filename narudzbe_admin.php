<?php
    session_start();
?>

<?php
    if(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=prijava.php"/>';
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?>-Narudžbe</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
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
                                    <a class="nav-link" href="narudzbe_admin.php" style="color: #f2f2f2;">Narudžbe</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="admin_users.php" style="color: #f2f2f2;">Korisnici</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="admin.php" style="color: #f2f2f2;"><img src="./assets/img/user.png" 
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

        <br><br><br><br>
        <center>
            <hr class='mb-3'>
            <form action="" method="post">
                <table>
                    <tr style="background-color: black; ">
                        <td class="lozinka_td"><button name="narudzbe_danas" class="btn_kosarica" style="margin-right: 3px; width: 200px;">Danas</button></td>
                        <td class="lozinka_td"><button name="narudzbe_trazi" class="btn_kosarica" style="margin-left: 3px; width: 200px;">Pretraži</button></td>
                    </tr>
                </table>
            </form>
            <hr class='mb-3'>
        </center>

        <?php
            if(isset($_POST['narudzbe_danas'])){
                echo "
                    <center>
                        <div id='narudzbe_div' style='width: 80%;'>
                        </div>
                    </center>
                ";
            }

            if(isset($_POST['narudzbe_trazi'])){
                echo'
                    <center style="color: white;">
                        <form action="" method="post">
                        <h5 class="white">Odaberite datum:</h5>
                        <input type="date" name="datum_0">
                        <br><table><tr style="background-color: black;"><td><button name="primjeni_0" class="btn_kosarica" style="width: 150px;">Primjeni</button></td></tr></table>
                        <hr class="mb-3">
                        <h5 class="white">Odaberite raspon datuma:</h5>
                        Od
                        <input type="date" name="datum_1">
                        do
                        <input type="date" name="datum_2">  
                        <br><table><tr style="background-color: black;"><td><button name="primjeni_1" class="btn_kosarica" style="width: 150px;">Primjeni</button></td></tr></table>
                        <hr class="mb-3">
                        </form>
                    </center>
                ';
            }

            if(isset($_POST['primjeni_0'])){
                $brojilo = 0;
                $brojilo_otk = 0;
                $uk_novaca = 0;

                $datum = $_POST['datum_0'];
                $datum = date("d.m.Y.", strtotime($datum));

                include './quick_php/mysql.php';   

                $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE date='$datum' ORDER BY vrijeme DESC");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0){
                    echo "
                        <center>
                        <h3 style='color: white;'>Nemate ni jednu spremitu narudžbu taj dan!</h3>
                        <br><hr class='mb-3'>
                        </center>
                    ";
                }

                while($row = $result->fetch_assoc()){
                    $brojilo = $brojilo + 1;
                    $status = $row['status'];
                    $id = $row['id'];
                    $user = $row['user'];
                    $ocekivati = NULL;
                    $predano = NULL;
                    $poslana = NULL;
                    $za_t = $row['za_t'];

                    $boja = NULL;
                    if($status == 'Poslana narudžba' || $status == NULL){
                        $status = 'Primljena narudžba';
                        $boja = 'red';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'U izradi'){
                        $boja = 'orange';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Predano dostavi'){
                        $boja = 'rgb(32, 116, 15)';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Poziv'){
                        $status = 'Zatražen poziv!';
                        $boja = 'blue';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Otkazano'){
                        $boja = 'rgb(80, 80, 80)';
                        $brojilo_otk = $brojilo_otk + 1;
                    }else{}

                    echo "<center><form action='' method='post'><div class='dropdown' style='width: 80%;'>";
                    echo "
                        <h7 style='color: white;'>ID: $id<br></h7>
                        <button class='btn_narudzba' style='background-color: $boja;'>
                        <h7>
                        &emsp; Vrijeme narudžbe: " . date("d.m.Y - H:i", strtotime($row['vrijeme'].' +1 hour')) . "<br>
                        Status: $status<br>
                        </h7></button>
                    ";
                    echo "
                        <div id='drop_narudzba' class='dropdown-content'
                        <a class='a_narudzba'><h5>
                        <input type='hidden' name='id' value='$id'>
                        <br><a target='_blank' style='color: white' href='./quick_php/vise_admin.php?username=$user'>$user</a><br>
                        Ime i prezime: $row[ime_prez]<br>
                        Adresa: $row[adresa]<br>
                        Mjesto: $row[mjesto]<br>
                        Mob/tel: $row[broj]<br><br>
                        $row[proizvodi]<br>
                        UKUPNA CIJENA: $row[cijena] kn<br>
                        Napomena/komentar: $row[napomena]<br>
                        &emsp;<a href='./quick_php/print_admin.php?id=" . $id . "' target='_blank' style='color: white; text-decoration: underline;' class='btn_print'>Printaj</a>
                        </h5></a></div></div></form>
                        <br><hr class='mb-3'>
                        </center>
                    ";
                }
                echo '
                    <center>
                        <h5 class="white">Ukupni broj narudžba: '.$brojilo.'
                        <br>Od toga otkazanih: '.$brojilo_otk.'
                        <br><br>Ukupno potrošenog novca: '.number_format($uk_novaca, 2).' kn<br</h5>
                        <br><hr class="mb-3">
                    </center>
                ';
            }



            if(isset($_POST['primjeni_1'])){
                $brojilo = 0;
                $brojilo_otk = 0;
                $uk_novaca = 0;

                $datum1 = $_POST['datum_1'];
                $datum2 = $_POST['datum_2'];
                $datum1 = date("d.m.Y.", strtotime($datum1));
                $datum2 = date("d.m.Y.", strtotime($datum2));

                include './quick_php/mysql.php';   

                $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE date>='$datum1' AND date<='$datum2' ORDER BY vrijeme DESC");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0){
                    echo "
                        <center>
                        <h3 style='color: white;'>Nemate ni jednu spremitu narudžbu taj dan!</h3>
                        <br><hr class='mb-3'>
                        </center>
                    ";
                }

                while($row = $result->fetch_assoc()){
                    $brojilo = $brojilo + 1;
                    $status = $row['status'];
                    $id = $row['id'];
                    $user = $row['user'];
                    $ocekivati = NULL;
                    $predano = NULL;
                    $poslana = NULL;
                    $za_t = $row['za_t'];

                    $boja = NULL;
                    if($status == 'Poslana narudžba' || $status == NULL){
                        $status = 'Primljena narudžba';
                        $boja = 'red';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'U izradi'){
                        $boja = 'orange';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Predano dostavi'){
                        $boja = 'rgb(32, 116, 15)';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Poziv'){
                        $status = 'Zatražen poziv!';
                        $boja = 'blue';
                        $uk_novaca = $uk_novaca + $row['cijena'];
                    }elseif($status == 'Otkazano'){
                        $boja = 'rgb(80, 80, 80)';
                        $brojilo_otk = $brojilo_otk + 1;
                    }else{}

                    echo "<center><form action='' method='post'><div class='dropdown' style='width: 80%;'>";
                    echo "
                        <h7 style='color: white;'>ID: $id<br></h7>
                        <button class='btn_narudzba' style='background-color: $boja;'>
                        <h7>
                        &emsp; Vrijeme narudžbe: " . date("d.m.Y - H:i", strtotime($row['vrijeme'].' +1 hour')) . "<br>
                        Status: $status<br>
                        </h7></button>
                    ";
                    echo "
                        <div id='drop_narudzba' class='dropdown-content'
                        <a class='a_narudzba'><h5>
                        <input type='hidden' name='id' value='$id'>
                        <br><a target='_blank' style='color: white' href='./quick_php/vise_admin.php?username=$user'>$user</a><br>
                        Ime i prezime: $row[ime_prez]<br>
                        Adresa: $row[adresa]<br>
                        Mjesto: $row[mjesto]<br>
                        Mob/tel: $row[broj]<br><br>
                        $row[proizvodi]<br>
                        UKUPNA CIJENA: $row[cijena] kn<br>
                        Napomena/komentar: $row[napomena]<br>
                        &emsp;<a href='./quick_php/print_admin.php?id=" . $id . "' target='_blank' style='color: white; text-decoration: underline;' class='btn_print'>Printaj</a>
                        </h5></a></div></div></form>
                        <br><hr class='mb-3'>
                        </center>
                    ";
                }
                echo '
                    <center>
                        <h5 class="white">Ukupni broj narudžba: '.$brojilo.'
                        <br>Od toga otkazanih: '.$brojilo_otk.'
                        <br><br>Ukupno potrošenog novca: '.number_format($uk_novaca, 2).' kn<br</h5>
                        <br><hr class="mb-3">
                    </center>
                ';
            }
        ?>



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



    <script language="javascript" type="text/javascript">
        function loadlink(){
            $('#narudzbe_div').load('./quick_php/live_nar_admin.php',function () {
                $(this).unwrap();
            });
        }

        loadlink(); 
        setInterval(function(){
            loadlink()
        }, 30000);
    </script>

    

    <br><br><br><br><br><br>
    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>