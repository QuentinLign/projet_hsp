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
        header('Location: ../view/admin/parametres_admin.php');
        exit();
      }
      if ($donnee['verif'] == 1)
      {
        header('Location: ../../../view/index.html');
        exit();
      }
      header('Location: ../../../view/index.html');
    }
    else
    {
      $_SESSION['erreur_co'] = true;
    }
  }


}
?>
