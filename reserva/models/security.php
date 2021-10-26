<?php


class Security {

    /**
     * Crea una sesión
     * @param $idUser El id del usuario logueado
     */
    public static function createSession($idUser) {
        $_SESSION['idUser'] = $idUser;
    }
    
    /**
     * Devuelve el id del usuario logueado
     */
    public static function getUserId() {
        return $_SESSION['idUser'];
    }

    /** 
     * Comprueba si existe una sesión iniciada.
     * @return boolean True si existe una sesión o false en caso contrario
     */
    public static function thereIsSession() {
        if (isset($_SESSION['idUser'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Cierra una sesión
     */
    public static function closeSession() {
        session_destroy();
    }

    /**
     * Filtra un string, eliminando cualquier carácter sospechoso de 
     * ataque por inyección de SQL o JS
     */
    public static function filter($str) {
        // Aquí eliminaríamos los caracteres y expresiones sospechosas
        // (Está sin implementar)
        return $str;
    }


}