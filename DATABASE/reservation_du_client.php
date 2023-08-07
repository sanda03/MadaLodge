<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="process_reservation.php" method="post">
            <!-- Champs pour la réservation -->
            <label for="start_date">Date de début :</label>
            <input type="date" name="start_date" required>

            <label for="end_date">Date de fin :</label>
            <input type="date" name="end_date" required>

            <label for="special_requests">Demandes spéciales :</label>
            <textarea name="special_requests"></textarea>

            <!-- Champs pour les informations du client -->
            <label for="name">Nom :</label>
            <input type="text" name="name" required>

            <label for="email">E-mail :</label>
            <input type="email" name="email" required>

            <!-- Autres champs nécessaires pour le choix de la chambre ou de la salle de conférence, etc. -->

            <input type="submit" value="Réserver">
        </form>

</body>
</html>

<?php
    try{		
        $db = new PDO('mysql:host=localhost; dbname=madalodge_database; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :' . $e -> getMessage());
    }
// Connexion à la base de données (vous devez avoir déjà défini la connexion à la base de données)
// $db = new PDO(...);

// Récupération des données soumises par le formulaire
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$special_requests = $_POST['special_requests'];
$name = $_POST['name'];
$email = $_POST['email'];


// Insérer la réservation dans la table "reservation"
$sql = "INSERT INTO reservation (start_timestamp, end_timestamp, special_requests, id_user)
        VALUES (:start_date, :end_date, :special_requests, :id_user)";

$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':start_date' => $start_date,
    ':end_date' => $end_date,
    ':special_requests' => $special_requests,
    ':id_user' => $id_user // Vous devez déterminer comment obtenir l'ID de l'utilisateur qui fait la réservation
));

header('Location: confirmation.php');
exit();
?>
