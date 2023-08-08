<?php

namespace App\Repository;

use App\Entity\OffreDEmploi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OffreDEmploi>
 *
 * @method OffreDEmploi|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreDEmploi|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreDEmploi[]    findAll()
 * @method OffreDEmploi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreDEmploiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreDEmploi::class);
    }

    public function add(OffreDEmploi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OffreDEmploi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OffreDEmploi[] Returns an array of OffreDEmploi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OffreDEmploi
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
