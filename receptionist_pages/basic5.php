<!DOCTYPE html>
<html>
<head>
    <title>Liste des réservations d'un client donné</title>
</head>
<body>
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

