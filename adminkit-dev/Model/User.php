<?php

class User
{
    private $id;
    private $prenom;
    private $email;
    private $role;
    private $mdp;
    private $nom;
    private $derniere_connexion;


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


    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function getDerniere_connexion(){
        return $this->derniere_connexion;
    }

    public function setDerniere_connexion($derniere_connexion){
        $this->derniere_connexion = $derniere_connexion;
    }

}

