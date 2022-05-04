<?php
    $br_kosarica = NULL;

    include 'mysql.php';

    $sql = "SELECT količina FROM $username_mess";
    $result = $conn->query($sql);

    if($result){
        while($row = $result->fetch_assoc()){
            $br_kosarica = $br_kosarica + $row['količina'];
        }
    }else{
        $br_kosarica=NULL;
    }
?>