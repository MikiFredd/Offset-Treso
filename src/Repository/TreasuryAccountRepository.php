<?php

namespace App\Repository;

use App\Entity\TreasuryAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TreasuryAccount>
 *
 * @method TreasuryAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method TreasuryAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method TreasuryAccount[]    findAll()
 * @method TreasuryAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreasuryAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TreasuryAccount::class);
    }

    public function add(TreasuryAccount $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TreasuryAccount $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TreasuryAccount[] Returns an array of TreasuryAccount objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TreasuryAccount
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
