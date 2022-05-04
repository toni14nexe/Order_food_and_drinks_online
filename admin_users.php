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

    <title>Dublin's Pub - <?= $username_mess ?>-Korisnici</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/admin_style.css" rel="stylesheet">
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
                    <tr>
                        <td class="lozinka_td"><button name="korisnici" class="btn_kosarica" style="margin-right: 3px; width: 200px;">Korisnici</button></td>
                        <td class="lozinka_td"><button name="konobari" class="btn_kosarica" style="margin-left: 3px; width: 200px;">Konobari</button></td>
                    </tr>
                </table>
            </form>
            <hr class='mb-3'>
        </center>

            <?php
                if(isset($_POST['korisnici'])){
                    echo "
                        <center>
                        <table style='width: 80%;'>
                            <tr>
                                <td>PREZIME</td>
                                <td>IME</td>
                                <td>USERNAME</td>
                                <td>EMAIL</td>
                                <td>ADRESA</td>
                                <td>MJESTO</td>
                                <td>BROJ</td>
                                <td>REG.</td>
                                <td>NAR.</td>
                                <td>UKLONI</td>
                            </tr>
                    ";

                    include './quick_php/mysql.php';

                    $stmt = $conn->prepare("SELECT * FROM users WHERE role = 'user' ORDER BY lastname ASC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $ime = $row['firstname'];
                        $prezime = $row['lastname'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $adresa = $row['adresa'];
                        $mjesto = $row['mjesto'];
                        $broj = $row['broj'];
                        $reg = date("d.m.Y - H:i", strtotime($row['createdate'].' +1 hour'));
                        $role = $row['role'];
                        echo "
                                <tr>
                                    <td>$prezime</td>
                                    <td>$ime</td>
                                    <td>$username</td>
                                    <td>$email</td>
                                    <td>$adresa</td>
                                    <td>$mjesto</td>
                                    <td>$broj</td>
                                    <td>$reg</td>
                                    <td><a target='_blank' href='./quick_php/vise_admin.php?username=" . $username . "' class='a_vise'>Više</a></td>
                                    <td><a href='./quick_php/ukloni_admin.php?username=" . $username . "&role=" . $role . "' class='a_vise'>Ukloni</a></td>
                                </tr>
                        ";
                    }
                    echo "
                        </table>
                        <hr class='mb-3'>
                    </center>
                    ";   
                }



                if(isset($_POST['konobari'])){
                    echo "
                        <center>
                        <form action='' method='post'>
                        <table><tr style='background-color: black;'><td><button name='dodaj_kon' class='btn_kosarica' style='width: 300px;'>Dodaj novoga konobara</button></td></tr></table>
                        </form>
                        <hr class='mb-3'>
                        <table style='width: 80%;'>
                            <tr>
                                <td>USERNAME</td>
                                <td>REGISTRACIJA</td>
                                <td>LOZINKA</td>
                                <td>UKLONI</td>
                            </tr>
                    ";

                    include './quick_php/mysql.php';

                    $stmt = $conn->prepare("SELECT * FROM users WHERE role = 'konobar' ORDER BY username ASC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $username = $row['username'];
                        $reg = date("d.m.Y - H:i", strtotime($row['createdate']));
                        $role = $row['role'];
                        echo "
                                <tr>
                                    <td>$username</td>
                                    <td>$reg</td>
                                    <td><a href='./quick_php/admin_kon_loz.php?username=" . $username . "&role=" . $role . "' class='a_vise'>Promijeni</a></td>
                                    <td><a href='./quick_php/ukloni_admin.php?username=" . $username . "&role=" . $role . "' class='a_vise'>Ukloni</a></td>
                                </tr>
                        ";
                    }
                    echo "
                        </table>
                        <hr class='mb-3'>
                    </center>
                    ";
                }



                if(isset($_POST['dodaj_kon'])){
                    echo '<meta http-equiv="refresh" content="0;url=./quick_php/dodaj_kon.php"/>';
                }
            ?>
            


    <br><br><br><br><br><br>
    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>