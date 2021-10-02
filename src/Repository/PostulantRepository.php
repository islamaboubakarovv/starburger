<?php

namespace App\Repository;

use App\Entity\Postulant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Postulant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Postulant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Postulant[]    findAll()
 * @method Postulant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostulantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Postulant::class);
    }

    // /**
    //  * @return Postulant[] Returns an array of Postulant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Postulant
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
