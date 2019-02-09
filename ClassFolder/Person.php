<?php

class Person
{
    private $name;
    private $surname;
    private $yearOfBirth;

    function __construct($name, $surname, $yearOfBirth)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->yearOfBirth = $yearOfBirth;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getYearOfBirth()
    {
        return $this->yearOfBirth;
    }

    /**
     * @param mixed $yearOfBirth
     */
    public function setYearOfBirth($yearOfBirth)
    {
        $this->yearOfBirth = $yearOfBirth;
    }


    public function getCompleteName(){

        return $this->getSurname().', '.$this->getName();
    }

    public function getAge(){
        $actualYear = date('Y');

        return $actualYear - $this->yearOfBirth;
    }

}