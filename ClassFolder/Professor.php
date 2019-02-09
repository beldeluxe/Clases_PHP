<?php
require_once 'Person.php';
class Professor extends Person
{
    private $department;

    function __construct($name, $surname, $yearOfBirth, $department)
    {
        parent::__construct($name, $surname, $yearOfBirth);

        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

}