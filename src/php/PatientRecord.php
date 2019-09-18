<?php
require "Patient.php";
require "Prescription.php";

class PatientRecord extends Patient {
    private $preferredClinic;
    private $currentPrescriptions;
    private $previousPrescriptions;
    private $diagnosis;
    private $allergies;
    private $patientNotes;

    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $dateOfLastVisit) {
        parent::__construct($firstName, $lastName, $gender, $dateOfBirth, $dateOfLastVisit);

    }

    /**
     * @return mixed
     */
    public function getPreferredClinic() {
        return $this->preferredClinic;
    }

    /**
     * @param mixed $preferredClinic
     */
    public function setPreferredClinic($preferredClinic): void {
        $this->preferredClinic = $preferredClinic;
    }

    /**
     * @return mixed
     */
    public function getCurrentPrescriptions() {
        return $this->currentPrescriptions;
    }

    /**
     * @param mixed $currentPrescriptions
     */
    public function setCurrentPrescriptions($currentPrescriptions): void {
        $this->currentPrescriptions = $currentPrescriptions;
    }

    /**
     * @return mixed
     */
    public function getPreviousPrescriptions() {
        return $this->previousPrescriptions;
    }

    /**
     * @param mixed $previousPrescriptions
     */
    public function setPreviousPrescriptions($previousPrescriptions): void {
        $this->previousPrescriptions = $previousPrescriptions;
    }

    /**
     * @return mixed
     */
    public function getDiagnosis() {
        return $this->diagnosis;
    }

    /**
     * @param mixed $diagnosis
     */
    public function setDiagnosis($diagnosis): void {
        $this->diagnosis = $diagnosis;
    }

    /**
     * @return mixed
     */
    public function getAllergies() {
        return $this->allergies;
    }

    /**
     * @param mixed $allergies
     */
    public function setAllergies($allergies): void {
        $this->allergies = $allergies;
    }

    /**
     * @return mixed
     */
    public function getPatientNotes() {
        return $this->patientNotes;
    }

    /**
     * @param mixed $patientNotes
     */
    public function setPatientNotes($patientNotes): void {
        $this->patientNotes = $patientNotes;
    }
}