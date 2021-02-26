<?php

namespace App\Repository;

use App\Entity\ZapatillaUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZapatillaUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZapatillaUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZapatillaUsuario[]    findAll()
 * @method ZapatillaUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZapatillaUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZapatillaUsuario::class);
    }

    // /**
    //  * @return ZapatillaUsuario[] Returns an array of ZapatillaUsuario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ZapatillaUsuario
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
