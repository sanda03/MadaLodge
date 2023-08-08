<?php
    session_start();
    include("../treatment/connection_db.php");
    include("../treatment/show_city.php");
    include("../treatment/show_room_option.php"); 
    include("../treatment/show_room_type.php");
    include("../treatment/show_payment_method.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_landing_client.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Recherche d'hôtel</title>
    <script src="../js/jquery.min.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <script scr="../js/bootstrap.js" defer></script>
</head>
<body>
    <header>
        <div class="container-fluid">
            <img src="../img/logo_madalodge.png" alt="Logo" class="col-3">
            <nav class="col-3">
                <ul>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a class="btn-deconnect" href="../index.php" role="button">Se Déconnecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="search-section">
        <h1>Vivez un séjour mémorable et magique</h1>
        <form id="reservation-form" method="post" action="../treatment/reservationByClient.php">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userIdentification'] ?>">
            <label for="destination">Destination :</label>
            <select name="destination" id="destination">
                <?php
                    while($data_city = $city->fetch()) {
                        echo '<option value="' . $data_city['name'] . '">' . $data_city['name'] . '</option>';
                    }
                ?> 
            </select>

            <label for="start_date">Date d'arrivée :</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Date de départ :</label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="num_persons">Nombre de personnes :</label>
            <input type="number" id="num_persons" name="num_persons" min="1" required>

            <button type="button" data-bs-toggle="modal" data-bs-target="#OptionsAndConfirmationModal">Rechercher</button>
            <div class="portfolio-modal modal fade" id="OptionsAndConfirmationModal" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                            <div class="modal-body text-center pb-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Une dernière étape pour confirmer votre réservation</h2>
                                            <div class="filters">
                                                <div class="filter-item">
                                                    <label for="room_type">Type de chambre :</label>
                                                    <select id="room_type" name="room_type">
                                                        <?php
                                                            while($data_room_type = $room_type->fetch()) {
                                                                echo '<option value="' . $data_room_type['name'] . '">' . $data_room_type['name'] . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="filter-item" id="room_options">
                                                    <p>Options de chambre :</p>
                                                    <?php 
                                                        while($data_room_option = $room_option -> fetch()) {
                                                            echo '<input type="checkbox" value="'. htmlspecialchars($data_room_option['name']) . '" name="room_option[]" id="room_option'. htmlspecialchars($data_room_option['id']) .'"><label for="room_option'. htmlspecialchars($data_room_option['id']) .'">' . htmlspecialchars($data_room_option['name']) . '</label><br>';                                                             
                                                        } 
                                                    ?>
                                                </div>
                                                <div class="filter-item">
                                                    <label for="payment_methods">Méthode de paiment</label>
                                                    <?php 
                                                        while($data_payment_method = $payment_method -> fetch()){
                                                            echo '<input type="radio" name="payment_method" id="payment' . $data_payment_method['id'] . '" value="' . $data_payment_method['id'] . '"><label for="payment' . $data_payment_method['id'] . '">' . $data_payment_method['name'] . '</label>';
                                                        }
                                                    ?>      
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="special_request">Une demande personelle ?</label>
                                                <input type="tex0areat" name="xxxspecial_request" id="special_request">
                                            </div>
                                            <button class="btn btn-primary" data-bs-dismiss="modal">
                                                Close Window
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
        $room_option -> closeCursor();
    ?>
</body>
</html>
