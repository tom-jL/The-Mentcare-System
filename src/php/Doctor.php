<?php
require "Employee.php";

class Doctor extends Employee {
    private $titlePrefix = "Dr. ";
    private $fullName;
    private $accreditationDate;
    private $medicalLicenseNumber;
    private $medicalSpeciality;

    /**
     * Doctor constructor.
     * @param $firstName - parameter the same as Employee class
     * @param $lastName - parameter the same as Employee class
     * @param $gender - parameter the same as Employee class
     * @param $dateOfBirth - parameter the same as Employee class
     * @param $clinic - parameter the same as Employee class
     * @param $personalPhoneNumber - parameter the same as Employee class
     * @param $email - parameter the same as Employee class
     * @param $accreditationDate - takes a string value in format "YYYY-mm-dd" to convert into a DateTime object
     * @param $medicalLicenseNumber - takes a string value for the license number
     * @param null $medicalSpeciality - accepts a string value for a speciality else defaults to null value
     * @throws Exception - throws exception if gender != 'male' or 'female' or throws exception if date string values
     * are not in "YYYY-mm-dd" format eg. "2012-12-25"
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email, $accreditationDate, $medicalLicenseNumber, $medicalSpeciality = null) {
        parent::__construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email);
        $this->setAccreditationDate($accreditationDate);
        $this->setMedicalLicenseNumber($medicalLicenseNumber);
        $this->setMedicalSpeciality($medicalSpeciality);
        $this->fullName = $this->titlePrefix . $this->getFirstName() . " " . $this->getLastName();
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

    /**
     * @return mixed - returns a string value for a medical specilaity for the Doctor instance if exists, else will return null.
     */
    public function getMedicalSpeciality() {
        return $this->medicalSpeciality;
    }

    /**
     * @param mixed $medicalSpeciality - takes a value to assign to medicalSpeciality attribute, if value is not null
     * parameter is cast to string and assigned, else medicalSpeciality == null for Doctor instances who do not
     * possess a medical speciality.
     */
    public function setMedicalSpeciality($medicalSpeciality): void {
        if ($medicalSpeciality !== null) {
            $specialty = (string)$medicalSpeciality;
            $specialty = strtolower($specialty);
            $specialty = ucfirst($specialty);
            $this->medicalSpeciality = $specialty;
        } else {
            $this->medicalSpeciality = $medicalSpeciality;
        }
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
     * @return string - returns a string value for the full title of the Doctor instance, eg. "Dr. John Doe"
     */
    public function getFullName(): string {
        return $this->fullName;
    }

}
$donna = new Doctor("donna", "smith", 'female', "1991-02-25", "sydney", "0444888777", "drdonna@gmail.com", "1999-12-12", "123344ED4");

print($donna->getFirstName()) . "\n";
print($donna->getLastName()) . "\n";
print($donna->getGender()) . "\n";
print($donna->getDateOfBirth()) . "\n";
print($donna->getClinic()) . "\n";
print($donna->getPhoneNumber()) . "\n";
print($donna->getEmail()) . "\n";
print($donna->getHireDate()) . "\n";
print($donna->getDateOfResignation()) . "\n";
print($donna->getAccreditationDate()) . "\n";
print($donna->getMedicalLicenseNumber()) . "\n";
print($donna->getMedicalSpeciality()) . "\n";
print($donna->getFullName()) . "\n";