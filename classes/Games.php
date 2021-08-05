<?php

class Games {

    private $db;

    function __construct($dataBase) {

        $this->db = $dataBase;
    }

//-----------------------------------------------------------------------------------------------------

    //traer lista de juegos, id de juegos e imagen de juegos
    
    public function allGamesInfo () {
               
        $response = $this->db->sendQy("SELECT * FROM `juegos` ");

    return $response;
}

    //traer info de un juego en particular

    public function gameInfo ($idgame) {
               
        $response = $this->db->sendQy("SELECT * FROM `juegos` WHERE id_juego=$idgame");

    return $response;
}


    //Agregar Nuevo juego

    public function gameAdd ($name) {
               
        $response = $this->db->sendQy("INSERT INTO `juegos` VALUES (DEFAULT, '$name', NULL)");

    return $response;
}


//-----------------------------------------------------------------------------------------------------

}

?>