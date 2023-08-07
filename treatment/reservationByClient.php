<?php
    include("connection_db.php");
    include("date_time_treatment.php");
    $insert_to_reservation=$db->prepare('
        INSERT INTO reservation
        (creation_timestamp, start_timestamp, end_timestamp, special_requests, is_paid, id_payment_method, id_user) 
        VALUES(?,?,?,?,?,?,?)
    ');
    $special_requests = "ROOM_TYPE : " . $_POST['room_type'] . '; OPTIONS : ';
    if (isset($_POST["room_option"]) && is_array($_POST["room_option"])) {
        foreach ($_POST["room_option"] as $option) {
            $special_requests .= $option . ', ';
        }
    }
    echo $special_requests;
    $insert_to_reservation->execute(array($todayDATETIME, $_POST['start_date'], $_POST['end_date'], $special_requests, 0, $_POST['payment_method'], $_POST['user_id']));
    // header('location: ../../receptionniste/rec_formulaire.php?ajout=Patient ajouté(e).')
?>
