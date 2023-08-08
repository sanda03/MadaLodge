<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style_landing_recep.css">
    <title>Liste des chambres libres sur une période</title>
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
    <h1>Liste des chambres libres sur une période</h1>

    <form action="" method="POST">
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" required>
        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" required>
        <input type="submit" value="Afficher">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dateDebut = $_POST["date_debut"];
        $dateFin = $_POST["date_fin"];

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

        // Requête SQL pour afficher la liste des chambres libres sur la période donnée
        $sql = "SELECT h.name AS hotel_name, r.id AS room_id
                FROM hotel h
                JOIN room r ON h.id = r.id_hotel
                LEFT JOIN reservation res ON r.id = res.id_room
                WHERE res.id IS NULL OR (res.start_timestamp > '$dateDebut 03:00:00' OR res.end_timestamp < '$dateFin 00:00:00')
                ORDER BY h.name, r.id";

        $result = $conn->query($sql);

        // Vérification des résultats et affichage
        if ($result->num_rows > -1) {
            echo "<h1>Liste des chambres libres du $dateDebut au $dateFin :</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "Hôtel : " . $row["hotel_name"] . " | Chambre ID : " . $row["room_id"] . "<br>";
            }
        } else {
            echo "Aucune chambre libre trouvée pour la période du $dateDebut au $dateFin.";
        }

        // Fermer la connexion
        $conn->close();
    }
    ?>
</body>
</html>
