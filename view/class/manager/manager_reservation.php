<?php
require_once 'model_reservation.php';
require_once 'traitement_reservation.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Manager{ //Déclaration de la classe Manager
public function reservation($inscrit){

 $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = :mail');
    $req->execute(array('mail'=>$inscrit->getmail()));
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
      $mail->Body = "<center><b>Lycée Robert Schuman</b><br><p>Bonjour ! Votre compte a été ouvert.</p></center></html>";
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
         header('Location: ../view/confirm_inscription.html');
      }

    }
  }

  }                        

?>
