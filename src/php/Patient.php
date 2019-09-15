<?php

class Patient {
    private $firstName;
    private $lastName;
    private $gender;
    private $dateOfBirth;
    private $dateOfLastVisit;

    /**
     * Patient constructor.
     * @param $firstName - takes a string value for firstName attribute
     * @param $lastName - takes a string value for lastName attribute
     * @param $gender - takes a string value for gender attribute, accepts any string value
     * @param $dateOfBirth - takes a string value in "YYYY-mm-dd" format for conversion into DateTime object
     * @param $dateOfLastVisit - takes a string value in "YYYY-mm-dd" format for conversion into DateTime object
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $dateOfLastVisit) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setGender($gender);
        $this->setDateOfBirth($dateOfBirth);
        $this->setDateOfLastVisit($dateOfLastVisit);
    }

    /**
     * @return mixed - return String value for Patient firstName attribute.
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName - takes a string to assign Patient firstName attribute.
     * Casts string to all lowercase then makes first char uppercase only.
     */
    public function setFirstName($firstName): void {
        $nameString = (string)trim($firstName);
        $nameString = strtolower($nameString);
        $nameString = ucfirst($nameString);
        $this->firstName = $nameString;
    }

    /**
     * @return mixed - return String value for Patient lastName attribute.
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName - takes a string to assign Patient lastName attribute.
     * Casts string to all lowercase then makes first char uppercase only.
     */
    public function setLastName($lastName): void {
        $nameString = (string)trim($lastName);
        $nameString = strtolower($nameString);
        $nameString = ucfirst($nameString);
        $this->lastName = $nameString;
    }

    /**
     * @return mixed - return String value for Patient gender attribute.
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Function assigns a string value to the Patient gender attribute, Patient class attribute assignment
     * is more flexible than the Employee class, as the patient my identify with a gender other than 'male' or 'female'
     * @param mixed $gender - Takes a string value to assign to the Patient class gender attribute.
     */
    public function setGender($gender): void {
        $gender = strtolower($gender);
        $this->gender = $gender;
    }

    /**
     * @return mixed - return String formatted value in "YYYY-mm-dd" format for Patient dateOfBirth attribute.
     */
    public function getDateOfBirth() {
        return $this->dateOfBirth->format("Y-m-d");
    }

    /**
     * @param mixed $dateOfBirth - Takes a string value in the format of "YYYY-mm-dd" for conversion into a DateTime object.
     */
    public function setDateOfBirth($dateOfBirth): void {
        try {
            $birthDate = new DateTime($dateOfBirth);
            $this->dateOfBirth = $birthDate;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string argument, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return mixed - return String formatted value in "YYYY-mm-dd" format for Patient dateOfLastVisit attribute.
     */
    public function getDateOfLastVisit() {
        return $this->dateOfLastVisit->format("Y-m-d");
    }

    /**
     * @param mixed $dateOfLastVisit - Takes a string value in the format of "YYYY-mm-dd" for conversion into a DateTime object.
     */
    public function setDateOfLastVisit($dateOfLastVisit): void {
        try {
            $lastVisit = new DateTime($dateOfLastVisit);
            $this->dateOfLastVisit = $lastVisit;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string argument, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }
}
//$guy = new Patient("guy", "fella", "FEmale", "1990-01-30", "2019-08-08");
//echo $guy->getFirstName() . "\n";
//echo $guy->getLastName() . "\n";
//echo $guy->getGender() . "\n";
//echo $guy->getDateOfBirth() . "\n";
//echo $guy->getDateOfLastVisit() . "\n";