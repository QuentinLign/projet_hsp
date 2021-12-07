<?php
class Dossier_admission
{

      private $id;
      private $nom;
      private $date_naissance;
      private $adresse_postale;
      private $mutuelle;
      private $numero_secu;
      private $option;
      private $regime_specifique;

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

  public function getNom()
  {
    return $this->nom;
  }

  public function getDate_naissance()
  {
    return $this->date_naissance;
  }

  public function getAdresse_postale()
  {
    return $this->adresse_postale;
  }

  public function getMutuelle()
  {
    return $this->mutuelle;
  }

  public function getNumero_secu()
  {
    return $this->numero_secu;
  }

  public function getOption()
  {
    return $this->option;
  }

  public function getRegime_specifique()
  {
    return $this->regime_specifique;
  }

    public function setId($id){
    $this->id = $id;
  }

    public function setNom($nom){
    $this->nom = $nom;
  }

    public function setDate_naissance($date_naissance){
    $this->date_naissance = $date_naissance;
  }

    public function setAdresse_postale($adresse_postale){
    $this->adresse_postale = $adresse_postale;
  }

    public function setMutuelle($mutuelle){
    $this->mutuelle = $mutuelle;
  }

    public function setNumero_secu($numero_secu){
    $this->numero_secu = $numero_secu;
  }

    public function setOption($option){
    $this->option = $option;
  }

    public function setRegime_specifique($regime_specifique){
    $this->regime_specifique = $regime_specifique;
  }

}
?>