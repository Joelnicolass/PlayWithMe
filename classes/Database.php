<?php

class Database {
    //variables de clase

    //variable para conexion
    private $conexion;
    //varaible error
    public $error;


    function __construct ($server, $user, $pass, $database) {

        //validacion - control errores en conexion
        if (!$this->_connect($server, $user, $pass, $database)) {
            $this->error = $this->conexion->connect_error;
        
        }
    }

    private function _connect($server, $user, $pass, $database) {

        $this->conexion = new mysqli($server, $user, $pass, $database);

    }

    //metodos para manupulacion de datos


    public function sendQy ($qy) {

        $typeQy = strtoupper(substr($qy, 0, 6));

        switch ($typeQy) {
        //insert----------------------------------------------

            case 'INSERT':
                $result = $this->conexion->query($qy);

                if (!$result) {

                    $this->error = $this->conexion->error;
                    return false;

                } else {

                    return $this->conexion->insert_id;

                }

                break;
                
        //select----------------------------------------------

            case 'SELECT':
                $result = $this->conexion->query($qy);

                if (!$result) {

                    $this->error = $this->conexion->error;
                    return false;

                } else {

                    $aResult=array();

                    while ($a = $result->fetch_assoc()) {
                        $aResult[]=$a;

                    }
                    
                    return $aResult;

                }

                break;

        //upd del---------------------------------------------
            case 'UPDATE':
            case 'DELETE':
                
                $result = $this->conexion->query($qy);

                if (!$result) {

                    $this->error = $this->conexion->error;
                    return false;

                } else {
                
                    return $this->conexion->affected_rows;
                
                }
                break;

            //error
            default:
                $this->error = 'Consulta no válida';
                break;
        }


    }


}


?>