<?php session_start(); ?>
<?php include_once('../contacts/c_handler.php') ;?>

<?php $user = $_SESSION['user']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notre super chat !</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <div>
    <form id="form1" action="handler.php?task=logout" method="POST" >
      <button type="submit" name="logout">logout</button>
    </form>
  </div>
  <header>
    <h1>What a Chat Bro !</h1>
  </header>
  <div class="visiteur">
    <?php if($user):; ?>
      Utilisateurs connectés : <?php echo update_connectes(); ?>
    <?php endif; ?>
  </div>  
  
  
  <section class="chat">
    <div class="messages">
     
    </div>
    <div class="user-inputs">
      <form id="form2" action="handler.php?task=write" method="POST">
        <input type="hidden" name="author" id="author" value="<?= $user['id_admin'] ?>">
        <input type="text" id="content" name="content" placeholder="Type in your message right here bro !">
        <button type="submit">🔥 Send !</button>
      </form>
    </div>
  </section>
  <script src="js/app.js"></script>
</body>
</html>
