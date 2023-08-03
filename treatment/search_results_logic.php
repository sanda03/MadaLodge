<?php
// Connexion à la base de données et exécution de la requête ici...
// Assurez-vous que les données récupérées de la base de données sont correctement formatées dans la boucle suivante.

// Connexion à la base de données
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "hotel_managing";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer les chambres disponibles
if (isset($_POST["destination"])) {
    $destination = $_POST["destination"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $num_persons = $_POST["num_persons"];

    $sql = "SELECT 
                h.name AS hotel_name, 
                r.id AS room_id, 
                rt.name AS room_type, 
                r.capacity, 
                rt.base_price AS room_base_price,
                GROUP_CONCAT(ro.name) AS room_options,
                IFNULL(SUM(ro.price), 0) + rt.base_price AS total_price
            FROM hotel h
            JOIN room r ON h.id = r.id_hotel
            JOIN room_type rt ON r.id_room_type = rt.id
            LEFT JOIN have_room_option hro ON r.id = hro.room_id
            LEFT JOIN room_option ro ON hro.option_id = ro.id
            WHERE h.address LIKE '%$destination%'
            AND r.capacity >= $num_persons
            AND NOT EXISTS (
                SELECT 1
                FROM reservation res
                WHERE res.id_room = r.id
                AND (res.start_timestamp <= '$end_date' AND res.end_timestamp >= '$start_date')
            ) 
            GROUP BY r.id
            LIMIT 0, 25";

    $result = mysqli_query($conn, $sql);

    $rooms = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row;
        }
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
