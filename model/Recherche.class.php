<?php

/**
 * Created by PhpStorm.
 * User: RACHEL MINGA
 * Date: 22/08/2018
 * Time: 02:01
 */
class Recherche
{
    private $idRecherche;
    private $postPrecherche;
    private $monProfil;
    private $dateCreation;

    /**
     * Recherche constructor.
     * @param $idRecherche
     * @param $postPrecherche
     * @param $monProfil
     * @param $dateCreation
     */
    public function __construct($idRecherche, $postPrecherche, $monProfil, $dateCreation)
    {
        $this->idRecherche = $idRecherche;
        $this->postPrecherche = $postPrecherche;
        $this->monProfil = $monProfil;
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getIdRecherche()
    {
        return $this->idRecherche;
    }

    /**
     * @return mixed
     */
    public function getPostPrecherche()
    {
        return $this->postPrecherche;
    }

    /**
     * @return mixed
     */
    public function getMonProfil()
    {
        return $this->monProfil;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }




}