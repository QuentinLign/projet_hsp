<?php
//Manager
require_once(__DIR__.'/User.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Manager_User
{

  private $_nom;
  private $_prenom;
  private $_email;
  private $_mdp;

//Inscription dans la bdd
  public function inscription(User $inscrit)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
    $req->execute(array('email'=>$inscrit->getEmail()));
    $donnee = $req->fetch();
    if($donnee)
    {
      $_SESSION['erreur_inscr'] = "L'adresse éléctronique est déjà associée à un compte.";
      header('Location: ../view/inscription.php');
    }
    else
    {

      $mail = new PHPMailer(); // fondation d'un nouvel objet
      $mail->CharSet = 'UTF-8';
      $mail->IsSMTP(); // activer SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication activée
      $mail->SMTPSecure = 'ssl'; // transfer sécurisé activé et néscéssaire notement pour gmail
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "lignani.quentin.schuman@gmail.com";
      $mail->Password = "Admwb2000";
      $mail->SetFrom($inscrit->getEmail());
      $mail->Subject = "Ouverture de compte réussie";
      $mail->Body = "<center><b>Hôpital Sud Paris</b><br><p>Bonjour ! Votre compte a été ouvert.</p></center></html>";
      $mail->AddAddress($inscrit->getEmail());
      if(!$mail->Send())
      {
         echo "Mailer Error: " . $mail->ErrorInfo;
         $_SESSION['erreur_inscr'] = 'Addrese mail invalide';
         header('Location: ../view/inscription.php');
      }
      else
      {
         echo "Le message a été envoyé";
         $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp) value(?,?,?,?)');
         $req -> execute(array($inscrit->getNom(), $inscrit->getPrenom(), $inscrit->getEmail(), SHA1($inscrit->getMdp())));
         header('Location: ../../confirm_inscription.html');
      }

    }
  }

    public function rendezvous(User $rdv)
    {
        $bdd = new bdd;
        $req = $bdd->prepare('SELECT * FROM rendezvous');
            $req->execute(array('nom'=>$rdv->getNom()));
            $donnees = $req->fetch();
            if($donnees)
            {
              $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
              header('Location: ../view/erreur.php');
         }
            else{
                $req=$bdd->getStart()->prepare("insert into rendezvous(nom,prenom,doctorSpecilization,docteur,userID,RDVdate,RDVheure) values(?,?,?,?,".$_SESSION['id'].',?,?)');
                $req -> execute(array($rdv->getNom(), $rdv->getPrenom(), $rdv->getDoctorspecilization(), $rdv->getDocteur(), $rdv->getRDVdate(), ($rdv->getRDVheure())));
            }
        header('location: ../../hospitalisation.php');
           $_SESSION['message_mdp'] = 'Modification enregistré';
        }


  // Partie Connexion
  public function connexion(User $connexion) 
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ? AND mdp = ?'); 
    $req->execute(array($connexion->getEmail(), SHA1($connexion->getMdp())));
    $donnee = $req->fetch();
    if ($donnee)
    {
      $_SESSION['email'] = $donnee['email']; 
      $_SESSION['nom'] = $donnee['nom']; //on insère dans la session le non de l'uttilisateur
      $_SESSION['prenom'] = $donnee['prenom'];
      $ref = $bdd->prepare('UPDATE utilisateurs SET derniere_connexion = NOW() WHERE email=?');
      $ref->execute(array($connexion->getEmail()));
      $donny = $ref->fetchall();
      if ($donnee['role'] == "ADMIN")
      {
        $_SESSION['role'] = $donnee['role'];
        header('Location: ../../index.php');
        exit();
      }
      if ($donnee['verif'] == 1)
      {
        header('Location: ../../../view/index.php');
        exit();
      }
      header('Location: ../../../view/index.php');
    }
    else
    {
      $_SESSION['erreur_co'] = true;
    }
  }

//Update des données utilisateur dans la bdd
  public function modification(User $modif, $email)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('UPDATE utilisateurs SET nom = ?, prenom = ? WHERE email = ?');
    $req->execute(array($modif->getNom(), $modif->getPrenom(), $email));
    $_SESSION['succes_modif'] = 'Modification enregistré';
    header('location: ../view/parametres_du_compte.php#nav-statue');
    //actualisation du nom de l'utilisateur dans les pages
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ?');
    $req->execute(array($email));
    $donnee = $req->fetch();
    $_SESSION['nom'] = $donnee['nom'];
    $_SESSION['prenom'] = $donnee['prenom'];
  }

  //Update des données utilisateur dans la bdd
  public function modif_mdp(User $verif, $mdp, $email)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ? AND mdp = ?');
    $req->execute(array($email, SHA1($verif->getMdp())));
    $donnee = $req->fetch();
    if ($donnee)
    {
      $req = $bdd->prepare('UPDATE utilisateurs SET mdp = ? WHERE email = ?');
      $req->execute(array(SHA1($mdp), $email));
      header('location: ../view/parametres_du_compte.php#nav-password');
      $_SESSION['message_mdp'] = 'Modification enregistré';
      echo '<scrip>$(document).ready(function()){
        $("nav").toggleClass("active");
        return false;
      });</script>';
    }
    else
    {
      $_SESSION['message_mdp'] = 'Mauvais mot de passe';
      header('location: ../view/parametres_du_compte.php#nav-password');
      echo '<scrip>$(document).ready(function(){
        console.log( "ready!" );
      });</script>';
    }


  }

  //Update des données utilisateur dans la bdd
  public function recup_mdp(User $change, $email)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('UPDATE utilisateurs SET mdp = ?, verif = 1 WHERE email = ?');
    $req->execute(array(SHA1($change->getMdp()), $email));
    header('location: ../index.php');
  }


  //inscription d'un compte admin
  public function inscrip_admin(User $inscription)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
    $req->execute(array('email'=>$inscription->getEmail()));
    $donnee = $req->fetch();
    if($donnee)
    {
      $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
      header('Location: ../view/ajout_admin.php');
    }
    else
    {
      $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "admin")');
      $req -> execute(array($inscription->getNom(), $inscription->getPrenom(), $inscription->getEmail(), SHA1($inscription->getMdp())));

      $_SESSION['add_admin'] = "Un compte administrateur a été ajouter avec succès.";
      header('Location: ../view/ajout_admin.php');
    }
  }

  //récupération des données utilisateur pour un affichage
  public function recup_user()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->query('SELECT * FROM utilisateurs');
    $donnee = $req->fetchall();
    return $donnee;
  }

}
?>