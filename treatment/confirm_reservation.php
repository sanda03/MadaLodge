<?php
    session_start();
    include("connection_db.php");
    /*
    $insert_handler_id = $db -> prepare(
        'UPDATE reservation 
        SET is_cancelled = ?,
            handler_id = ?
        WHERE id = ?'
    );
    */
    $search_room = $db -> prepare(
        'SELECT r.id id_room, rt.name room_type_name
        FROM room r INNER JOIN room_type rt ON r.id_room_type = rt.id
        INNER JOIN have_room_option hro ON r.id = hro.room_id
        INNER JOIN room_option ro ON hro.option_id = ro.id
        WHERE r.id_room_type = ?
            AND hro.option_id = ?'
    );
    $search_room->execute(array($_POST['room_type'], $_POST['room_option'][0]));
    while($data_search_room = $search_room -> fetch()) {
        echo $data_search_room['id_room'] . ' ' . $data_search_room['room_type_name'] . '<br>';

    }
/*
    $insert_handler_id->execute(array(0, $_SESSION['userIdentification'], $_POST['id_reservation']));
    
    $insert_handler_id -> closeCursor();
    */
?>
