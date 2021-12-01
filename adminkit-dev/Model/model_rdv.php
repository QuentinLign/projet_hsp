<?php

class RDV
{


    private $nom;
    private $prenom;
    private $doctorSpecilization;
    private $doctor;
    private $RDVdate;
    private $RDVheure;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getDoctorSpecilization(){
        return $this->doctorSpecilization;
    }

    public function setDoctorSpecilization($doctorSpecilization){
        $this->doctorSpecilization = $doctorSpecilization;
    }

    public function getDoctor(){
        return $this->doctor;
    }

    public function setDoctor($doctor){
        $this->doctor = $doctor;
    }

    public function getRDVdate(){
        return $this->RDVdate;
    }

    public function setRDVdate($RDVdate){
        $this->RDVdate = $RDVdate;
    }

    public function getRDVheure(){
        return $this->RDVheure;
    }

    public function setRDVheure($RDVheure){
        $this->RDVheure = $RDVheure;
    }



}