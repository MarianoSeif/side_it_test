<?php

namespace App\Repository;

use App\Entity\BlmozosSueldo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlmozosSueldo|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlmozosSueldo|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlmozosSueldo[]    findAll()
 * @method BlmozosSueldo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlmozosSueldoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlmozosSueldo::class);
    }

    // /**
    //  * @return BlmozosSueldo[] Returns an array of BlmozosSueldo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlmozosSueldo
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
