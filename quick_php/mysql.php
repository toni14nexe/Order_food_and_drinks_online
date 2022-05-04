<?php
    //host = 'localhost'
    $db_host = 'localhost';
    //user_root = 'root' ili 'toniwebc_root'
    $db_user = 'toniwebc_root';
    //pass_host = '' ili 'RKNexe14'
    $db_pass = 'RKNexe14';
    //dbname = 'zavrsni' ili 'toniwebc_zavrsni'
    $db_name = 'toniwebc_zavrsni';
?>

<?php
    $conn = NULL;
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>

<?php
    $mysqli = NEW MySQLi($db_host, $db_user, $db_pass, $db_name);
?>

<?php
    $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbu = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<?php 
    //vkey link LOCAL
  //  $vkey_link = 'http://localhost/zavrsni/note_pages/autentifikacija.php?vkey=';
  //  $vkey2_link = 'http://localhost/zavrsni/reset_lozinka.php?vkey=';
    //vkey link ONLINE
    $vkey_link = 'https://toni-web.com/note_pages/autentifikacija.php?vkey=';
    $vkey2_link = 'https://toni-web.com/reset_lozinka.php?vkey=';

?>

<?php
    $conn = NULL;
    $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8',$db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8',$db_user, $db_pass);
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>