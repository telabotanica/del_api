<?php

namespace App\Repository;

use App\Entity\DelCommentaire;
use App\Entity\DelCommentaireVote;
use App\Entity\DelImage;
use App\Entity\DelObservation;
use App\Service\PDOConnection;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;
use PDO;
use DateTimeImmutable;
/**
 * @extends ServiceEntityRepository<DelObservation>
 *
 * @method DelObservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DelObservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DelObservation[]    findAll()
 * @method DelObservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DelObservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DelObservation::class);
    }

    /**
     * @return DelObservation[] Returns an array of DelObservation objects
     */
    public function findVerifiedObservations(int $page,int $limit=12): array
    {
        $limit = abs($limit);
        $connex = new PDOConnection();
        $offset = ($page * $limit)-$limit;
        $query = $query = "SELECT * FROM del_observation o WHERE (certitude = 'certain' AND score_max >= 4) OR score_max >= 4 ORDER BY id_observation DESC LIMIT $limit OFFSET $offset";
        
        $stmt = $connex->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res1 = $stmt->fetchAll();
        $obs_tab=[];
        foreach ($res1 as $obs_bdd){
            $obs = $this->findOneById($obs_bdd->id_observation);
            
            array_push($obs_tab,$obs);
        }
        return $obs_tab;
    }

    /**
     * @return DelObservation[] Returns an array of DelObservation objects
     */
    public function findToConfirmObservations(int $page,int $limit=12): array
    {
        $limit = abs($limit);
        $connex = new PDOConnection();
        $offset = ($page * $limit)-$limit;
        $query = $query = "SELECT * FROM del_observation o WHERE (certitude = 'douteux' AND (score_max >= 0 AND score_max < 4)) OR (score_max > 0 AND score_max < 4) ORDER BY id_observation DESC LIMIT $limit OFFSET $offset";
        
        $stmt = $connex->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res1 = $stmt->fetchAll();
        $obs_tab=[];
        foreach ($res1 as $obs_bdd){
            $obs = $this->findOneById($obs_bdd->id_observation);
            
            array_push($obs_tab,$obs);
        }
        return $obs_tab;
    }

    /**
     * @return DelObservation[] Returns an array of DelObservation objects
     */
    public function findToDetermineObservations(int $page,int $limit=12): array
    {
        $limit = abs($limit);
        $connex = new PDOConnection();
        $offset = ($page * $limit)-$limit;
        $query = "SELECT * FROM del_observation WHERE (certitude = 'à déterminer' AND score_max <= 0) OR score_max < 0 ORDER BY id_observation DESC LIMIT $limit OFFSET $offset";
        
        $stmt = $connex->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res1 = $stmt->fetchAll();
        $obs_tab=[];
        foreach ($res1 as $obs_bdd){
            $obs = $this->findOneById($obs_bdd->id_observation);
            
            array_push($obs_tab,$obs);
        }
        return $obs_tab;
    }

    /**
     * @return DelObservation[] Returns an array of DelObservation objects
     */
    public function findObservationsByUser(int $idUser,int $page,int $limit=12,): array
    {
        $limit = abs($limit);
        $connex = new PDOConnection();
        $offset = ($page * $limit)-$limit;
        $query = "SELECT * FROM del_observation WHERE ce_utilisateur = $idUser ORDER BY id_observation DESC LIMIT $limit OFFSET $offset";
        $stmt = $connex->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res1 = $stmt->fetchAll();
        $obs_tab=[];
        foreach ($res1 as $obs_bdd){
            $obs = $this->findOneById($obs_bdd->id_observation);
            
            array_push($obs_tab,$obs);
        }
        return $obs_tab;
    }

    public function findOneById($id): ?DelObservation
    {
        $connex = new PDOConnection();
        $req = "SELECT * FROM del_observation WHERE id_observation=?";
        $stmt = $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res1 = $stmt->fetch();
       
        $req = "SELECT * FROM del_image WHERE ce_observation=?";
        $stmt= $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res2 = $stmt->fetchAll();

        $req = "SELECT *,dcv.ce_utilisateur as 'id_user' FROM del_commentaire c INNER JOIN del_commentaire_vote dcv ON id_commentaire = dcv.ce_proposition WHERE ce_observation=?";
        $stmt= $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_OBJ); 
        $res3 = $stmt->fetchAll();

        $observation = new DelObservation();
        $observation = $this->convertToDelObservation($res1,$res2,$res3);

        return $observation;
        
    }

    function convertToDelObservation($obs_bdd,$images_bdd,$comms_bdd) {
        $obs = new DelObservation();

        $obs->setIdObservation($obs_bdd->id_observation);
        $obs->setCeUtilisateur($obs_bdd->ce_utilisateur);
        $obs->setNomUtilisateur($obs_bdd->nom_utilisateur);
        $obs->setPrenomUtilisateur($obs_bdd->prenom_utilisateur);
        $obs->setCourrielUtilisateur($obs_bdd->courriel_utilisateur);
        $obs->setNomSel($obs_bdd->nom_sel);
        $obs->setNomSelNn($obs_bdd->nom_sel_nn);
        $obs->setNomRet($obs_bdd->nom_ret);
        $obs->setNomRetNn($obs_bdd->nom_ret_nn);
        $obs->setNt($obs_bdd->nt);
        $obs->setFamille($obs_bdd->famille);
        $obs->setCeZoneGeo($obs_bdd->ce_zone_geo);
        $obs->setZoneGeo($obs_bdd->zone_geo);
        $obs->setLieudit($obs_bdd->lieudit);
        $obs->setStation($obs_bdd->station);
        $obs->setMilieu($obs_bdd->milieu);
        $obs->setNomReferentiel($obs_bdd->nom_referentiel);
        $obs->setDateObservation(new DateTimeImmutable($obs_bdd->date_observation));
        $obs->setMotsClesTexte($obs_bdd->mots_cles_texte);
        $obs->setCommentaire($obs_bdd->commentaire);
        $obs->setDateCreation(new DateTimeImmutable($obs_bdd->date_creation));
        $obs->setDateModification(new DateTimeImmutable($obs_bdd->date_modification));
        $obs->setDateTransmission(new DateTimeImmutable($obs_bdd->date_transmission));
        $obs->setCertitude($obs_bdd->certitude);
        $obs->setPays($obs_bdd->pays);
        $obs->setInputSource($obs_bdd->input_source);
        $obs->setDonneesStandard($obs_bdd->donnees_standard);

        foreach($images_bdd as $image_bdd){
            $image = new DelImage();
            $image->setIdImage($image_bdd->id_image);
            $image->setCeUtilisateur($image_bdd->ce_utilisateur);
            $image->setPrenomUtilisateur($image_bdd->prenom_utilisateur);
            $image->setNomUtilisateur($image_bdd->nom_utilisateur);
            $image->setCourrielUtilisateur($image_bdd->courriel_utilisateur);
            $image->setHauteur($image_bdd->hauteur);
            $image->setLargeur($image_bdd->largeur);
            $image->setDatePriseDeVue(new DateTime($image_bdd->date_prise_de_vue));
            $image->setMotsClesTexte($image_bdd->mots_cles_texte);
            $image->setCommentaire($image_bdd->commentaire);
            $image->setNomOriginal($image_bdd->nom_original);
            $image->setDateCreation(new DateTime($image_bdd->date_creation));
            $image->setDateModification(new DateTime($image_bdd->date_modification));
            $image->setDateLiaison(new DateTime($image_bdd->date_liaison));
            $image->setDateTransmission(new DateTime($image_bdd->date_transmission));
            $obs->addImages($image);
        }
        $id = 0;
        $comm= new DelCommentaire();
        $cpt = 1;
        $nb_lines = count($comms_bdd);
        foreach($comms_bdd as $comm_bdd){
            
            if ($id===0 OR $id!== $comm_bdd->ce_proposition){
                if($cpt<$nb_lines AND $comm->getIdCommentaire() !== null){
                    $comm->setScore($comm_bdd->points);
                    $obs->addCommentaires($comm);
                    
                }
                $comm = new DelCommentaire();
                $comm->setIdCommentaire($comm_bdd->id_commentaire);
                $comm->setTexte($comm_bdd->texte);
                $comm->setCeUtilisateur($comm_bdd->ce_utilisateur);
                $comm->setUtilisateurNom($comm_bdd->utilisateur_nom);
                $comm->setUtilisateurPrenom($comm_bdd->utilisateur_prenom);
                $comm->setUtilisateurCourriel($comm_bdd->utilisateur_courriel);
                $comm->setNomSel($comm_bdd->nom_sel);
                $comm->setNomSelNn($comm_bdd->nom_sel_nn);
                $comm->setNomRet($comm_bdd->nom_ret);
                $comm->setNomRetNn($comm_bdd->nom_ret_nn);
                $comm->setNt($comm_bdd->nt);
                $comm->setFamille($comm_bdd->famille);
                $comm->setNomReferentiel($comm_bdd->nom_referentiel);
                $comm->setDate(new DateTime($comm_bdd->date));
                $comm->setPropositionInitiale($comm_bdd->proposition_initiale);
                $comm->setPropositionRetenue($comm_bdd->proposition_retenue);
                $comm->setCeValidateur($comm_bdd->ce_validateur);
                $comm->setDateValidation(new DateTime($comm_bdd->date_validation));
               

            }
                $comm_vote= $this->setCommentaireVote($comm_bdd);
               
                $comm->addCommentaireVotes($comm_vote);
                $id=$comm_bdd->ce_proposition;
                if ($cpt === $nb_lines){
                    $comm->setScore($comm_bdd->points);
                    $obs->addCommentaires($comm);
                  
                }
                $cpt++;
        }
    
        return $obs;
    }

    function setCommentaireVote($comm_bdd): ?DelCommentaireVote
    {
        $comm_vote = new DelCommentaireVote();
        $comm_vote->setIdVote($comm_bdd->id_vote);
        $comm_vote->setValeur($comm_bdd->valeur);
        $comm_vote->setCeUtilisateur($comm_bdd->id_user);
        return $comm_vote;
    }
    
    
}
