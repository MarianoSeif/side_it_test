<?php

namespace App\Repository;

use App\Entity\Blmozo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Blmozo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blmozo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blmozo[]    findAll()
 * @method Blmozo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlmozoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blmozo::class);
    }

    public function getMozoConSueldo()
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin('m.sueldo', 's');

        return $qb->getQuery()->getResult();
    }
    // /**
    //  * @return Blmozo[] Returns an array of Blmozo objects
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
    public function findOneBySomeField($value): ?Blmozo
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
