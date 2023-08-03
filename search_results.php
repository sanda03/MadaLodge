<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="css\search_results2.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="pictures\Capture-removebg-preview.png" alt="Logo de votre site">
            </div>
            <ul class="nav-links">
                <li><a href="landing_page.php">Accueil</a></li>
                <li><a href="#">Chambres</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
         
        </nav>
    </header>
 
    <div class="container">
    <div class="filter-section">
            <h2>Filtrer les résultats</h2>
            <div class="filters">
                <div class="filter-item">
                    <label for="room_type">Type de chambre :</label>
                    <select id="room_type" name="room_type">
                        <option value="">Tous</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Double">VIP</option>
                        
                    </select>
                </div>
                <div class="filter-item">
                    <label for="room_options">Options de chambre :</label>
                    <select id="room_options" name="room_options[]" multiple>
                        <option value="Wifi">Wifi</option>
                        <option value="Petit-déjeuner">Petit-déjeuner</option>
                        <option value="Vue sur la mer">Vue sur la mer</option>
                        
                    </select>
                </div>
                <div class="filter-item">
                    <button class="filter-button" onclick="applyFilters()">Appliquer</button>
                </div>
            </div>
        </div>

        <?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "hotel_managing";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier si des données ont été soumises depuis le formulaire de filtrage
if (isset($_POST['room_type']) && isset($_POST['room_options'])) {
    // Récupérer les valeurs soumises depuis le formulaire
    $room_type = $_POST['room_type'];
    $room_options = $_POST['room_options'];

    // Construire la requête SQL avec les filtres supplémentaires
    $sql = "SELECT 
                h.name AS hotel_name, 
                r.id AS room_id, 
                rt.name AS room_type, 
                r.capacity, 
                rt.base_price AS room_base_price,
                GROUP_CONCAT(ro.name) AS room_options,
                IFNULL(SUM(ro.price), 0) + rt.base_price AS total_price
            FROM hotel h
            JOIN room r ON h.id = r.id_hotel
            JOIN room_type rt ON r.id_room_type = rt.id
            LEFT JOIN have_room_option hro ON r.id = hro.room_id
            LEFT JOIN room_option ro ON hro.option_id = ro.id
            WHERE h.address LIKE '%Antananarivo%' -- Remplacez par votre destination
            AND r.capacity >= 2 -- Remplacez par le nombre de personnes recherché
            AND ('$room_type' = '' OR rt.name = '$room_type')
            AND ('$room_options[0]' = '' OR ro.name IN ('" . implode("','", $room_options) . "'))
            AND NOT EXISTS (
                SELECT 1
                FROM reservation res
                WHERE res.id_room = r.id
                AND (res.start_timestamp <= '2023-07-20 12:00:00' AND res.end_timestamp >= '2023-07-21 12:00:00') -- Remplacez par les dates d'arrivée et de départ recherchées
            ) 
            GROUP BY r.id
            LIMIT 0, 25";

    // Exécuter la requête SQL
    $result = mysqli_query($connection, $sql);

    // Vérifier si la requête a réussi
    if ($result) {
        // Traiter les résultats de la requête et afficher les chambres filtrées
        while ($room = mysqli_fetch_assoc($result)) {
            // Afficher les informations de la chambre ici
            echo '<div class="room-card">';
            echo '<img src="pictures\pexels-photo-1668860.jpeg" alt="Chambre">';
            echo '<h3>' . $room['hotel_name'] . '</h3>';
            echo '<p>Chambre n° ' . $room['room_id'] . '</p>';
            echo '<p>Type de chambre: ' . $room['room_type'] . '</p>';
            echo '<p>Capacité: ' . $room['capacity'] . ' personnes</p>';
            echo '<p>Prix de base: ' . $room['room_base_price'] . ' €</p>';
            echo '<ul>';
            echo '<li>Options de chambre: ' . $room['room_options'] . '</li>';
            echo '<li>Prix total: ' . $room['total_price'] . ' €</li>';
            echo '</ul>';
            echo '<form method="post" action="traitement.php">';
            echo '<input type="hidden" name="room_id" value="' . $room['room_id'] . '">';
            echo '<a class="cta-button" href="reservation_form.php">Réserver maintenant</a>';
            echo '</form>';
            echo '</div>';
        }
    } else {

        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connection);
    }

    
    mysqli_close($connection);
}
?>

        <div class="results-section">
            <h2>Résultats de recherche</h2>
            <div class="room-cards">
                <?php include 'treatment\search_results_logic.php'; ?>
                <?php if (!empty($rooms)) { ?>
                    <?php foreach ($rooms as $room) { ?>
                        <div class="room-card">
                            <img src="pictures\pexels-photo-1668860.jpeg" alt="Chambre">
                            <h3><?php echo $room['hotel_name']; ?></h3>
                            <p>Chambre n° <?php echo $room['room_id']; ?></p>
                            <p>Type de chambre: <?php echo $room['room_type']; ?></p>
                            <p>Capacité: <?php echo $room['capacity']; ?> personnes</p>
                            <p>Prix de base: <?php echo $room['room_base_price']; ?> €</p>
                            <ul>
                                <li>Options de chambre: <?php echo $room['room_options']; ?></li>
                                <li>Prix total: <?php echo $room['total_price']; ?> €</li>
                            </ul>
                            <form method="post" action="traitement.php">
                                <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                                <a class="cta-button" href="reservation_form.php">Réserver maintenant</a>
                            </form>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="no-results">Aucune chambre disponible pour la destination et les dates sélectionnées.</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <p>Tous droits réservés &copy; 2023</p>
    </footer>
</body>
</html>
