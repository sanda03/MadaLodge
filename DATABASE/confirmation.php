<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de réservation</title>
</head>
<body>
    <h1>Réservation effectuée avec succès !</h1>
    <p>Merci pour votre réservation. Votre réservation a été enregistrée avec succès.</p>
</body>
</html>


<?php
    try{		
        $db = new PDO('mysql:host=localhost; dbname=madalodge_database; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :' . $e -> getMessage());
    }
    // Après l'insertion de la réservation dans la base de données
    // Envoyer un e-mail de confirmation au client
    $to = $email; // L'adresse e-mail du client
    $subject = "Confirmation de réservation";
    $message = "Merci pour votre réservation. Votre réservation a été enregistrée avec succès.";
    $headers = "From: votre_adresse_email@exemple.com\r\n";
    $headers .= "Reply-To: votre_adresse_email@exemple.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Envoi de l'e-mail
    mail($to, $subject, $message, $headers);

?>
