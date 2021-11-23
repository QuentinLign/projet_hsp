<?php

class User
{

  private $id;
  private $nom;
  private $prenom;
  private $email;
  private $mdp;
  private $etat_compte;
  private $date;


    public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) {
      $method = 'set' . ucfirst($key);

      if (method_exists($this, $method)) {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }


 public function getId()
  {
    return $this->id;
  }
  public function getSpecilization()
    {
        return $this->specilization;
    }

  public function getMdp()
  {
    return $this->mdp;
  }

   public function setPrenom($prenom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }

  public function setSpecialite($specialite){
    $this->specialite = $specialite;
  }