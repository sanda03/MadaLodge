<?php
    session_start();
    include("connection_db.php");
    
    $insert_handler_id = $db -> prepare(
        'UPDATE reservation 
        SET is_cancelled = ?,
            handler_id = ?
        WHERE id = ?'
    );
    $insert_handler_id->execute(array(0, $_SESSION['userIdentification'], $_POST['id_reservation']));
    
    $insert_handler_id -> closeCursor();
?>
