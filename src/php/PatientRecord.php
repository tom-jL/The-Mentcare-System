<?php
require "Patient.php";
require "Prescription.php";

class PatientRecord extends Patient {
    private $preferredClinic;
    private $prescriptions;
    private $diagnosis;
    private $allergies;
    private $patientNotes;

    /**
     * PatientRecord constructor.
     * On instance creation will set the array attributes prescriptions, allergies, and patientNotes to empty arrays
     * @param $firstName - parameter is the same as the Patent Class
     * @param $lastName - parameter is the same as the Patent Class
     * @param $gender - parameter is the same as the Patent Class
     * @param $dateOfBirth - parameter is the same as the Patent Class
     * @param $dateOfLastVisit - parameter is the same as the Patent Class
     * @param $preferredClinic - takes a string value to represent the patients preferred clinic location
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $dateOfLastVisit, $preferredClinic) {
        parent::__construct($firstName, $lastName, $gender, $dateOfBirth, $dateOfLastVisit);
        $this->setPreferredClinic($preferredClinic);
        $this->prescriptions = array();
        $this->setDiagnosis();
        $this->allergies = array();
        $this->patientNotes = array();
    }

    /**
     * @return mixed - returns a string value for the preferred clinic for a PatientRecord instance.
     */
    public function getPreferredClinic() {
        return $this->preferredClinic;
    }

    /**
     * @param mixed $preferredClinic - takes a string value as parameter to assign to instance preferredClinic
     * attribute.
     */
    public function setPreferredClinic($preferredClinic): void {
        $nameString = (string)trim($preferredClinic);
        $nameString = strtolower($nameString);
        $nameString = ucfirst($nameString);
        $this->preferredClinic = $nameString;
    }

    /**
     * @return mixed - returns an array of Prescription instances.
     */
    public function getPrescription() {
        return $this->prescriptions;
    }

    /**
     * @param mixed $prescription - takes a Prescription object as a parameter to append to the instance
     * currentPrescriptions array.
     * @throws Exception - throws exception of parameter is not a Prescription instance
     */
    public function addPrescription($prescription): void {
        if (get_class($prescription) == Prescription::class) {
            array_push($this->prescriptions, $prescription);
        } else {
            throw new Exception("Parameter not a Prescription Class object");
        }
    }

    /**
     * @return mixed - returns a string value for the diagnosis attribute if one exists, else returns the string 'undiagnosed'
     */
    public function getDiagnosis() {
        $loweredStrDiagnosis = (string)trim(strtolower($this->diagnosis));
        if ($this->diagnosis && $this->diagnosis !== $loweredStrDiagnosis) {
            return $this->diagnosis;
        } else {
            return "undiagnosed";
        }
    }

    /**
     * @param mixed $diagnosis - takes a string value to assign the diagnosis
     */
    public function setDiagnosis($diagnosis = null): void {
        $this->diagnosis = (string)trim($diagnosis);
    }

    /**
     * @return mixed - returns an array of strings to represent any allergies the patient may possess.
     */
    public function getAllergies() {
        return $this->allergies;
    }

    /**
     * Method to add a string value to the instance allergies attribute array.
     * @param mixed $allergies - takes a variable amount of strings to assign to instance allergies array attribute.
     */
    public function addAllergies(...$allergies): void {
        foreach ($allergies as $allergy) {
            $allergy = (string)trim(strtolower($allergy));
            array_push($this->allergies, $allergy);
        }
    }

    /**
     * @return mixed - returns an array of strings for the instance patientNotes attribute.
     */
    public function getPatientNotes() {
        return $this->patientNotes;
    }

    /**
     * @param mixed $patientNote - takes in a string value to assign to the instances patientNotes array attribute along
     * with a human readable date timestamp at the end of entry.
     * @throws Exception
     */
    public function addPatientNotes($patientNote): void {
        $timeStamp = new DateTime('now');
        $dateString = "[" . $timeStamp->format("Y-m-d H:i:s") . "]";
        $patientNote = (string)trim($patientNote) . " " . $dateString;
        array_push($this->patientNotes, $patientNote);
    }
}

//$pandadol = new Prescription("panadol", "2019-09-18", "2019-10-18");
//
//$sick = new PatientRecord("adam", "Apple", "male", "1990-01-30", "2019-09-18", "Townsville");
//print($sick->getFirstName()) . "\n";
//print($sick->getLastName()) . "\n";
//print($sick->getGender()) . "\n";
//print($sick->getDateOfBirth()) . "\n";
//print($sick->getDateOfLastVisit()) . "\n";
//print($sick->getPreferredClinic()) . "\n";
//$sick->addPrescription($pandadol);
//print_r($sick->getPrescription()) . "\n";
//print($sick->getDiagnosis()) . "\n";
//$sick->addAllergies("peanuts", "latex");
//print_r($sick->getAllergies()) . "\n";
//$sick->addPatientNotes("Patient is insane in the membrane and compulsively eats peanut butter while wearing spandex.");
//print_r($sick->getPatientNotes()) . "\n";