<?php
//Manager
require_once(__DIR__.'/User.php');
require 'view/class/mvc/vendor/autoload.php';

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
         header('Location: ../view/confirm_inscription.html');
      }

    }
  }

  // Partie Connexion
  public function connexion(User $connexion) //méthode de connexion de l'uttilisateur, entre parenthèse, il y a les informations saisies par l'uttilisateur
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root',''); //on uttilise PDO, pour faire le pont entre PDO et PHP, on y entre si on veut se connecter en local, en l'occurence oui, le nom de la base de donnée, ainsi que les identifiants avec lesquels on uttilise SQL
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ? AND mdp = ?'); // dans la variable req (alias requete), on prépare la requete SQL, littéralement, on demande dans la table 'uttilisateurs' si l'identifiant et le hash du mot de passe entré par l'uttilisateur existent dans la table au travers d'une même ligne
    $req->execute(array($connexion->getEmail(), SHA1($connexion->getMdp())));
    $donnee = $req->fetch();// on demande enfin d'executer la requet qui a été préalablement préparée. Dans la variable donnée, on trouve les informations de la ligne qui correspond à l'uttilisateur entré et le hash du mot de passe entré. Si tant est qu'ils existebt au sein d'une meme ligne. Sinon, la variable donnée n'a pas d'affectation
    if ($donnee) //Si la variable donnee existe, en conséquence, cela signifie que les identifiants sont valides puisque l'identifiant et le hash du mot de passe existent au sein d'une meme ligne.
    {
      $_SESSION['email'] = $donnee['email']; //on insère dans la session l'addresse mail entrée par l'uttilisateur dans le formulaire
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
      if ($donnee['verif'] == 0)
      {
        header('Location: ../view/recup_mdp.php');
        exit();
      }
      header('Location: ../index.php');
    }
    else
    {
      $_SESSION['erreur_co'] = true;
      header('Location: ../view/connexion.php');
    }
  }


}
?>
