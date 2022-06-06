<?php

namespace App\Repository;

use App\Entity\IllustrationArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IllustrationArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method IllustrationArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method IllustrationArticle[]    findAll()
 * @method IllustrationArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IllustrationArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IllustrationArticle::class);
    }

    // /**
    //  * @return IllustrationArticle[] Returns an array of IllustrationArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IllustrationArticle
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
