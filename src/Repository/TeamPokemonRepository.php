<?php

namespace App\Repository;

use App\Entity\TeamPokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TeamPokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamPokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamPokemon[]    findAll()
 * @method TeamPokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamPokemonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TeamPokemon::class);
    }

    // /**
    //  * @return TeamPokemon[] Returns an array of TeamPokemon objects
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
    public function findOneBySomeField($value): ?TeamPokemon
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
