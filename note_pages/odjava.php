<?php
    session_start(); 

    if(isset($_GET['odjava'])){
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=../prijava.php"/>';
    }elseif(isset($_GET['auto_odjava'])){
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=auto_odjava.php"/>';
    }else{
        echo '<meta http-equiv="refresh" content="0;url=../prijava.php"/>';
    }
?>