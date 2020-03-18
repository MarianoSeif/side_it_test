<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }


    public function findAllOrderedByNewest()
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.create_date', 'ASC')
            ->getQuery()
            ->getResult();
    }
    
    
    /**
    * @return Task[] Returns an array of Task objects
    */
    
    public function findByCustomValue($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.name LIKE :val OR t.details LIKE :val OR c.name LIKE :val OR cat.name LIKE :val')
            ->leftJoin('t.client', 'c')
            ->leftJoin('t.category', 'cat')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Task
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
