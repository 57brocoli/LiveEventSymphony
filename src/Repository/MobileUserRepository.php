<?php

namespace App\Repository;

use App\Entity\NationSound\MobileUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MobileUser>
 *
 * @method MobileUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method MobileUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method MobileUser[]    findAll()
 * @method MobileUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MobileUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MobileUser::class);
    }

//    /**
//     * @return MobileUser[] Returns an array of MobileUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MobileUser
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
