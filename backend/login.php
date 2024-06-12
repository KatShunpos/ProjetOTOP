<?php  


require "config/commandes.php";
require "config/connexion.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_OTOP</title>
</head>

<body>
<form method="post">
    <section id="login">
        <div class="container">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="motdepasse">Mot de passe</label>
    <input type="password" class="form-control" name="motdepasse">
  </div>
  <button type="submit" class="btn btn-primary" name="valider">se connecter</button>
        </div>
    </section>
    </form>
</body>
</html>





<?php
 // Démarre une nouvelle session ou reprend une session existante
session_start();
//si le bouton se connecter est cliqué alors on execute le code ci-dessous
if(isset($_POST['valider'] )){
    // Vérifie si les champs "email" et "motdepasse" ne sont pas vides
    if(!empty($_POST['email']) AND!empty($_POST['motdepasse'])){
    // Récupère et sécurise les valeurs des champs "email" et "motdepasse"
        $email =htmlspecialchars($_POST['email']);
        $mdp =sha1($_POST['motdepasse']);
        // Hache le mot de passe avec SHA-1 (à remplacer par password_hash pour plus de sécurité)
      
        // Prépare une requête SQL pour vérifier si l'utilisateur existe avec les informations fournies
        $recupUser = $access->prepare("SELECT * FROM utilisateur WHERE email =? AND motdepasse =? LIMIT 1");
        //on execute la requete preparée avec les parametres email et motdepasse
        $recupUser->execute(array($email, $mdp));
        
        // Prépare une requête SQL pour récupérer le nom de l'utilisateur basé sur l'email
        $recupnom = $access->prepare("SELECT nom FROM utilisateur WHERE email = :email");
        // Exécute la requête avec le paramètre "email"
        $recupnom->execute(array(':email' => $email));

     
        // Compte le nombre de lignes retournées par la requête (doit être 1 si l'utilisateur existe)
        $checkuser = $recupUser->rowCount();
        // Récupère les informations de l'utilisateur (type d'utilisateur, etc.)
        $isAdmin = $recupUser->fetch();
        
        // Si l'utilisateur existe, crée une session avec les informations de l'utilisateur
        if($checkuser > 0){
          $_SESSION['email'] = $email;
          $_SESSION['motdepasse'] = $mdp;
          $_SESSION['type'] = $isAdmin['type'];
                  // Redirige l'utilisateur vers la page "indexlog.php"
                 header("location:indexlog.php");
          } 
        // Vérifie à nouveau si l'utilisateur existe (cette condition est redondante et inutile)
        if ($recupUser->rowCount() > 0) {
            $user = $recupUser->fetch(); 
          // Récupère les informations de l'utilisateur
            $nom = $recupnom->fetchColumn(); 
          // Récupère le nom de l'utilisateur
            $_SESSION['nom'] = $nom;
          $_SESSION['email'] = $email;
          $_SESSION['motdepasse'] = $mdp;
          $_SESSION['userid'] = $user['userid'];
          // Redirige l'utilisateur vers la page "indexlog.php"

          header('location:indexlog.php');
          }
              // Redirection vers la page utilisateur
              
          }
      }
   
      
  
?>
