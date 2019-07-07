<?php

    class ProfilProfessionel{

        private $idProfil;
        private $idUser;
        private $nom;
        private $prenom;
        private $sexe;
        private $adresse;
        private $ville;
        private $pays;
        private $telephone;
        private $lienWeb;
        private $avatar;
        private $profil;
        private $statut;

        /**
         * ProfilProfessionel constructor.
         * @param $idProfil
         * @param $idUser
         * @param $nom
         * @param $prenom
         * @param $sexe
         * @param $adresse
         * @param $ville
         * @param $pays
         * @param $telephone
         * @param $lienWeb
         * @param $avatar
         * @param $profil
         * @param $statut
         */
        public function __construct($idProfil, $idUser, $nom, $prenom, $sexe, $adresse, $ville, $pays, $telephone, $lienWeb, $avatar, $profil, $statut)
        {
            $this->idProfil = $idProfil;
            $this->idUser = $idUser;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->adresse = $adresse;
            $this->ville = $ville;
            $this->pays = $pays;
            $this->telephone = $telephone;
            $this->lienWeb = $lienWeb;
            $this->avatar = $avatar;
            $this->profil = $profil;
            $this->statut = $statut;
        }



        public function getIdProfil()
        {
            return $this->idProfil;
        }public function getIdUser()
        {
            return $this->idUser;
        }public function getNom()
        {
            return $this->nom;
        }public function getPrenom()
        {
            return $this->prenom;
        }public function getSexe()
        {
            return $this->sexe;
        }public function getAdresse()
        {
            return $this->adresse;
        }public function getVille()
        {
            return $this->ville;
        }public function getPays()
        {
            return $this->pays;
        }public function getTelephone()
        {
            return $this->telephone;
        }
        public function getLienWeb()
        {
            return $this->lienWeb;
        }
        public function getProfil()
        {
            return $this->profil;
        }

        public function getStatut()
        {
            return $this->statut;
        }
        public function getAvatar()
        {
            return $this->avatar;
        }
        


        public static function createProfil(ProfilProfessionel $profil)
        {
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare("INSERT INTO t_profil(idUser, nom,prenom, sexe,adresse,ville,pays,telephone,lienWeb,profil,avatar,statut)
            VALUES(:idUser, :nom,:prenom, :sexe,:adresse,:ville,:pays, :telephone,:lienWeb,:profil,'efa5cf51c0711fafc61e73f90e05bc12-s-.png',1);
            ");
            $requete->execute(array(
                "idUser"=>$profil->getIdUser(),
                "nom" =>$profil->getNom(),
                "prenom"=>$profil->getPrenom(),
                "sexe" =>$profil->getSexe(),
                "adresse"=>$profil->getAdresse(),
                "ville"=>$profil->getVille(),
                "pays" =>$profil->getPays(),
                "telephone" =>$profil-> getTelephone(),
                "lienWeb" =>$profil->getLienWeb(),
                "profil" =>$profil->getProfil()
            ));
        }

        //recuperation de 5 premiers profils de professionnel
        public static function get5Profil(){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on u.id=p.idUser WHERE u.typeCompte=? and p.idUser!=? ORDER BY p.dateCreation DESC LIMIT 0,5');
            $requete->execute(array(TYPE_COMPTE_PROFESSIONEL,$_SESSION['id']));
            return $requete->fetchAll();
        }

        public static function getAllProfesionnel(){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on u.id=p.idUser WHERE u.typeCompte=? and p.idUser!=? ORDER BY p.dateCreation DESC LIMIT 0,5');
            $requete->execute(array(TYPE_COMPTE_PROFESSIONEL,$_SESSION['id']));
            return $requete->fetchAll();
        }


        public static function getAllProfil(){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil WHERE idProfil=?');
            $requete->execute(array(
                $_POST['idProfil']
            ));
            return $requete->fetchAll();
        }

        public static function getThisProfilForRecrutement($item){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on p.idUser=u.id WHERE p.profil=:profil');
            $requete->execute(array(
                'profil'=>$item
            ));
            return $requete->fetchAll();
        }

        public static function filterThisProfilForRecrutement($item){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on p.idUser=u.id WHERE p.ville=? or p.pays=?');
            $requete->execute(array(
                'profil'=>$item
            ));
            return $requete->fetchAll();
        }

        public static function selectProfilForRecrutementByCity(){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT DISTINCT ville,pays FROM t_profil WHERE profil=? ORDER BY ville ASC');
            $requete->execute(array($_SESSION['profilp']));
            return $requete->fetchAll();
        }

        public static function selectProfilForRecrutementByCountry(){
            $connexion=Connexion::getConnexion();
            $requete=$connexion->prepare('SELECT DISTINCT pays FROM t_profil WHERE profil=? ORDER BY pays ASC ');
            $requete->execute(array($_SESSION['profilp']));
            return $requete->fetchAll();
        }

        public static function imgChange(){
            if (!empty($_POST['img'])) {
                $avatar = $_FILES['avatar']['name'];
                $avatar_tmp = $_FILES['avatar']['tmp_name'];

                if (!empty($avatar)) {
                    $image_ext = strtolower(end(explode('.', $avatar)));
                    if (in_array($image_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                        //deplacement du fichier dans notre dossier
                        move_uploaded_file($avatar_tmp, '../avatar/' . $avatar);
                        $idUser = $_SESSION['id'];
                        $bdd = Connexion::getConnexion();
                        $req = $bdd->prepare('UPDATE professionnels SET avatar = :avatar WHERE idUtilisateur = :idUtilisateur ');
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