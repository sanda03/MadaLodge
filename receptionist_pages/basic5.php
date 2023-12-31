<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style_landing_recep.css">
    <title>Liste des réservations d'un client donné</title>
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
    <h1>Liste des réservations d'un client donné</h1>

    <form action="" method="POST">
        <label for="nom_client">Nom du client :</label>
        <input type="text" name="nom_client" required>
        <input type="submit" value="Afficher">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomClient = $_POST["nom_client"];

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

        // Requête SQL pour afficher la liste des réservations d'un client donné par nom
        $sql = "SELECT r.id AS reservation_id, r.start_timestamp, r.end_timestamp, h.name AS hotel_name
                FROM reservation r
                JOIN users u ON r.id_user = u.id
                JOIN room rm ON r.id_room = rm.id
                JOIN hotel h ON rm.id_hotel = h.id
                WHERE u.last_name = '$nomClient'";

        $result = $conn->query($sql);

        // Vérification des résultats et affichage
        if ($result->num_rows > -1) {
            echo "<h1>Liste des réservations du client $nomClient :</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "ID Réservation : " . $row["reservation_id"] . " | Date de début : " . $row["start_timestamp"] . " | Date de fin : " . $row["end_timestamp"] . " | Hôtel : " . $row["hotel_name"] . "<br>";
            }
        } else {
            echo "Aucune réservation trouvée pour ce client.";
        }

        // Fermer la connexion
        $conn->close();
    }
    ?>
</body>
</html>

