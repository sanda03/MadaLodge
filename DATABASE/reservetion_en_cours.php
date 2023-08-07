<?php 
    try{		
        $db = new PDO('mysql:host=localhost; dbname=madalodge_database; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :' . $e -> getMessage());
    }

// Obtenez la date d'aujourd'hui
$todayDate = date('Y-m-d');

// Requête SQL avec la condition pour ne pas dépasser la date d'aujourd'hui
$sql = "SELECT id_room, id_conference_room 
        FROM reservation 
        WHERE start_timestamp >= '$todayDate'";
        
// Exécutez la requête
$result = $db->query($sql);

// Ici, vous pouvez traiter les résultats selon vos besoins
// Par exemple, utiliser une boucle pour parcourir les résultats et afficher les informations
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Faites quelque chose avec chaque ligne de résultat
    // $row['id_room'] contiendra la valeur de la colonne id_room
    // $row['id_conference_room'] contiendra la valeur de la colonne id_conference_room
}
    
?>