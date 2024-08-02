<?php

namespace App\Repository;

use App\Entity\DelObservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneById($value): ?DelObservation
    {
        $query = $this->createQueryBuilder('o')
        ->andWhere('o.id_observation = :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getSingleResult();

        /* dump($query); */
        return $query;
        
    }
}
