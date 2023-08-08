<?php
    include("connection_db.php");
    include("date_time_treatment.php");

    $search_room = $db -> prepare(
        'SELECT r.id id_room, rt.name room_type_name, c.name city_name
        FROM room r INNER JOIN room_type rt ON r.id_room_type = rt.id
        INNER JOIN hotel h ON r.id_hotel = h.id
        INNER JOIN city c ON h.id_city = c.id 
        WHERE c.name = ?
            AND rt.name = ?'
    );
    $search_room->execute(array($_POST['destination'], $_POST['room_type']));
    $data_search_room = $search_room -> fetch();
    $ID_room = $data_search_room['id_room'];

    $insert_to_reservation=$db->prepare('
        INSERT INTO reservation
        (creation_timestamp, start_timestamp, end_timestamp, special_requests, is_paid, id_payment_method, id_user, id_room) 
        VALUES(?,?,?,?,?,?,?,?)
    ');
    $special_requests = "ROOM_TYPE : " . $_POST['room_type'] . '; OPTIONS : ';
    if (isset($_POST["room_option"]) && is_array($_POST["room_option"])) {
        foreach ($_POST["room_option"] as $option) {
            $special_requests .= $option . ', ';
        }
    }
    echo $special_requests;
    $insert_to_reservation->execute(array($todayDATETIME, $_POST['start_date'], $_POST['end_date'], $special_requests, 0, $_POST['payment_method'], $_POST['user_id'], $ID_room));
    header('location: ../client_pages/landing_client.php');
    
?>
