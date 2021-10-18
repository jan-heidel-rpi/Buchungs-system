<?php

namespace App\Repository;

use App\Entity\Regnerate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Regnerate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Regnerate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Regnerate[]    findAll()
 * @method Regnerate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegnerateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Regnerate::class);
    }

    // /**
    //  * @return Regnerate[] Returns an array of Regnerate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Regnerate
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
