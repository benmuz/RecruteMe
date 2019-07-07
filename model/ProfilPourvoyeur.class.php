<?php


class ProfilPourvoyeur
{
    private $idProfil;
    private $idUser;
    private $nomEntreprise;
    private $secteurActivite;
    private $adresse;
    private $ville;
    private $pays;
    private $telephone;
    private $siteWeb;
    private $lienWeb;

    public function getIdProfil()
    {
        return $this->idProfil;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }
    public function getSecteurActivite()
    {
        return $this->secteurActivite;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getPays()
    {
        return $this->pays;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }
    public function getLienWeb()
    {
        return $this->lienWeb;
    }

    
    public function __construct($idProfil, $idUser, $nomEntreprise, $secteurActivite, $adresse, $ville, $pays, $telephone,$siteWeb,$lienWeb)
    {
        $this->idProfil = $idProfil;
        $this->idUser = $idUser;
        $this->nomEntreprise = $nomEntreprise;
        $this->secteurActivite = $secteurActivite;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->telephone = $telephone;
        $this->siteWeb = $siteWeb;
        $this->lienWeb=$lienWeb;
    }


    public static function createProfil(ProfilPourvoyeur $profil)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO t_profil(idUser,nomEntreprise,secteurActivite,adresse,ville, pays, telephone,siteWeb,lienWeb)
VALUES(:iduser, :nomEntreprise, :secteurActivite,:adresse,:ville,:pays,:telephone,:siteWeb,:lienWeb);
            ");
        $requete->execute(array(
            "iduser"=>$profil->getIdUser(),
            "nomEntreprise"=>$profil->getNomEntreprise(),
            "secteurActivite"=>$profil->getSecteurActivite(),
            "adresse"=>$profil->getAdresse(),
            "ville"=>$profil->getVille(),
            "pays" =>$profil->getPays(),
            "telephone" =>$profil-> getTelephone(),
            "siteWeb"=>$profil->getSiteWeb(),
            "lienWeb"=>$profil->getLienWeb()
        ));
    }


    public static function getAllPourvoyeur(){
        if($_SESSION['typecompte']==TYPE_COMPTE_PROFESSIONEL){

            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM recruteurs p join utilisateur u on u.idUtilisateur=p.idUtilisateur WHERE u.typeCompte=? ORDER BY p.dateCreation DESC LIMIT 0,25');
            $requete->execute(array(TYPE_COMPTE_POURVOYEUR));
            return $requete->fetchAll();
        }
        else{
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on u.id=p.idUser WHERE u.typeCompte=? and p.idUser!=? ORDER BY p.dateCreation DESC LIMIT 0,25');
            $requete->execute(array(TYPE_COMPTE_POURVOYEUR,$_SESSION['id']));
            return $requete->fetchAll();
        }

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
                    $req = $bdd->prepare('UPDATE t_profil SET avatar = :avatar WHERE idUser = :idUser ');
                    $req->execute(array(
                        'avatar' => $avatar,
                        'idUser' => $idUser
                    ));

                } else {

                }
            }
        }
    }
    
    
}