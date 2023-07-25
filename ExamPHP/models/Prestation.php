<?php

class Prestation extends RendezVous {
    private $type;
    private $pdo;

    public function __construct($id, $date, $etat, $patient, $type) {
        parent::__construct($id, $date, $etat, $patient);
        $this->type = $type;
        $this->pdo = new PDO("mysql:localhost;dbname=medicins", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getType() {
        return $this->type;
    }

    public function save() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Prestation (id, type) VALUES (:id, :type)");
            $stmt->execute(array(':id' => $this->getId(), ':type' => $this->type));
            parent::save();
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }


}
