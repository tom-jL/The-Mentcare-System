<?php
require "Employee.php";

class Manager extends Employee {
    public $mangedClinic;
    public $managementStartDate;

    /**
     * Manager constructor.
     * @param $firstName - parameter the same as Employee class
     * @param $lastName - parameter the same as Employee class
     * @param $gender - parameter the same as Employee class
     * @param $dateOfBirth - parameter the same as Employee class
     * @param $clinic - parameter the same as Employee class
     * @param $personalPhoneNumber - parameter the same as Employee class
     * @param $email - parameter the same as Employee class
     * @param $mangedClinic - takes a string value to represent the managed clinic
     * @throws Exception - throws exception if gender != 'male' or 'female'
     */
    public function __construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email, $mangedClinic) {
        parent::__construct($firstName, $lastName, $gender, $dateOfBirth, $clinic, $personalPhoneNumber, $email);
        $this->setMangedClinic($mangedClinic);
        $this->managementStartDate = new DateTime("now");
    }

    /**
     * @return mixed - returns a string value for the managedClinic attribute.
     */
    public function getMangedClinic() {
        return $this->mangedClinic;
    }

    /**
     * Method to assign a string value to represent the clinic the Manager instance manages, method is similar to
     * Employee class clinic value, this attribute allows for a manager to manage a clinic from another clinic.
     * Such as a centralised head office or remotely.
     * @param mixed $mangedClinic - Takes a string value for the Manager instance attribute managedClinic to show
     * which clinic the manager manages.
     */
    public function setMangedClinic($mangedClinic): void {
        $clinicName = (string)$mangedClinic;
        $clinicName = strtolower($clinicName);
        $clinicName = ucfirst($clinicName);
        $this->mangedClinic = $clinicName;
    }

    /**
     * @return string
     */
    public function getManagementStartDate() {
        return $this->managementStartDate->format("Y-m-d");
    }
}
//$mindy = new Manager("mindy", "smith", 'female', "1991-02-25", "sydney", "0444888777", "billy@gmail.com", "sydney");
//
//print($mindy->getFirstName()) . "\n";
//print($mindy->getLastName()) . "\n";
//print($mindy->getGender()) . "\n";
//print($mindy->getDateOfBirth()) . "\n";
//print($mindy->getClinic()) . "\n";
//print($mindy->getPhoneNumber()) . "\n";
//print($mindy->getEmail()) . "\n";
//print($mindy->getHireDate()) . "\n";
//print($mindy->getDateOfResignation()) . "\n";
//print($mindy->getManagementStartDate()) . "\n";