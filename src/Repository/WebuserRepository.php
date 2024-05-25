<?php

namespace App\Repository;

use App\Entity\Webuser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Webuser>
 *
 * @method Webuser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Webuser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Webuser[]    findAll()
 * @method Webuser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebuserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Webuser::class);
    }

//    /**
//     * @return Webuser[] Returns an array of Webuser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Webuser
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
