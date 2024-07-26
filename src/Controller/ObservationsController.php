<?php

namespace App\Controller;

use App\Services\PdoConnection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use \PDO;

class ObservationsController extends AbstractController
{
    #[Route('/observations/{id}', name: 'app_observations')]
    public function index(int $id,PdoConnection $connex): JsonResponse
    {
       
        $req = "SELECT id_observation,nom_utilisateur,nom_sel,famille,ce_zone_geo,zone_geo,station,milieu,nom_referentiel,date_observation,certitude,pays,input_source FROM tb_del.del_observation WHERE id_observation=?";
        $stmt = $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();

        $req = "SELECT nom_original FROM del_image WHERE ce_observation=?";
        $stmt= $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res2 = $stmt->fetchAll();

        $req = "SELECT id_commentaire,ce_commentaire_parent,nom_sel,texte,utilisateur_prenom,utilisateur_nom,date FROM tb_del.del_commentaire WHERE ce_observation=?";
        $stmt= $connex->prepare($req);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res3 = $stmt->fetchAll();
        return $this->json([
            'observations' => $res1,
            'images' => $res2,
            'commentaires' => $res3
            
        ]);


    }
}
