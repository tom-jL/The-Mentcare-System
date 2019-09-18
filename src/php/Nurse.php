<?php
require "Employee.php";

class Nurse extends Employee {
    private $accreditationDate;
    private $medicalLicenseNumber;

    /**
     * Nurse constructor.
     * @param $firstName - parameter the same as Employee class
     * @param $lastName - parameter the same as Employee class
     * @param $gender - parameter the same as Employee class
     * @param $dateOfBirth - parameter the same as Employee class
     * @param $clinic - parameter the same as Employee class
     * @param $personalPhoneNumber - parameter the same as Employee class
     * @param $email - parameter the same as Employee class
     * @param $accreditationDate - takes a string value in format "YYYY-mm-dd" to convert into a DateTime object
     * @param $medicalLicenseNumber - takes a string value for the license number
     * @throws Exception - throws exception if gender != 'male' or 'female' or throws exception if date string values
     * are not in "YYYY-mm-dd" format eg. "2012-12-25"
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email, $accreditationDate, $medicalLicenseNumber) {
        parent::__construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email);
        $this->setAccreditationDate($accreditationDate);
        $this->setMedicalLicenseNumber($medicalLicenseNumber);
    }

    /**
     * @return mixed - returns a string format DateTime value in "YYYY-mm-dd"
     */
    public function getAccreditationDate() {
        return $this->accreditationDate->format("Y-m-d");
    }

    /**
     * @param mixed $accreditationDate - accepts a string value in "YYYY-mm-dd" format to create a DateTime object
     * for the medical license accreditation date for the Doctor class instance
     */
    public function setAccreditationDate($accreditationDate): void {
        try {
            $accreditationDateTime = new DateTime($accreditationDate);
            $this->accreditationDate = $accreditationDateTime;
        } catch (Exception $exception) {
            echo $exception . "\n";
            echo "Invalid date string argument, use 'YYYY-mm-dd' format, eg. 2019-12-25";
        }
    }

    /**
     * @return mixed - returns the trimmed string value of the instance medical license number
     */
    public function getMedicalLicenseNumber() {
        return $this->medicalLicenseNumber;
    }

    /**
     * @param mixed $medicalLicenseNumber - accepts a string value to assign to medicalLicenseNumber attribute,
     * the string is cast to string and trimmed before assignment
     */
    public function setMedicalLicenseNumber($medicalLicenseNumber): void {
        $medicalLicenseNumber = (string)trim($medicalLicenseNumber);
        $this->medicalLicenseNumber = $medicalLicenseNumber;
    }
}
