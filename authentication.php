<?php
    include("connection_db.php");
    $login_request = $db -> prepare(
        'SELECT id, password, role_id FROM users 
        WHERE email = ?'
    );
    $login_request -> execute(array($_POST['user-email']));
    
    $data_login_request = $login_request -> fetch();
    $password_verification = ($_POST['user-mdp'] == $data_login_request['password']);
    if (!$data_login_request)
    { 
        header('location: ../index.php');
    } else {
    	if ($password_verification){
            session_start();
            $_SESSION['userIdentification']=$data_login_request['id'];
            if ($data_login_request['role_id'] == 4) {
                header('location: ../client_pages/landing_client.php');
            } elseif ($data_login_request['role_id'] == 2) {
                header('location: ../receptionist_pages/landing_receptionist.php');
            } else {
                echo 'Users PAS encore DISPONIBLE DANS CETTE VERSION madalodge';
            }
    	}
    	else
    	{
            header('location: ../index.php');
        }
    }
?>
