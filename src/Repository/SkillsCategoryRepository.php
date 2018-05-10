<?php

namespace App\Repository;

use App\Entity\SkillsCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SkillsCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillsCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillsCategory[]    findAll()
 * @method SkillsCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillsCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SkillsCategory::class);
    }

//    /**
//     * @return SkillsCategory[] Returns an array of SkillsCategory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SkillsCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
