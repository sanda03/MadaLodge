<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="./css/contact_style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="landing_page.php">Accueil</a></li>
                <li><a href="#">Chambres</a></li>
                
        
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Contactez-nous</h1>
        <p>Vous avez des questions ou des commentaires? Envoyez-nous un message et nous vous répondrons dès que possible.</p>
        <form action="submit_form.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </div>

    <footer>
        <p>Tous droits réservés &copy; 2023</p>
    </footer>
</body>
</html>
