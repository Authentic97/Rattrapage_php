<?php

class Consultation extends RendezVous {
    private $medecin;
    private $medicament;
    private $pdo;

    public function __construct($id, $date, $etat, $patient, $medecin, $medicament) {
        parent::__construct($id, $date, $etat, $patient);
        $this->medecin = $medecin;
        $this->medicament = $medicament;
        $this->pdo = new PDO("mysql:localhost;dbname=medicins", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getMedecin() {
        return $this->medecin;
    }

    public function getMedicament() {
        return $this->medicament;
    }

    public function save() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Consultation (id, medecin, medicament) VALUES (:id, :medecin, :medicament)");
            $stmt->execute(array(
                ':id' => $this->getId(),
                ':medecin' => $this->medecin,
                ':medicament' => implode(',', $this->medicament)
            ));
            parent::save();
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

}
