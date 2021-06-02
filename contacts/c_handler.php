<?php

  /**
   * Connexion simple à la base de données via PDO !
   */
  $db = new PDO('mysql:host=localhost;dbname=cjp;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);

/**
   * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
   
  $task = "list";

  if(array_key_exists("task", $_GET)){

    $task = $_GET['task'];
  }

  if($task == "write"){
    postMessage();
  }  else if($task == "connect"){
    session_start();  
    getConnect();
  } else if($task == "chat"){
    getChat();
  } else if($task == "contact"){
    getContact();
  } else if($task == "menu"){
    getMenu();
  }  else if($task == "logout"){
    getLogout();
  } else {
    getMessages();
  }
*/
  getAdmins();

 /**
   * deconnecter l'utilisateur
   */
  function getLogout(){

    session_destroy();

    header('location: ./index.php');
  }    

/**
  * acceder au service de chat
  */
  function getChat(){
    
    
    if(isset($_SESSION['user'])) {

        $_SESSION['user'] = $user;

        //require_once('chat/chat.php'); exit();
      } else {

        header('location: ./index.php');
      }   
    }

/**
  * acceder au service de chat
  */
  function getContact(){
    
    
      header('location: ../contacts/index.php');
        
    }

  /**
   * Créer une session utilisateur pour le chat
   */
  function getConnect(){
    
    if(isset($_POST)) {

      $user = connexionUtilisateur($_POST['email'], $_POST['motpasse']);

      if($user) {

        ctrl_connexion($user);
        
        $_SESSION['user'] = $user;
        //print_r($user); exit();

        header('location: menu.php'); exit();
      } else{

        header('location: ./index.php');
      }   
    }
  }

  function connexionUtilisateur($email,$motdepasse){
      global $db;

      $requete   = "SELECT id_admin, name, email, etat_connexion FROM admin_verity WHERE email LIKE :email AND password LIKE :password ";

      $statement = $db->prepare($requete);

      $statement->execute([
                    "email"    => $email,
                    "password" => md5($motdepasse)
                  ]);

      $user      = $statement->fetch();

      return $user;
  }

  function ctrl_connexion($admin){
  
    global $db;

    $req   = "INSERT admin_ctrl_connexion (id_ctrl, date_heure, id_admin, etat) VALUES (NULL, :date_heure, :admin, :state)";
    $query = $db->prepare($req);
    $res   = $query->execute([
              "date_heure" => date("d/m/Y - H:s"),
              "admin"      => $admin['id_admin'],
              "state"      => $admin['etat_connexion']
              
            ]);

    return $res;
  }    
    

  function DeconnexionUtilisateur($idUtilisateur){
    $requete="update gmao_utilisateurs set gmao_utilisateurs.DETADECONNEXION=current_date, gmao_utilisateurs.STATUTCONNEXION='0' where gmao_utilisateurs.IDUTILISATEUR='".$idUtilisateur."'";
    $resultat=mysql_query($requete);
  }

  /**
   * Si on veut récupérer, il faut envoyer du JSON
   */
  function getMessages(){
    global $db;

    // 1. On requête la base de données pour sortir les 20 derniers messages
    $resultats = $db->query("SELECT A.id AS id, A.id_admin AS id_admin, A.message AS message, A.date_message AS date_message, V.name AS name  FROM admin_chats A, admin_verity V WHERE V.id_admin = A.id_admin ORDER BY date_message DESC LIMIT 20");
    // 2. On traite les résultats
    $messages = $resultats->fetchAll();
    // 3. On affiche les données sous forme de JSON
    echo json_encode($messages);exit();
  }

  /**
   * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
   */
  function postMessage(){
    global $db;
    // 1. Analyser les paramètres passés en POST (author, content)
    
    if(!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)){

      echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
      return;

    }

    $author = $_POST['author'];
    $content = $_POST['content'];

    // 2. Créer une requête qui permettra d'insérer ces données
    $query = $db->prepare('INSERT INTO admin_chats SET id_admin = :author, message = :content, date_message = NOW()');

    $query->execute([
      "author"  => $author,
      "content" => $content
    ]);

    // 3. Donner un statut de succes ou d'erreur au format JSON
    echo json_encode(["status" => "success"]);
  }

  /**
   * Si on veut récupérer la liste des administrateurs, il faut envoyer du JSON 
   */
  function getAdmins($limite = 2){
    global $db;

    // 1. On requête la base de données pour sortir les 20 derniers messages
    $resultats = $db->query("SELECT id_admin, email, name, categorie, admin_verity.id_departement, id_centre, etat_connexion, departement.nom AS departement FROM admin_verity, departement WHERE departement.id_departement = admin_verity.id_departement ORDER BY name LIMIT $limite");
    // 2. On traite les résultats
    $admins = $resultats->fetchAll();
    // 3. On affiche les données sous forme de JSON
    echo json_encode($admins);exit();
  }

  /**
   * Voilà c'est tout en gros.
   */