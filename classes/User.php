<?php

class User {

    private $db;

    function __construct($dataBase) {

        $this->db = $dataBase;
    }

//--------------------------------FUNCIONES DE REGISTRO E INFORMACION----------------------------------


    //Registrar usuario
    public function registerUser ($email, $user, $pass) {

        $verify_email = $this->db->sendQy("SELECT email FROM usuarios WHERE email = '$email'");
        $verify_user = $this->db->sendQy("SELECT user FROM usuarios WHERE user = '$user'");      
        
        if ($verify_email || $verify_user) {
        
            $response = false;
        
        } else {
                   
            $this->db->sendQy("INSERT INTO usuarios VALUES (DEFAULT, '$email', '$user', '$pass', NULL, NULL, NULL)");
            
            $response = true;
        }

        return $response;
    }



    //Mostrar la informacion del usuario seleccioando
    
    public function infoUsarSelected ($iduser) {
               
        $response = $this->db->sendQy("SELECT `usuarios`.*, `ubicacion`.* 
        FROM `usuarios` 
        LEFT JOIN `ubicacion` 
        ON `ubicacion`.`usuario_id` = `usuarios`.`id_usuario` 
        WHERE usuarios.id_usuario = $iduser"); 

    return $response;
}

//-----------------------------------------------------------------------------------------------------


//--------------------------------FUNCIONES DE JUEGOS Y NICKS--------------------------------------------------

    //Insertar nuevo Juego y Nick

    public function newGameAndNick($iduser, $nick, $idgame) {

        //traer los juegos (id) y actualizar lista
        $listGames = $this->db->sendQy("SELECT `juego_id` FROM `usuarios` WHERE id_usuario=$iduser");
        $listGames = $listGames[0]["juego_id"];
        $listGames .= $idgame.",";


        //traer los nicks y actualizar lista
        $listNickUser = $this->db->sendQy("SELECT nick FROM `usuarios` WHERE id_usuario=$iduser");
        $nick = str_replace(' ', '&spc&', $nick);
        $listNickUser = $listNickUser[0]["nick"];
        $listNickUser .= $nick.",";

        //actualizar db

        $response = $this->db->sendQy("UPDATE usuarios SET nick='$listNickUser', juego_id='$listGames' WHERE id_usuario=$iduser");
        
        return $response;
    
    }


    //Que juego juega (retorna id del juego)
    public function gameId($iduser) {

        //traer los juegos
        $listIdGamesUser = $this->db->sendQy("SELECT `juego_id` FROM `usuarios` WHERE id_usuario=$iduser");
        $listIdGamesUser = $listIdGamesUser[0]["juego_id"];
        
        $listIdGamesUser = trim($listIdGamesUser);

        $response = (explode(',', $listIdGamesUser));

        return $response;
    
    }

    //obtiene el nick de los juegos del usuario (coincide con los id de juego)

    public function gameNick($iduser) {

        //traer los juegos
        $listNickUser = $this->db->sendQy("SELECT nick FROM `usuarios` WHERE id_usuario=$iduser");
        $listNickUser = $listNickUser[0]["nick"];

        //tomar individualmente los indices que estan separados en coma
        $listNickUser = (explode(',', $listNickUser));

        $listNickUser = str_replace('&spc&', ' ', $listNickUser);

        $response = $listNickUser;

        return $response;
    
    }





    //Eliminar un juego de lo que juegas (todos los usuarios relacionados a ese juego)

    public function deleteGameList($iduser, $idgame) {

        //traer lista de juegos
        $listGames = $this->db->sendQy("SELECT `juego_id` FROM `usuarios` WHERE id_usuario=$iduser");
        $listGames = $listGames[0]["juego_id"];    
        //generar array
        $listGames = (explode(',', $listGames));
        //identificar posicion del id del juego a eliminar

        $posid = [];
        
        for ($i = 0; $i<count($listGames); $i++) {

            if ($listGames[$i] == $idgame) {
            //tomar posicion en array
                array_push($posid, $i);
            } 
        }

        //tomar los nicks

        $listNickUser = $this->db->sendQy("SELECT nick FROM `usuarios` WHERE id_usuario=$iduser");        
        $listNickUser = $listNickUser[0]['nick'];
        $listNickUser = (explode(',', $listNickUser));
        //$listNickUser = str_replace('_', ' ', $listNickUser);

        for ($i = 0; $i<count($posid); $i++) {
        
            $n = intval($posid[$i]);
            echo "<p> $n </p>";
            unset($listNickUser[$n]);
            unset($listGames[$n]);
        }

        //crea string y separa por coma
        $listNickUser = implode(",", $listNickUser);
        $listGames = implode(",", $listGames);

        $response = $this->db->sendQy("UPDATE usuarios SET nick='$listNickUser', juego_id='$listGames' WHERE id_usuario=$iduser");

        return $response;
    }



    //eliminar un juego de lo que juegas (uno de la lista, seleccionado desde el -)

    public function deleteGame($iduser, $posArr) {

        //traer lista de juegos
        $listGames = $this->db->sendQy("SELECT `juego_id` FROM `usuarios` WHERE id_usuario=$iduser");
        $listGames = $listGames[0]["juego_id"];    
        //generar array
        $listGames = (explode(',', $listGames));

        //tomar los nicks

        $listNickUser = $this->db->sendQy("SELECT nick FROM `usuarios` WHERE id_usuario=$iduser");        
        $listNickUser = $listNickUser[0]['nick'];
        $listNickUser = (explode(',', $listNickUser));

        unset($listNickUser[$posArr]);
        unset($listGames[$posArr]);

        //crea string y separa por coma
        $listNickUser = implode(",", $listNickUser);
        $listGames = implode(",", $listGames);

        $response = $this->db->sendQy("UPDATE usuarios SET nick='$listNickUser', juego_id='$listGames' WHERE id_usuario=$iduser");

        return $response;
    }


//-----------------------------------------------------------------------------------------------------


//--------------------------------FUNCIONES DE LOCALIZACION------------------------------------

    //Seleccionar todos los usuarios de tu misma provincia
    
    public function selectAllUsersProv ($prov) {
               
        $response = $this->db->sendQy("SELECT `usuarios`.*, `ubicacion`.* 
        FROM `usuarios` 
        LEFT JOIN `ubicacion` 
        ON `ubicacion`.`usuario_id` = `usuarios`.`id_usuario` 
        WHERE ubicacion.provincia = '$prov'");

        return $response;
    }

    //Seleccionar todos los usuarios de tu misma ciudad

    public function selectAllUsersCity ($city) {

        $response = $this->db->sendQy("SELECT `usuarios`.*, `ubicacion`.* 
        FROM `usuarios` 
        LEFT JOIN `ubicacion` 
        ON `ubicacion`.`usuario_id` = `usuarios`.`id_usuario` 
        WHERE ubicacion.ciudad = '$city'");

        return $response;
    }


//-----------------------------------------------------------------------------------------------------






}

?>