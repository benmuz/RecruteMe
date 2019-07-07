<?php


class Connexion
{
    private static $ressource;

    //Déclarations des méthodes
    public static function getConnexion()
    {
        if(self::$ressource == null){
            self::$ressource = new PDO(BD_DSN,BD_UTILISATEUR, BD_PASSWORD,
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        }
        return self::$ressource;

    }
}