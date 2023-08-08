<?php
    include("connection_db.php");
    $inscription = $db -> prepare(
        'INSERT INTO users 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)'
    );
    $inscription -> execute(array('DEFAULT', $_POST['user-name'], $_POST['user-mdp'], $_POST['user-firstname'], $_POST['user-lastname'], $_POST['cin'], $_POST['society-name'], $_POST['user-phone'], $_POST['user-email'], $_POST['user-phone2'], $_POST['gender'], $_POST['birthdate'], 4));
    header('location : ../index.php')
?>
