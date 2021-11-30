<?php

class User
{ 
  private $id;
  private $prenom;
  private $email;
  private $mdp;
  private $nom;
  private $derniere_connexion;
  private $specialite;
  private $doctorspecilization;



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

// Liste des getters

  public function getId()
  {
    return $this->id;
  }

  public function getMdp()
  {
    return $this->mdp;
  }
  public function getNom()
  {
    return $this->nom;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getEmail()
  {
    return $this->email;
  }

    public function getMail()
    {
        return $this->mail;
    }

        public function getDate_rdv()
    {
        return $this->date_rdv;
    }

  public function getRole()
  {
    return $this->role;
  }

   public function getEnregistrement()
  {
    return $this->enregistrement;
  }

  public function getId_cabinet()
  {
    return $this->id_cabinet;
  }


  // Liste des setters

  public function setId($id)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $id = (int)$id;

    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($id > 0) {
      // Si c'est le cas, on affecte la valeur à l'attribut id.
      $this->id = $id;
    }
  }

  public function setNom($nom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($nom)) {
      $this->nom = $nom;
    }

  }

  public function setPrenom($prenom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }

    public function setEnregistrement($enregistrement)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }


  public function setEmail($email)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($email)) {
      $this->email = $email;
    }
  }

    public function setMail($mail)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($mail)) {
            $this->mail = $mail;
        }
    }

    public function setSpecilization($specilization)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($specilization)) {
            $this->specilization = $specilization;
        }
    }

  public function setMdp($mdp)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($mdp)) {
      $this->mdp = $mdp;
    }
  }

    public function setDate_rdv($date_rdv)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($date_rdv)) {
      $this->date_rdv = $date_rdv;
    }
  }

  public function setRole($role)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($role)) {
      $this->role = $role;
    }
  }



  public function getEtat_compte(){
    return $this->etat_compte;
  }

  public function setEtat_compte($etat_compte){
    $this->etat_compte = $etat_compte;
  }

  public function getDate(){
    return $this->date;
  }

  public function setDate($date){
    $this->date = $date;
  }

  public function getId_utilisateur(){
    return $this->id_utilisateur;
  }

  public function setId_utilisateur($id_utilisateur){
    $this->id_utilisateur = $id_utilisateur;
  }

  public function getSymptomes(){
    return $this->symptomes;
  }

  public function setSymptomes($symptomes){
    $this->symptomes = $symptomes;
  }

  public function getNiveau_urgence(){
    return $this->niveau_urgence;
  }

  public function setNiveau_urgence($niveau_urgence){
    $this->niveau_urgence = $niveau_urgence;
  }

  public function getId_urgentiste(){
    return $this->id_urgentiste;
  }

  public function setId_urgentiste($id_urgentiste){
    $this->id_urgentiste = $id_urgentiste;
  }

  public function getDerniere_connexion(){
    return $this->derniere_connexion;
  }

  public function setDerniere_connexion($derniere_connexion){
    $this->derniere_connexion = $derniere_connexion;
  }

  public function getDate_naissance(){
    return $this->date_naissance;
  }

  public function setDate_naissance($date_naissance){
    $this->date_naissance = $date_naissance;
  }

  public function getAdresse_postale(){
    return $this->adresse_postale;
  }

  public function setAdresse_postale($adresse_postale){
    $this->adresse_postale = $adresse_postale;
  }

  public function getMutuelle(){
    return $this->mutuelle;
  }

  public function setMutuelle($mutuelle){
    $this->mutuelle = $mutuelle;
  }

   public function setId_cabinet($id_cabinet){
    $this->id_cabinet = $id_cabinet;
  }

  public function getNumero_secu(){
    return $this->numero_secu;
  }

  public function setNumero_secu($numero_secu){
    $this->numero_secu = $numero_secu;
  }

  public function getOption(){
    return $this->option;
  }

  public function setOption($option){
    $this->option = $option;
  }

  public function getId_medecins(){
    return $this->id_medecins;
  }

  public function setId_medecins($id_medecins){
    $this->id_medecins = $id_medecins;
  }

  public function getRegime_specifique(){
    return $this->regime_specifique;
  }

  public function setRegime_specifique($regime_specifique){
    $this->regime_specifique = $regime_specifique;
  }

  public function getDoctorspecilization(){
    return $this->doctorspecilization;
  }

  public function setDoctorspecilization($doctorspecilization){
    $this->doctorspecilization = $doctorspecilization;
  }

  public function getHeure(){
    return $this->heure;
  }

  public function setHeure($heure){
    $this->heure = $heure;
  }

  public function getSalle(){
    return $this->salle;
  }

  public function setSalle($salle){
    $this->salle = $salle;
  }

    public function getRDVheure(){
        return $this->RDVheure;
    }

    public function setRDVheure($RDVheure){
        $this->RDVheure = $RDVheure;
    }

    public function getRDVdate(){
        return $this->RDVdate;
    }

    public function setRDVdate($RDVdate){
        $this->RDVdate = $RDVdate;
    }


}
