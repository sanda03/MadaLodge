
<?php 
    try{		
        $db = new PDO('mysql:host=localhost; dbname=madalodge_database; charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur :' . $e -> getMessage());
    }
    $request = $db -> query('
        SELECT * FROM users
    ');
    
?>
<!--?php 
    while($result = $request -> fetch()) {
        echo '<p>'. htmlspecialchars($result['username']) .'<p/>';
    }
?-->
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="css/index_style.css">
    <!--link rel="stylesheet" href="css/bootstrap.css"-->
    
    <title>Index</title>
    
    <script src="js/jquery.min.js" defer></script>
    <!--script src="js/bootstrap.bundle.min.js" defer></script-->
    <!--script scr="js/bootstrap.js" defer></script-->
</head>
<body>
  <div id="all">
    <h1>Hello</h1>
    <div id="page">
      <h1>JESUS IS THE KING</h1>
      <p>xLorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid enim suscipit, harum cumque, corporis non magnam eligendi illum esse doloremque architecto officiis. Quisquam pariatur dolorum delectus recusandae adipisci deserunt maxime!</p>
      <div id="hotels">
        
      </div>   
    </div>
  </div> 
</body>
</html>