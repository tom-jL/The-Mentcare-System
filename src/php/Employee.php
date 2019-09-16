<?php

class Employee {
// the Employee base class for all clinic staff of the Mentcare system.
// contains $firstName, $lastName, $gender, $clinic, $email as string values
// contains $dateOfBirth, $dateOfHire, $dateOfResignation as DateTime values (YYYY-mm-dd)
// contains $personalPhoneNumber as an int value
    private $firstName;
    private $lastName;
    private $gender;
    private $dateOfBirth;
    private $clinic;
    private $personalPhoneNumber;
    private $email;
    private $dateOfHire;
    private $dateOfResignation;

    /**
     * Employee constructor.
     * @param $firstName - takes a string value for firstName attribute, will be cast into sentence case String
     * @param $lastName - takes a string value for lastName attribute, will be cast into sentence case String
     * @param $gender - takes a string value of 'male' or 'female' only, cast into lowercase String
     * @param $dateOfBirth - takes a String value of 'YYYY-mm-dd' to be converted into a DateTime object when set
     * @param $clinic - takes a string value for clinic attribute as a location name, will be cast into sentence case String
     * @param $personalPhoneNumber - takes a string value for a phone number
     * @param $email - takes a string for personal email address for the email attribute
     * @throws Exception - throws exception if gender != 'male' or 'female'
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setGender($gender);
        $this->setDateOfBirth($dateOfBirth);
        $this->setClinic($clinic);
        $this->setPhoneNumber($personalPhoneNumber);
        $this->setEmail($email);
        $this->dateOfHire = new DateTime('now');
        $this->dateOfResignation = null;
    }

    /**
     * @param $firstName - takes a string to assign Employee firstName attribute.
     * Casts string to all lowercase then makes first char uppercase only.
     */
    public function setFirstName($firstName) {
        $nameString = (string)trim($firstName);
        $nameString = strtolower($nameString);
        $nameString = ucfirst($nameString);
        $this->firstName = $nameString;
    }

    /**
     * @return mixed - returns a string value of the Employee firstName attribute
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param $lastName - takes a string to assign Employee lastName attribute.
     * Casts string to all lowercase then makes first char uppercase only.
     */
    public function setLastName($lastName) {
        $nameString = (string)trim($lastName);
        $nameString = strtolower($nameString);
        $nameString = ucfirst($nameString);
        $this->lastName = $nameString;
    }

    /**
     * @return mixed - returns a string value of the Employee lastName attribute
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param $gender - takes a String value of either 'male' or 'female' to assign gender attribute.
     * @throws Exception - other values will throw and uncaught exception for unexpected values.
     */
    public function setGender($gender) {
        $gender = (string)strtolower($gender); // string to all lowercase and cast into a String object
        if ($gender == "male" || $gender == "female") {
            $this->gender = $gender;
        } else {
            throw new Exception("Invalid gender string, accepts only 'male' or 'female'");
        }
    }

    /**
     * @return mixed - returns a string of either 'male' or 'female'.
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Sets the Employee dateOfBirth attribute to a DateTime object from a string.
     * @param $dateOfBirth - takes a string value in a "YYYY-mm-dd" format to be converted into a DateTime object.
     * eg. "2012-12-20". Method will throw an exception of incorrect date format is used.
     */
    public function setDateOfBirth($dateOfBirth) {
        try {
            $birthDate = new DateTime($dateOfBirth);
            $this->dateOfBirth = $birthDate;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string argument, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return mixed - returns a string value of the DateTime date value as "YYYY-mm-dd".
     */
    public function getDateOfBirth() {
        return $this->dateOfBirth->format("Y-m-d");
    }

    /**
     * Sets Employee clinic name attribute.
     * @param $clinic - takes a string value for the clinic attribute, cast to lowercase then capitalises first char.
     */
    public function setClinic($clinic) {
        $clinicName = (string)$clinic;
        $clinicName = strtolower($clinic);
        $clinicName = ucfirst($clinic);
        $this->clinic = $clinicName;
    }

    /**
     * @return mixed - returns string value of clinic attribute, the Employees working clinic location.
     */
    public function getClinic() {
        return $this->clinic;
    }

    /**
     * Method sets a phone number from a string value to assign to personalPhoneNumber attribute
     * @param $phoneNumber - takes a string of numbers then trims value and assigns to personalPhoneNumber attribute
     */
    public function setPhoneNumber($phoneNumber) {
        $digits = (string)$phoneNumber;
        $digits = trim($digits);
        $this->personalPhoneNumber = $digits;
    }

    /**
     * @return string - returns a string of the integer value of personalPhoneNumber to stop arithmetic operations
     */
    public function getPhoneNumber() {
        return (string)$this->personalPhoneNumber;
    }

    /**
     * Method that assigns a string value email address to the email attribute.
     * @param $emailAddress - takes a string value for email attribute, must contain at least 1 '@' and 1 '.' chars to be valid.
     * @throws Exception - throws exception if invalid email address string entered as method parameter.
     */
    public function setEmail($emailAddress) {
        $emailAddress = strtolower($emailAddress);
        $emailAddress = trim($emailAddress); // trims starting and trailing whitespaces
        $emailAddress = str_replace(" ", "", $emailAddress); // removes all whitespace
        if (strpos($emailAddress, "@") !== false && strpos($emailAddress, ".")) {
            $this->email = $emailAddress;
        } else {
            throw new Exception("Invalid email address, must contain '@' and '.' chars");
        }
    }

    /**
     * @return mixed - returns string value of a valid email address.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Method to get a string value of the hireDate DateTime object in "YYYY-mm-dd" format. Date is created by system
     * when Employee object is constructed.
     * @return string - returns a string value of "YYYY-mm-dd" format for Employee hire date.
     */
    public function getHireDate() {
        return $this->dateOfHire->format("Y-m-d");
    }

    /**
     * Method to set DateTime value for dateOfResignation, takes a String value argument
     * @param null $dateOfResignation - takes a String of "YYYY-mm-dd" as date argument, eg. "2020-12-19"
     */
    public function setDateOfResignation($dateOfResignation): void {
        try {
            $resignationDate = new DateTime($dateOfResignation);
            $this->dateOfResignation = $resignationDate;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string argument, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return null - if dateOfResignation === null returns "Currently employed" else returns DateTime format string of "YYYY-mm-dd"
     */
    public function getDateOfResignation() {
        if ($this->dateOfResignation === null) {
            return "Currently employed";
        } else {
            return $this->dateOfResignation->format("Y-m-d");
        }
    }


}

//$billy = new Employee("billy", "bob", 'MaLe', "1999-02-25", "townsville", "0444888777", "billy@gmail.com");
//
//print($billy->getFirstName()) . "\n";
//print($billy->getLastName()) . "\n";
//print($billy->getGender()) . "\n";
//print($billy->getDateOfBirth()) . "\n";
//print($billy->getClinic()) . "\n";
//print($billy->getPhoneNumber()) . "\n";
//print($billy->getEmail()) . "\n";
//print($billy->getHireDate()) . "\n";
//print($billy->getDateOfResignation()) . "\n";
