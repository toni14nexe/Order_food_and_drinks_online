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

<body>
                        <center>
                            <hr class="mb-3">
                                <h3 class="white">Dodaj novog konobara</h3><br>
                            <hr class="mb-3">
                            <form action="" method="post">
                                <label style="color: white;" for="username"><b>Korisničko ime</b></label><br>
                                <input class="form-control" type="text" name="username"  placeholder="Korisničko ime"><br>
                                <label style="color: white;" for="lozinka"><b>Lozinka</b></label><br>
                                <input class="form-control" type="password" name="lozinka"  placeholder="Lozinka"><br>
                                <label style="color: white;" for="lozinka2"><b>Potvrdi lozinku</b></label><br>
                                <input class="form-control" type="password" name="lozinka2"  placeholder="Potvrdi lozinku"><br>
                                <hr class="mb-3">
                                <table><tr style="background-color: black;"><td><button name="dodaj" class="btn_kosarica" style="width: 200px;">Dodaj konobara</button></td></tr>
                                <tr style="background-color: black;"><td><button name="natrag" class="btn_kosarica" style="width: 200px;">Natrag</button></td></tr></table>
                                </form>
                            <hr class="mb-3">
                        </center>

                        <?php
                            if(isset($_POST['dodaj'])){
                                $err_pass = NULL;
                                $err_nick = NULL;
                                $new_username = $_POST['username'];
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
            
                                include './mysql.php';
                                $sql_e = "SELECT * FROM users WHERE username='$new_username'";
                                $res_e = mysqli_query($dbu, $sql_e) or die(mysqli_error($dbu));
                                if(mysqli_num_rows($res_e) > 0){
                                    $err_nick = "<h7 class='err_txt'>Korisničko ime je već zauzeto!<br><br></h7>";
                                }
            
                                if($err_pass == NULL && $err_nick == NULL){
                                    include './mysql.php';
                                    $verified = 1;
                                    $role = 'konobar';
                                    $password = md5($password);
                                    $sql = "INSERT INTO users (username, email, password, vkey, verified, role) VALUES(?,?,?,?,?,?)";
                                    $stmtinsert = $db->prepare($sql);
                                    $result = $stmtinsert->execute([$new_username, $new_username, $password, $new_username, $verified, $role]);
                                    echo '<meta http-equiv="refresh" content="0;url=../admin_users.php"/>';

                                }else{
                                    echo "<center>".$err_nick.$err_pass."<hr class='mb-3'></center>";
                                }
                            }

                            if(isset($_POST['natrag'])){
                                echo '<meta http-equiv="refresh" content="0;url=../admin_users.php"/>';
                            }
                        ?>
</body>
</html>