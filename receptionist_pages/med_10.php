<!DOCTYPE html>
<html>
<head>
    <title>Nombre total de réservations pour un hôtel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style_landing_recep.css">
    <link rel="stylesheet" href="recep.css">
    <script src="../js/jquery.min.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <script scr="../js/bootstrap.js" defer></script>
</head>
<body>
    <header class="container-fluid">
        <img src="../img/logo_madalodge.png" alt="">
        <h1>Tableau de bord</h1>
        <a href="../index.php">Se deconnecter</a>
    </header>

    <nav>
        <a href="landing_receptionist.php">Réservation à confirmer</a>
        <a href="basic8.php">Vérifier Paiement</a>
        <a href="med_10.php">Total Réservations</a>
        <a href="hard2.php">Chambres Libres</a>
        <a href="pay.php">Réservations Client</a>
        <a href="basic5.php">Liste Réservations</a>
    </nav>
    <h1>Nombre total de réservations pour un hôtel</h1>

    <form action="" method="POST">
        <label for="hotel_id">Sélectionnez un hôtel :</label>
        <select name="hotel_id">
            <option value="1">Hôtel A</option>
            <option value="2">Hôtel B</option>
            <option value="3">Hôtel C</option>
            <!-- Ajoutez les autres options en fonction de vos hôtels -->
        </select>
        <input type="submit" value="Afficher">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hotelId = $_POST["hotel_id"];

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "madalodge_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Requête SQL pour afficher le nombre total de réservations pour l'hôtel sélectionné
        $sql = "SELECT h.name, COUNT(*) AS total_reservations
                FROM hotel h
                JOIN room r ON r.id_hotel = h.id
                JOIN reservation res ON res.id_room = r.id
                WHERE h.id = $hotelId
                GROUP BY h.name";

        $result = $conn->query($sql);

        // Vérification des résultats et affichage
        if ($result->num_rows > 0) {
            echo "<h2>Nombre total de réservations pour l'hôtel :</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "Hôtel : " . $row["name"] . " | Nombre total de réservations : " . $row["total_reservations"] . "<br>";
            }
        } else {
            echo "Aucune réservation trouvée pour cet hôtel.";
        }

        // Fermer la connexion
        $conn->close();
    }
    ?>
</body>
</html>
