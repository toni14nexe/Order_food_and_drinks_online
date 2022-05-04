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
    $username = $_GET['username'];
?>

<body>
                        <center>
                            <hr class="mb-3">
                                <h3 class="white">Promijeni lozinku za <b><u><?= $username ?></b></u></h3><br>
                            <hr class="mb-3">
                            <form action="" method="post">
                                <label style="color: white;" for="lozinka"><b>Lozinka</b></label><br>
                                <input class="form-control" type="password" name="lozinka"  placeholder="Lozinka"><br>
                                <label style="color: white;" for="lozinka2"><b>Potvrdi lozinku</b></label><br>
                                <input class="form-control" type="password" name="lozinka2"  placeholder="Potvrdi lozinku"><br>
                                <hr class="mb-3">
                                <table><tr style="background-color: black;"><td><button name="promijeni" class="btn_kosarica" style="width: 200px;">Promijeni lozinku</button></td></tr>
                                <tr style="background-color: black;"><td><button name="natrag" class="btn_kosarica" style="width: 200px;">Natrag</button></td></tr></table>
                                </form>
                            <hr class="mb-3">
                        </center>

                        <?php
                            if(isset($_POST['promijeni'])){
                                $err_pass = NULL;
                                $password = $_POST['lozinka'];
                                $password2 = $_POST['lozinka2'];
                                if(strlen($password) < 8 && $password != $password2){
                                    $err_pass = "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!<br>Lozinke vam se ne podudaraju!</h7>";
                                }elseif(strlen($password) < 8){
                                    $err_pass = "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!</br></h7>";
                                }
                                elseif($password != $password2){
                                    $err_pass = "<h7 class='err_txt'>Lozinke vam se ne podudaraju!</br></h7>";
                                }
                                if($err_pass == NULL){
                                    include './mysql.php';
                                    $password = md5($password);
                                    $sql = "UPDATE users SET password='$password' WHERE username='$username'";
                                    if ($conn->query($sql) === TRUE) {}
                                    echo '<meta http-equiv="refresh" content="0;url=../admin_users.php"/>';
                                }else{
                                    echo "<center>".$err_pass."<hr class='mb-3'></center>";
                                }
                            }

                            if(isset($_POST['natrag'])){
                                echo '<meta http-equiv="refresh" content="0;url=../admin_users.php"/>';
                            }
                        ?>
</body>
</html>