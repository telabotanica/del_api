<?php

namespace App\Controller;

use App\Entity\DelObservation;
use App\Repository\DelObservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ObservationsController extends AbstractController
{

    //Récupère une observation avec son utilisateur, ses images et ses commentaires
    #[Route('/observation/{id}', name: 'app_observations',methods:['GET'])]
    public function index(int $id,DelObservationRepository $obsRepository): JsonResponse
    {
        $observation = new DelObservation();
        $observation = $obsRepository->findOneById($id);
        
        return $this->json($observation, 200, [], ['groups' => ['observation','image','commentaire','commentaire_vote']]);
        

    }

    #[Route('/observationsToDetermine/{page}/{limit}', name: 'app_observations_determine',methods:['GET'])]
    public function observationsToDetermine(int $page,int $limit,DelObservationRepository $obsRepository): JsonResponse
    {
        
        $observations = $obsRepository->findToDetermineObservations($page,$limit);
        $results = $this->json($observations, 200, [], ['groups' => ['observation','image','commentaire','commentaire_vote']]);
       
        return $results;
    }
        
    #[Route('/observationsToConfirm/{page}/{limit}', name: 'app_observations_confirm',methods:['GET'])]
    public function observationsToConfirm(int $page,int $limit,DelObservationRepository $obsRepository): JsonResponse
    {
        
        $observations = $obsRepository->findToConfirmObservations($page,$limit);
        $results = $this->json($observations, 200, [], ['groups' => ['observation','image','commentaire','commentaire_vote']]);
       
        return $results;
    }

    #[Route('/observationsVerified/{page}/{limit}', name: 'app_observations_verified',methods:['GET'])]
    public function observationsVerified(int $page,int $limit,DelObservationRepository $obsRepository): JsonResponse
    {
        
        $observations = $obsRepository->findVerifiedObservations($page,$limit);
        $results = $this->json($observations, 200, [], ['groups' => ['observation','image','commentaire','commentaire_vote']]);
       
        return $results;
    }
}
