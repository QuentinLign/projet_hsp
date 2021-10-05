<?php

class reservation { //Déclaration de la classe reservation
//Déclaration des attribsuts
  private $_nom;
  private $_prenom;
  private $_mail;
  private $_mdp;


  public function __construct($nom, $prenom, $mail, $mdp){
//Partie Set
      $this->setnom($nom);
      $this->setprenom($prenom);
      $this->setmail($mail);
	  $this->setmdp($mdp);

}

public function setnom($nom){
  if(empty($nom)){
    trigger_error('la variable doit etre un caractere'); 
    return;
  }
  $this->_nom = $nom;
}
public function setprenom($prenom){
  if(empty($prenom)){
    trigger_error('la variable doit etre un caractere');
    return;
  }
  $this->_prenom = $prenom;
}
public function setmail($mail){
  if(empty($mail)){
    trigger_error('la variable doit etre un caractere');
    return;
  }
  $this->_mail = $mail;
}

public function setmdp($mdp){
  if(empty($mdp)){
    trigger_error('la variable doit etre un caractere');
    return;
  }
  $this->_mdp = $mdp;
}

//Partie Get
public function getnom(){
  return $this->_nom;
}
public function getprenom(){
  return $this->_prenom;
}
public function getmail(){
  return $this->_mail;
}
public function getmdp(){
  return $this->_mdp;
}

}
?>
