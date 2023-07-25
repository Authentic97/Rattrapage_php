<?php


class RendezVous {
    private $id;
    private $date;
    private $etat;
    private $patient;
    private $pdo;

    public function __construct($id, $date, $etat, $patient) {
        $this->id = $id;
        $this->date = $date;
        $this->etat = $etat;
        $this->patient = $patient;
        $this->pdo = new PDO("mysql:localhost;dbname=medicins", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE);
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getPatient() {
        return $this->patient;
    }

    public function save() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO RendezVous (id, date, etat, patient_numPatient) VALUES (:id, :date, :etat, :patient_numPatient)");
            $stmt->execute(array(
                ':id' => $this->id,
                ':date' => $this->date,
                ':etat' => $this->etat,
                ':patient_numPatient' => $this->patient->getNumPatient()
            ));
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    
}
