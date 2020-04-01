<?php

namespace App\Repository;

use App\Entity\Tx;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tx|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tx|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tx[]    findAll()
 * @method Tx[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tx::class);
    }

    // /**
    //  * @return TxService[] Returns an array of TxService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TxService
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
