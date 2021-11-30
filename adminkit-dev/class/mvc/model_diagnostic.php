<?php
class Diagnostic
{
 private $id;
  private $nom;
  private $date;
  private $symptomes;
  private $niveau_urgence;
  private $heure;
  private $date_rdv;
  private $enregistrement;
  private $id_cabinet;

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
    public function getDate(){
    return $this->date;
  }
    public function getSymptomes(){
    return $this->symptomes;
  }

  public function getNiveau_urgence(){
    return $this->niveau_urgence;
  }
   public function getHeure(){
    return $this->heure;
  }
       public function getDate_rdv()
    {
        return $this->date_rdv;
    }
     public function getEnregistrement()
  {
    return $this->enregistrement;
  }
    public function getId_cabinet()
  {
    return $this->id_cabinet;
  }

      public function setNom($nom){
    $this->nom = $nom;
  }
    public function setDate($date){
    $this->date = $date;
  }
    public function setSymptomes($symptomes){
    $this->symptomes = $symptomes;
  }
    public function setNiveau_urgence($niveau_urgence){
    $this->niveau_urgence = $niveau_urgence;
  }
    public function setHeure($heure){
    $this->heure = $heure;
  }

  public function setDate_rdv($date_rdv)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($date_rdv)) {
      $this->date_rdv = $date_rdv;
    }
  }
      public function setEnregistrement($enregistrement)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }
    public function setId_cabinet($id_cabinet){
    $this->id_cabinet = $id_cabinet;
  }
}
?>