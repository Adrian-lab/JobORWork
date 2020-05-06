<?php

namespace App\Repository;

use App\Entity\OfertaEmpresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfertaEmpresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfertaEmpresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfertaEmpresa[]    findAll()
 * @method OfertaEmpresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfertaEmpresaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfertaEmpresa::class);
    }

    // /**
    //  * @return OfertaEmpresa[] Returns an array of OfertaEmpresa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfertaEmpresa
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
