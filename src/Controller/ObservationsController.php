<?php

namespace App\Controller;

use App\Entity\DelObservation;
use App\Repository\DelObservationRepository;
use App\Services\PdoConnection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use \PDO;

class ObservationsController extends AbstractController
{
    #[Route('/observations/{id}', name: 'app_observations',methods:['GET'])]
    public function index(int $id,DelObservationRepository $obsRepository): JsonResponse
    {
        $observation = new DelObservation();
        $observation = $obsRepository->findOneById($id);
        $observation_json = $this->json($observation,200,[],['groups' => ['observation','utilisateur','utilisateur_infos','image','image_vote','image_stat','image_tag','commentaire','commentaire_vote']]);
        
        return $observation_json;
        

    }
}
