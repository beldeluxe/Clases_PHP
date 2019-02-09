<?php


class AssociateProfessor extends Professor
{
    private $startDate;

    function __construct($name, $surname, $yearOfBirth, $department, $startDate )
    {
        parent::__construct($name, $surname, $yearOfBirth, $department);

        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }


}