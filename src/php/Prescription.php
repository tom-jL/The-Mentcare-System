<?php

class Prescription {
    private $medicationName;
    private $prescriptionStartDate;
    private $prescriptionEndDate;
    private $isControlledSubstance;

    public function __construct($medicationName, $prescriptionStartDate, $prescriptionEndDate, $isControlledSubstance = null) {
        $this->setMedicationName($medicationName);
        $this->setPrescriptionStartDate($prescriptionStartDate);
        $this->setPrescriptionEndDate($prescriptionEndDate);
        $this->setIsControlledSubstance($isControlledSubstance);
    }

    /**
     * @return mixed - returns a string value for the medication name.
     */
    public function getMedicationName() {
        return $this->medicationName;
    }

    /**
     * @param mixed $medicationName - takes a string value for the medication name and trims the parameter and assigns
     * to medicationName attribute.
     */
    public function setMedicationName($medicationName): void {
        $medicationName = (string)trim($medicationName);
        $this->medicationName = $medicationName;
    }

    /**
     * @return mixed - return String formatted value in "YYYY-mm-dd" format for prescriptionStartDate attribute
     */
    public function getPrescriptionStartDate() {
        return $this->prescriptionStartDate->format("Y-m-d");
    }

    /**
     * Method to assign a DateTime object via a string parameter for the prescriptionStartDate attribute for the class instance.
     * Allows for prescriptions to be set for a future date but not a past date.
     * @param mixed $prescriptionStartDate - takes a string value in the date format of "YYYY-mm-dd" to be converted
     * into a DateTime object for assigning to the prescriptionStartDate attribute.
     * @throws Exception - throws Exception if string format entered for the date is not in "YYYY-mm-dd" format
     * or if a new prescription date is being set for a past date.
     */
    public function setPrescriptionStartDate($prescriptionStartDate): void {
        $currentDate = new DateTime("today");
        try {
            $startDate = new DateTime($prescriptionStartDate);
            //if statement to check if prescription date is being set for a past date using Unix epoch.
            if ($startDate->format("U") < $currentDate->format("U")) {
                throw new Exception("Cannot create new prescription for a previous date from today");
            }
            $this->prescriptionStartDate = $startDate;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string format, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return mixed - return String formatted value in "YYYY-mm-dd" format for prescriptionEndDate attribute
     */
    public function getPrescriptionEndDate() {
        return $this->prescriptionEndDate->format("Y-m-d");
    }

    /**
     * Method to assign a DateTime object via a string parameter for the prescriptionEndDate attribute for the class instance.
     * Allows for prescriptions to be set for a future date but not a past date.
     * @param mixed $prescriptionEndDate - takes a string value in the date format of "YYYY-mm-dd" to be converted
     * into a DateTime object for assigning to the prescriptionEndDate attribute.
     * @throws Exception -  - throws Exception if string format entered for the date is not in "YYYY-mm-dd" format
     * or if a new prescription date is being set for a past date.
     */
    public function setPrescriptionEndDate($prescriptionEndDate): void {
        $currentDate = new DateTime("today");
        try {
            $endDate = new DateTime($prescriptionEndDate);
            //if statement to check if prescription date is being set for a past date using Unix epoch.
            if ($endDate->format("U") < $currentDate->format("U")) {
                throw new Exception("Cannot create new prescription for a previous date from today");
            }
            $this->prescriptionEndDate = $endDate;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string format, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return mixed - returns a string of "True" or "False" using the boolean value of isControlledSubstance
     * attribute. Returns a string as calling the attribute directly will either output 1 or null.
     */
    public function getIsControlledSubstance() {
        if ($this->isControlledSubstance) {
            return "True";
        } else {
            return "False";
        }
    }

    /**
     * @param mixed $isControlledSubstance - parameter defaults to null value if not entered and assigns isControlledSubstance to False.
     * if the string 'true' is entered will assign attribute to True, else all other input will throw Exception.
     * @throws Exception - throws Exception if the parameter value is not the string value 'true' or null.
     * this is to manually handle this attribute to stop any value defaulting to True.
     */
    public function setIsControlledSubstance($isControlledSubstance): void {
        if ($isControlledSubstance === null) {
            $this->isControlledSubstance = False;
        } elseif ((string)trim(strtolower($isControlledSubstance)) === "true") {
            $this->isControlledSubstance = True;
        } else {
            throw new Exception("Invalid string argument, please enter 'true' if medication is a controlled substance, else leave parameter blank");
        }
    }
}

//$pandadol = new Prescription("panadol", "2019-09-18", "2019-10-18");
//echo $pandadol->getMedicationName() . "\n";
//echo $pandadol->getPrescriptionStartDate() . "\n";
//echo $pandadol->getPrescriptionEndDate() . "\n";
//echo $pandadol->getIsControlledSubstance() . "\n";
//
//$oxyContine = new Prescription("OxyContine", "2019-09-18", "2019-10-18", "True");
//echo $oxyContine->getMedicationName() . "\n";
//echo $oxyContine->getPrescriptionStartDate() . "\n";
//echo $oxyContine->getPrescriptionEndDate() . "\n";
//echo $oxyContine->getIsControlledSubstance() . "\n";

//$t = new DateTime('today');
//$n = new DateTime('now');
//echo $t->format("Y-m-d");
//echo "\n";
//echo $n->format("Y-m-d");
