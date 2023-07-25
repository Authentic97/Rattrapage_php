<?php

class Patient {
    private $numPatient;
    private $nomCompet;
    private $pdo;

    public function __construct($numPatient, $nomCompet) {
        $this->numPatient = $numPatient;
        $this->nomCompet = $nomCompet;
        $this->pdo = new PDO("mysql:localhost;dbname=medicins", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNumPatient() {
        return $this->numPatient;
    }

    public function getNomCompet() {
        return $this->nomCompet;
    }

    public function save() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Patient (numPatient, nomCompet) VALUES (:numPatient, :nomCompet)");
            $stmt->execute(array(':numPatient' => $this->numPatient, ':nomCompet' => $this->nomCompet));
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    
}
