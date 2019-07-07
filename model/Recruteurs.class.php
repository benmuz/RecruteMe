<?php

/**
 * Created by PhpStorm.
 * User: RACHEL MINGA
 * Date: 14/08/2018
 * Time: 17:08
 */
class Recruteurs
{
    private $idProfil;
    private $idUtilisateur;
    private $nomEntreprise;
    private $secteurActivite;
    private $adresse;
    private $pays;
    private $ville;
    private $lien1;

    private $telephone;
    private $telephone2;
    private $description;
    private $avatar;

    private $dateCreation;

    /**
     * Recruteurs constructor.
     * @param $idProfil
     * @param $idUtilisateur
     * @param $nomEntreprise
     * @param $secteurActivite
     * @param $adresse
     * @param $pays
     * @param $ville
     * @param $lien1
     * @param $lien2
     * @param $lien3
     * @param $telephone
     * @param $telephone2
     * @param $description
     * @param $avatar
     * @param $nom
     * @param $prenom
     * @param $dateCreation
     */
    public function __construct($idProfil, $idUtilisateur, $nomEntreprise, $secteurActivite, $adresse, $pays, $ville, $lien1, $telephone, $telephone2, $description, $avatar, $dateCreation)
    {
        $this->idProfil = $idProfil;
        $this->idUtilisateur = $idUtilisateur;
        $this->nomEntreprise = $nomEntreprise;
        $this->secteurActivite = $secteurActivite;
        $this->adresse = $adresse;
        $this->pays = $pays;
        $this->ville = $ville;
        $this->lien1 = $lien1;

        $this->telephone = $telephone;
        $this->telephone2 = $telephone2;
        $this->description = $description;
        $this->avatar = $avatar;

        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getIdProfil()
    {
        return $this->idProfil;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * @return mixed
     */
    public function getSecteurActivite()
    {
        return $this->secteurActivite;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getLien1()
    {
        return $this->lien1;
    }
    public function getLien2()
    {
        return $this->lien2;
    }
    public function getLien3()
    {
        return $this->lien3;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getTelephone2()
    {
        return $this->telephone2;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }


    public static function imgChange(){
        if (!empty($_POST['img'])) {
            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            if (!empty($avatar)) {
                $image_ext = strtolower(end(explode('.', $avatar)));
                if (in_array($image_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                    //deplacement du fichier dans notre dossier
                    move_uploaded_file($avatar_tmp, '../avatar_pourv/' . $avatar);
                    $idUser = $_SESSION['id'];
                    $bdd = Connexion::getConnexion();
                    $req = $bdd->prepare('UPDATE recruteurs SET avatar = :avatar WHERE idUtilisateur = :idUtilisateur ');
                    $req->execute(array(
                        'avatar' => $avatar,
                        'idUtilisateur' => $idUser
                    ));

                } else {

                }
            }
        }
    }

    public static function getAllSecteurActivite(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT nomSecteur FROM secteurs ORDER BY nomSecteur ASC');
        $requete->execute();
        return $requete->fetchAll();
    }

    public static function getAllPourvoyeur(){
             $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM recruteurs p join utilisateur u on u.idUtilisateur=p.idUtilisateur  ORDER BY p.dateCreation DESC LIMIT 0,25');
            $requete->execute(array(TYPE_COMPTE_POURVOYEUR));
            return $requete->fetchAll();


    }
}