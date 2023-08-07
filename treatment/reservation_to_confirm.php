<?php
    $reservation_to_confirm = $db -> query(
        'SELECT r.id id_reservation, p.id id_payment, p.name payment_name, creation_timestamp, start_timestamp, end_timestamp, id_payment_method, special_requests 
        FROM reservation r
        INNER JOIN payment_method p ON r.id_payment_method = p.id
        WHERE is_cancelled IS NULL
        ORDER BY creation_timestamp ASC'
    );
?>
