<?php
    session_start();
    include("../treatment/connection_db.php");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style_landing_recep.css">
    <title>Réservations à confirmer</title>
    <script src="../js/jquery.min.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <script scr="../js/bootstrap.js" defer></script>
</head>
<body>
    <table>
        <thead> 
            <td>Date de demande</td>
            <td>Date d'arrivée</td>
            <td>Date de départ</td>
            <td>Mode de paiement</td>
            <td>Demandes spéciales</td>
        </thead>
        <tr>
            <?php 
                include("../treatment/reservation_to_confirm.php");
                while($data_reservation_to_confirm = $reservation_to_confirm -> fetch()) {
                    echo '<td>' . $data_reservation_to_confirm['creation_timestamp'] . '</td>'
                    . '<td>' . $data_reservation_to_confirm['start_timestamp'] . '</td>'
                    . '<td>' . $data_reservation_to_confirm['end_timestamp'] . '</td>'
                    . '<td>' . $data_reservation_to_confirm['payment_name'] . '</td>'
                    . '<td>' . $data_reservation_to_confirm['special_requests'] . '</td>'; 
            ?>
            <!-- Button confirmation modal -->
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data_reservation_to_confirm['id_reservation']; ?>">
                    Confirmer
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $data_reservation_to_confirm['id_reservation']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="../treatment/confirm_reservation.php">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="filters">
                                        <input type="hidden" name="id_reservation" value="<?php echo $data_reservation_to_confirm['id_reservation'] ?>">
                                        <?php 
                                            echo $data_reservation_to_confirm['special_requests'];
                                    
                                        ?>
                                        <div class="filter-item">
                                            <label for="room_type">Type de chambre :</label>
                                            <select id="room_type" name="room_type">
                                                <?php
                                                    include("../treatment/show_room_type.php");
                                                    while($data_room_type = $room_type->fetch()) {
                                                        echo '<option value="' . $data_room_type['id'] . '">' . $data_room_type['name'] . '</option>';
                                                    }
                                                    $room_type->closeCursor();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="filter-item">
                                            <p>Options de chambre :</p>
                                            <?php 
                                                include("../treatment/show_room_option.php");
                                                while($data_room_option = $room_option -> fetch()) {
                                                    echo '<input type="checkbox" value="'. htmlspecialchars($data_room_option['id']) . '" name="room_option[]" id="room_option'. htmlspecialchars($data_room_option['id']) .'"><label for="room_option'. htmlspecialchars($data_room_option['id']) .'">' . htmlspecialchars($data_room_option['name']) . '</label><br>';                                                             
                                                } 
                                                $room_option->closeCursor();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirmer maintenant</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <td>
        <tr>
        <?php } ?>
    </table>
    
        // Dans un modal on affiche toutes les chambres selon le critère du client, et j'ajoute juste un checkbox
        
    <?php 
        $reservation_to_confirm->closeCursor();
        
        
    ?>
</body>
</html>
