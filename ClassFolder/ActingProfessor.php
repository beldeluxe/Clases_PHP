<?php

class ActingProfessor extends Professor
{
    private $endDate;

    function __construct($name, $surname, $yearOfBirth, $department, $endDate)
    {
        parent::__construct($name, $surname, $yearOfBirth, $department);

        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }


}