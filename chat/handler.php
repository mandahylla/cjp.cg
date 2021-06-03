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
   */
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
      "author" => $author,
      "content" => $content
    ]);

    // 3. Donner un statut de succes ou d'erreur au format JSON
    echo json_encode(["status" => "success"]);
  }

  /**
   * Si on veut récupérer la liste des administrateurs, il faut envoyer du JSON 
   */
  function getAdmins(){
    global $db;

    // 1. On requête la base de données pour sortir les 20 derniers messages
    $resultats = $db->query("SELECT id_admin, email, name, categorie, id_departement, id_centre, etat_connexion FROM admin_verity ORDER BY name LIMIT 20");
    // 2. On traite les résultats
    $admins = $resultats->fetchAll();
    // 3. On affiche les données sous forme de JSON
    echo json_encode($admins);exit();
  }
  /**
   * Fonction qui permet de mettre à jour le compteur de visites
   **/

  function compter_visite(){
      // On va utiliser l'objet $pdo pour se connecter, il est créé en dehors de la fonction
      // donc on doit indiquer global $pdo; au début de la fonction
      global $pdo;
       
      // On prépare les données à insérer
      $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
      $date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ
       
      // Mise à jour de la base de données
      // 1. On initialise la requête préparée
      $query = $pdo->prepare("
          INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
          ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
      ");
      // 2. On execute la requête préparée avec nos paramètres
      $query->execute(array(
          ':ip'   => $ip,
          ':date' => $date
      ));
  }


  function get_nbrVisiteurs(){
    global $db;

    $visiteur = $db->prepare('SELECT * FROM stats_visites');
    $visiteur->bindvalue(':visite_online', $id_online, PDO::PARAM_STR);
    $visiteur->execute();
    $list_visiteur = $visiteur->fetchAll(PDO::FETCH_ASSOC);
     
    foreach($list_visiteur as $all => $each)
    {
      echo $each['ip']."<br/>";
      echo $each['pages_vues']."<br/>";
     
    }
  }

/**
   * Fonction qui permet de voir les utilisateurs connectés
 **/

  function update_connectes(){
    global $db; // Objet PDO de connexion à la base de données
 
    // Préparation paramètres nécessaires à la procédure
    $ip                  = $_SERVER['REMOTE_ADDR'];
    $time                = time();
    $inactive_time_limit = 60*5; # 5 minutes
    $older_than          = $time - $inactive_time_limit;
 
    // Appel de la procédure stockée
    $stmt = $db->prepare("CALL update_connectes(:OLDER_THAN, :IP, :TIME, @nb_connectes);");
    $stmt->execute(array(
        ':OLDER_THAN'   => $older_than,
        ':IP'           => $ip,
        ':TIME'         => $time
    ));
 
    // Récupération du nombre de visiteurs connectés
    $result = $db->query("SELECT @nb_connectes");
    $row =  $result->fetch();
    $nb_connectes = $row['@nb_connectes'];
    return $nb_connectes;
}

  /**
   * Voilà c'est tout en gros.
   */