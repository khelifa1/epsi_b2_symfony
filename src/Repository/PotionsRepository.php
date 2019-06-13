<?php

namespace App\Repository;

use App\Entity\Potions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Potions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Potions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Potions[]    findAll()
 * @method Potions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PotionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Potions::class);
    }

    // /**
    //  * @return Potions[] Returns an array of Potions objects
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
    public function findOneBySomeField($value): ?Potions
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
