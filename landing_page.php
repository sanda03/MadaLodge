<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'hôtel</title>
    <link rel="stylesheet" href="css\client_landing.css">
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="logo">
                <img src="img\Capture-removebg-preview.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="search-section">
        <h1>Vivez un séjour mémorable et magique</h1>
        <form id="search-form" method="post" action="search_results.php">
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required>

            <label for="start_date">Date d'arrivée :</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Date de départ :</label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="num_persons">Nombre de personnes :</label>
            <input type="number" id="num_persons" name="num_persons" min="1" required>

            <button type="submit">Rechercher</button>
        </form>
    </div>

</body>
</html>
