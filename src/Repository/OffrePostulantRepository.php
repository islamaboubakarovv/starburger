<?php

namespace App\Repository;

use App\Entity\OffrePostulant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OffrePostulant|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffrePostulant|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffrePostulant[]    findAll()
 * @method OffrePostulant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffrePostulantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffrePostulant::class);
    }

    // /**
    //  * @return OffrePostulant[] Returns an array of OffrePostulant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OffrePostulant
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
