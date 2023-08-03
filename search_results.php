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
                <li><a href="#">Contact</a></li>
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
