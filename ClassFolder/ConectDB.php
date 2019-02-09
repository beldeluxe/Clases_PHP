<?php


class ConectDB
{
    private $host;
    private $user;
    private $password;
    private $db;
    /**
     * Conex constructor.
     */
    public function __construct()
    {
        $this->user ="root";
        $this->password ="";
        $this->host ="localhost";
        $this->db ="";
    }

    /**
     * @param $query
     * @return bool|mysqli_result
     */
    public function getResult($query)
    {
        $conex = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ( $conex->connect_errno ) {
            //error de conexion
            return false;

        } else {
            $resultado = $conex->query($query);

            return $resultado;
        }
    }

}