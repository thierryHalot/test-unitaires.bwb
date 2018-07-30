<?php

namespace App\Repository;

use App\Entity\ClubFoot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClubFoot|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClubFoot|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClubFoot[]    findAll()
 * @method ClubFoot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClubFootRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClubFoot::class);
    }

//    /**
//     * @return ClubFoot[] Returns an array of ClubFoot objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClubFoot
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
