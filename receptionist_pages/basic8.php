<!DOCTYPE html>
<html>
<head>
    <title>Nombre de réservations par client et période</title>
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
    
    <h1>Nombre de réservations par client et période</h1>

    <form action="" method="POST">
        <label for="nom_client">Nom du client :</label>
        <input type="text" name="nom_client" required>
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" required>
        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" required>
        <input type="submit" value="Afficher">
    </form>
    <div id="resultats">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomClient = $_POST["nom_client"];
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

            // Requête SQL pour récupérer l'ID du client donné
            $sqlClientId = "SELECT id FROM users WHERE last_name = '$nomClient'";
            $resultClientId = $conn->query($sqlClientId);

            if ($resultClientId->num_rows > 0) {
                $rowClientId = $resultClientId->fetch_assoc();
                $idClient = $rowClientId["id"];

                // Requête SQL pour afficher le nombre de réservations pour le client donné et la période donnée
                $sql = "SELECT COUNT(*) AS reservation_count
                        FROM reservation
                        WHERE id_user = $idClient
                        AND start_timestamp >= '$dateDebut 00:00:00'
                        AND end_timestamp <= '$dateFin 23:59:59'";

                $result = $conn->query($sql);

                // Vérification des résultats et affichage
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h2>Nombre de réservations pour le client $nomClient :</h2>";
                    echo "Période : du $dateDebut au $dateFin | Nombre de réservations : " . $row["reservation_count"];
                } else {
                    echo "Aucune réservation trouvée pour ce client et cette période.";
                }
            } else {
                echo "Client non trouvé.";
            }

            // Fermer la connexion
            $conn->close();
        }
        ?>
    </div>
</body>
</html>

