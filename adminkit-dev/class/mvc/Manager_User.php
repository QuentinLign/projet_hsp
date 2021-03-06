<?php
//Manager
require_once 'Model/User.php';
require_once 'Model/model_rdv.php';
require_once '../../bdd/bdd.php';


require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Manager_User
{

        //Inscription dans la bdd
    public function inscription(User $inscrit)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $inscrit->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_inscr'] = "L'adresse éléctronique est déjà associée à un compte.";
            echo "<div style='color:#ff0000'>" . $_SESSION['erreur_inscr'];
            unset($_SESSION['erreur_inscr']);
        } else {

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
            $mail->Password = "Admwb2000/";
            $mail->SetFrom($inscrit->getEmail());
            $mail->Subject = "Ouverture de compte réussie";
            $mail->Body = "<div style=\"text-align: center;\"><b>Hôpital Sud Paris</b><br><p>Bonjour ! Votre compte a été ouvert.</p></div></html>";
            $mail->AddAddress($inscrit->getEmail());
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                $_SESSION['erreur_inscr'] = 'Addrese mail invalide';
                header('Location: ../../inscription.php');
            } else {
                echo "Le message a été envoyé";
                $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?,"PAT")');
                $req->execute(array($inscrit->getNom(), $inscrit->getPrenom(), $inscrit->getEmail(), SHA1($inscrit->getMdp())));
                header('Location: ../../confirm_inscription.html');
            }

        }
    }

    // Partie Connexion
    public function connexion(User $connexion) //méthode de connexion de l'uttilisateur, entre parenthèse, il y a les informations saisies par l'uttilisateur
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', ''); //on uttilise PDO, pour faire le pont entre PDO et PHP, on y entre si on veut se connecter en local, en l'occurence oui, le nom de la base de donnée, ainsi que les identifiants avec lesquels on uttilise SQL
        $req = $bdd->prepare('SELECT * from utilisateurs where email = ? AND mdp = ?'); // dans la variable req (alias requete), on prépare la requete SQL, littéralement, on demande dans la table 'uttilisateurs' si l'identifiant et le hash du mot de passe entré par l'uttilisateur existent dans la table au travers d'une même ligne
        $req->execute(array($connexion->getEmail(), SHA1($connexion->getMdp())));
        $donnee = $req->fetch();// on demande enfin d'executer la requet qui a été préalablement préparée. Dans la variable donnée, on trouve les informations de la ligne qui correspond à l'uttilisateur entré et le hash du mot de passe entré. Si tant est qu'ils existebt au sein d'une meme ligne. Sinon, la variable donnée n'a pas d'affectation
        if ($donnee) //Si la variable donnee existe, en conséquence, cela signifie que les identifiants sont valides puisque l'identifiant et le hash du mot de passe existent au sein d'une meme ligne.
        {
            $_SESSION['email'] = $donnee['email']; //on insère dans la session l'addresse mail entrée par l'uttilisateur dans le formulaire
            $_SESSION['nom'] = $donnee['nom']; //on insère dans la session le non de l'uttilisateur
            $_SESSION['prenom'] = $donnee['prenom'];
            $ref = $bdd->prepare('UPDATE utilisateurs SET date_connexion = NOW() WHERE email=?');
            $ref->execute(array($connexion->getEmail()));
            $donny = $ref->fetchall();
            if ($donnee['verif'] == 0)
              {
                header('Location: ../../recup_mdp.php');
                exit();
              }
            header('Location: ../../aurevoir.php');

            if ($donnee['role'] == "MED") {
                $_SESSION['role'] = $donnee['role'];
                header('Location: ../../medecin.php');
                exit();
            }
             if ($donnee['role'] == "PAT") {
                $_SESSION['role'] = $donnee['role'];
                header('Location: ../../rdv.php');
                exit();
            }
             if ($donnee['role'] == "ADMIN") {
                $_SESSION['role'] = $donnee['role'];
                header('Location: ../../datatableAdmin.php');
                exit();
            }
             if ($donnee['role'] == "URG") {
                $_SESSION['role'] = $donnee['role'];
                header('Location: ../../Urgentiste.php');
                exit();
            }



        }

        else {
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
    header('location: ../../mon-compte.php');
    //actualisation du nom de l'utilisateur dans les pages
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ?');
    $req->execute(array($email));
    $donnee = $req->fetch();
    $_SESSION['nom'] = $donnee['nom'];
    $_SESSION['prenom'] = $donnee['prenom'];
  }

  public function Etat(User $modif, $email)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('UPDATE utilisateurs SET nom = ?, verif = ? WHERE email = ?');
    $req->execute(array($modif->getNom(), $modif->getVerif(), $email));
    $_SESSION['succes_modif'] = 'Modification enregistré';
    header('location: ../../mon-compte.php');
    //actualisation du nom de l'utilisateur dans les pages
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ?');
    $req->execute(array($email));
    $donnee = $req->fetch();
    $_SESSION['verif'] = $donnee['verif'];
  }
  //Update des données utilisateur dans la bdd
  public function modif_mdp(User $verif, $mdp, $email)
  {
      $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
      $req = $bdd->prepare('SELECT * from utilisateurs where email = ? AND mdp = ?');
      $req->execute(array($email, SHA1($verif->getMdp())));
      $donnee = $req->fetch();
      if ($donnee) {
          $req = $bdd->prepare('UPDATE utilisateurs SET mdp = ? WHERE email = ?');
          $req->execute(array(SHA1($mdp), $email));
          header('location: ../../mon-compte.php');
          $_SESSION['message_mdp'] = 'Modification enregistré';
          echo '<scrip>$(document).ready(function()){
        $("nav").toggleClass("active");
        return false;
      });</script>';
      } else {
          echo "Mailer Error: " . $email->ErrorInfo;
          $_SESSION['erreur_inscr'] = 'Mot de passe invalide';
          header('Location: ../../mon-compte.php');


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

 public function modif_etat(Etat $activation)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('UPDATE utilisateurs SET verif = ? WHERE nom = ?');
    $req->execute(array($activation->getVerif()));
    $_SESSION['succes_modif'] = 'Modification enregistré';
    header('location: ../../mon-compte.php');
    //actualisation du nom de l'utilisateur dans les pages
    $req = $bdd->prepare('SELECT * from utilisateurs where email = ?');
    $req->execute(array($verif));
    $donnee = $req->fetch();
    $_SESSION['verif'] = $donnee['verif'];

  }


  //inscription d'un compte admin
    public function inscrip_patient_admin(User $inscription)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $inscription->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
            header('Location: ../../ajout_admin.php');
        } else {
            $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "PAT")');
            $req->execute(array($inscription->getNom(), $inscription->getPrenom(), $inscription->getEmail(), SHA1($inscription->getMdp(),$inscription->getRole())));

            $a=$req;
          if ($a == true) {
              header('Location: ../../confirmation_admin/conf_ajoutePatient.html');
          }else{
              echo "erreur";

          }
      }
    }

    public function inscrip_patient(User $inscription)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $inscription->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
            header('Location: ../../ajout_admin.php');
        } else {
            $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "PAT")');
            $req->execute(array($inscription->getNom(), $inscription->getPrenom(), $inscription->getEmail(), SHA1($inscription->getMdp(),$inscription->getRole())));

            $a=$req;
            if ($a == true) {
                header('Location: ../../confirmation/conf_ajoutePatient.html');
            }else{
                echo "erreur";

            }
        }
    }

    public function inscrip_med(User $inscription)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $inscription->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
            header('Location: ../view/ajout_admin.php');
        } else {
            $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "MED")');
            $req->execute(array($inscription->getNom(), $inscription->getPrenom(), $inscription->getEmail(), SHA1($inscription->getMdp(),$inscription->getRole())));

            $a = $req;
            if ($a == true) {
                header('Location: ../../confirmation_admin/conf_ajouteMedecin.html');
            }else{
                echo "erreur";

            }

            }
        }

    public function adm(User $admin)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $admin->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
            header('Location: ../view/ajout_admin.php');
        } else {
            $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "ADMIN")');
            $req->execute(array($admin->getNom(), $admin->getPrenom(), $admin->getEmail(), SHA1($admin->getMdp(),$admin->getRole())));

            $a = $req;
            if ($a == true) {
                header('Location: ../../confirmation_admin/conf_admin.html');
            }else{
                echo "erreur";

            }

        }
    }

    public function ins_urg(User $inscription)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $req->execute(array('email' => $inscription->getEmail()));
        $donnee = $req->fetch();
        if ($donnee) {
            $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
            header('Location: ../view/ajout_admin.php');
        } else {
            $req = $bdd->prepare('INSERT into utilisateurs (nom, prenom, email, mdp, role) value(?,?,?,?, "URG")');
            $req->execute(array($inscription->getNom(), $inscription->getPrenom(), $inscription->getEmail(), SHA1($inscription->getMdp(),$inscription->getRole())));

            $a = $req;
            if ($a == true) {
                header('Location: ../../confirmation_admin/conf_ajouteUrg.html');
            }else{
                echo "Erreur";

            }

        }
    }


    //Ajout dossier_admission
  public function dossier_admission(Dossier_admission $dossier)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * FROM dossier_admission WHERE nom = :nom');
    $req->execute(array('nom'=>$dossier->getNom()));
    $donnees = $req->fetch();
    if($donnees)
    {
      $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
      header('Location: ../view/ajout_admin.php');
    }
    else
    {
      $req = $bdd->prepare('INSERT into dossier_admission (nom, date_naissance, adresse_postale, mutuelle, numero_secu, option, regime_specifique) value(?,?,?,?,?,?,?)');
      $req -> execute(array($dossier->getNom(), $dossier->getDate_naissance(), $dossier->getAdresse_postale(), $dossier->getMutuelle(), $dossier->getNumero_secu(), $dossier->getOption(), $dossier->getRegime_specifique()));

    header('location: ../confirmation/conf_Urg.php');
          $_SESSION['message_mdp'] = 'Modification enregistré';
    }
  }




public function diagnostic(Diagnostic $diag)
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
    $req = $bdd->prepare('SELECT * FROM diagnostic');
    $req->execute(array('nom'=>$diag->getNom()));
    $donnees = $req->fetch();
    if($donnees)
    {
      $_SESSION['erreur_add_admin'] = "L'identifiant est déjà utilisé.";
      header('Location: ../view/erreur.php');
    }
    else
    {

      $req = $bdd->prepare('INSERT into diagnostic (nom, symptomes, date, niveau_urgence, date_rdv, heure, enregistrement, id_cabinet) value(?,?,?,?,?,? "ATTENTE", ?)');
      $req -> execute(array($diagnostic->getNom(), $diagnostic->getSymptomes(), $diagnostic->getDate(), $diagnostic->getNiveau_urgence(),$diagnostic->getDate_rdv(),$diagnostic->getHeure(),$diagnostic->getEnregistrement(), $diagnostic->getId_cabinet()));


    header('location: ../../hospitalisation.php');
          $_SESSION['message_mdp'] = 'Modification enregistré';
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

    public function rendezvousPat(RDV $rdv)
    {
        $bdd = new bdd();
        $req = $bdd->getStart()->prepare('INSERT into rendezvous(nom,prenom,doctorSpecilization,doctor,RDVdate,RDVheure) values(:nom,:prenom,:doctorSpecilization,:doctor,:RDVdate,:RDVheure)');
            $a =$req->execute(array(
                'nom'=>$rdv->getNom(),
                'prenom'=>$rdv->getPrenom(),
                'doctorSpecilization'=>$rdv->getDoctorSpecilization(),
                'doctor'=>$rdv->getDoctor(),
                'RDVdate'=>$rdv->getRDVdate(),
                'RDVheure'=>$rdv->getRDVheure()
            ));

            if ($a == true ) {
                header('Location: ../../confirmation/conf_rdvPatient.html');
            } else {
                echo "c'est pas bon";
            }
        }

        public function offre(RDV $rdv)
        {
            $bdd = new bdd();
            $req = $bdd->getStart()->prepare('INSERT into rendezvous(nom,prenom,doctorSpecilization,doctor,RDVdate,RDVheure) values(:nom,:prenom,:doctorSpecilization,:doctor,:RDVdate,:RDVheure)');
                $a =$req->execute(array(
                    'nom'=>$rdv->getNom(),
                    'prenom'=>$rdv->getPrenom(),
                    'doctorSpecilization'=>$rdv->getDoctorSpecilization(),
                    'doctor'=>$rdv->getDoctor(),
                    'RDVdate'=>$rdv->getRDVdate(),
                    'RDVheure'=>$rdv->getRDVheure()
                ));

                if ($a == true ) {
                    header('Location: ../../confirmation/conf_rdvPatient.html');
                } else {
                    echo "c'est pas bon";
                }
            }

    public function rendezvous(RDV $rdv)
    {
        $bdd = new bdd();
        $req = $bdd->getStart()->prepare('INSERT into rendezvous(nom,prenom,doctorSpecilization,doctor,RDVdate,RDVheure) values(:nom,:prenom,:doctorSpecilization,:doctor,:RDVdate,:RDVheure)');
        $a =$req->execute(array(
            'nom'=>$rdv->getNom(),
            'prenom'=>$rdv->getPrenom(),
            'doctorSpecilization'=>$rdv->getDoctorSpecilization(),
            'doctor'=>$rdv->getDoctor(),
            'RDVdate'=>$rdv->getRDVdate(),
            'RDVheure'=>$rdv->getRDVheure()
        ));

        if ($a == true ) {
            header('Location: ../../confirmation/conf_rdvMedecin.html');
        } else {
            echo "c'est pas bon";
        }
    }

    public function conges(RDV $cong)
    {
        $bdd = new bdd();
        $req = $bdd->getStart()->prepare('INSERT into conges(doctor,Date_de_debut,Date_de_fin) values(:doctor,:Date_de_debut,:Date_de_fin)');
        $a =$req->execute(array(
            'doctor'=>$cong->getDoctor(),
            'Date_de_debut'=>$cong->getDate_de_debut(),
            'Date_de_fin'=>$cong->getDate_de_fin()
        ));

        if ($a == true ) {
            header('Location: ../../confirmation/conf_rdvMedecin.html');
        } else {
            echo "c'est pas bon";
        }
    }

    public function supprimer()
    {
        $bdd = new bdd();
        $suppr_id = ($_GET['id']);

        $req = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
        $req->execute(array($suppr_id));

        if ($req) {
            echo 'L utilisateur à été supprimer.';
        }else{
            echo "probleme";
        }
    }

    }
?>
