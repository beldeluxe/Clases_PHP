<?php
include 'ConectDB.php';
include 'Professor.php';
include 'ErrorException.php';

class DepartmentProfessors
{
    private $departmentName;

    function __construct($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    /**
     * @return mixed
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * @param mixed $departmentName
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    /**
     * @return string
     */
    public function listProfessors(){

        $conexdb = new ConectDB();
        $profesors = $conexdb->getResult("SELECT * FROM professors where department = '".$this->departmentName."' order by 'surname'");
        $list = '<ul>';
        foreach ($profesors as $profesor){

            $newProfesor = new Professor($profesor['name'], $profesor['surname'], $profesor['year_of_birth'], $profesor ['department']  );
            $list .= '<li>'. $newProfesor->getCompleteName().'</li>';
        }

        return $list.'</ul>';
    }

    /**
     * @param $professor
     * @return mixed
     * @throws ErrorException
     */
    public function addProfessor($professor){

        //check department / departmentName

        if($this->departmentName == $professor['department']){
            //check if strings length > 20
            if(strlen($professor['name']) <= 20 || strlen($professor['surname'])<=20 || strlen($professor['department'])<=20){
                $conexdb = new ConectDB();
                $professorName = $conexdb->getResult("SELECT * FROM professors where name = '".$professor['name']."' and surname = '".$professor['surname']."' ");

                return $this->checkAndInsert($professor, $professorName, $conexdb);

            } else {
                throw new ErrorException('The maximum number of characters is 20');

            }


        } else {

            throw new ErrorException('The department name must be exists');
        }

    }

    /**
     * @param $professor
     * @param $professorName
     * @param $conexdb
     * @return mixed
     * @throws ErrorException
     */
    public function checkAndInsert($professor, $professorName, $conexdb)
    {
        if ($professorName->num_rows = 0) {
            $keys= '';
            $values = '';
            foreach ($professor as $key => $value){
                $keys .= $key.",";
                $values .= "'".$value."',";
            }

            $resul = $conexdb->getResult("INSERT INTO professors (" . substr($keys, 0, strlen($keys)-1) . ") VALUES (" . substr($values, 0, strlen($values)-1) . ")");

            return $resul;

        } else {


            throw new ErrorException('The user already exists');



        }
    }


}