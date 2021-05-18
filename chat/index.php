
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notre super chat !</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    <h1> Connexion </h1>
  </header>
  
  <section class="conteneur">
    
    <div class="user-connection">
      <form action="handler.php?task=connect" method="POST">
        <div class="input">
          <label labelfor="content"> Utilisateur </label>  <input type="email" id="content" name="email" placeholder="Votre email">
        </div>
        <br />
        <div class="input">
           <label labelfor="motpasse"> Mot de passe </label>  <input type="password" id="content" name="motpasse" placeholder="Votre Mot de passe">
        </div> 
        <br />
        <button type="submit">🔥 Connecter !</button>
        
      </form>
    </div>
  </section>
  <!--<script src="js/app.js"></script>-->
</body>
</html>
