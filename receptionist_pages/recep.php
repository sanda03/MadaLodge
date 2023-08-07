<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recep.css">
</head>
<body>
    
<header>
        <h1>Tableau de bord</h1>
    </header>

    <nav>
        <a href="basic8.php">Vérifier Paiement</a>
        <a href="med_10.php">Total Réservations</a>
        <a href="hard2.php">Chambres Libres</a>
        <a href="pay.php">Réservations Client</a>
        <a href="basic5.php">Liste Réservations</a>
    </nav>

    <div class="container" id="form1">
        <!-- Formulaire 1 -->
        <form action="" method="POST">
            <h2>Vérifier le paiement d'un client et montant à payer</h2>
            <label for="nom_client">Nom du client :</label>
            <input type="text" name="nom_client" required>
            <input type="submit" value="Vérifier">
        </form>

        <div class="result">
            <?php
            // Code PHP pour formulaire 1
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

        // Requête SQL pour vérifier si le client a effectué un paiement et obtenir le montant à payer
        $sql = "SELECT COUNT(*) AS payment_count, SUM(rt.base_price) AS total_amount
                FROM reservation r
                JOIN users u ON r.id_user = u.id
                JOIN room rm ON r.id_room = rm.id
                JOIN room_type rt ON rm.id_room_type = rt.id
                WHERE u.last_name = '$nomClient'";

        $result = $conn->query($sql);

        // Vérification des résultats et affichage
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $paymentCount = $row["payment_count"];
            $totalAmount = $row["total_amount"];

            if ($paymentCount > 0) {
                echo "<h2>Le client $nomClient a effectué un paiement.</h2>";
            } else {
                echo "<h2>Le client $nomClient n'a pas encore effectué de paiement.</h2>";
                echo "Montant à payer : $totalAmount";
            }
        } else {
            echo "Aucune information trouvée pour ce client.";
        }

        // Fermer la connexion
        $conn->close();
    }
            ?>
        </div>
    </div>
</body>
</html>