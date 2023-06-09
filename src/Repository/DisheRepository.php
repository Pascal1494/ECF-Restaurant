<?php

namespace App\Repository;

use App\Entity\Menu;
use App\Entity\Dishe;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Dishe>
 *
 * @method Dishe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dishe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dishe[]    findAll()
 * @method Dishe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dishe::class);
    }

    public function save(Dishe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Dishe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function getDishesByMenu(Menu $menu): array
    {
        $dishes = $this->getEntityManager()
            ->getRepository(Dishe::class)
            ->createQueryBuilder('d')
            ->where('d.menu = :menu')
            ->setParameter('menu', $menu)
            ->getQuery()
            ->getResult();

        return $dishes;
    }

    public function findAllGroupedByCategory(): array
    {
        $query = $this->createQueryBuilder('d')
            ->join('d.category', 'c')
            ->addSelect('c')
            ->orderBy('c.name', 'ASC')
            ->getQuery();

        $results = $query->getResult();

        $dishesByCategory = [];
        foreach ($results as $dish) {
            $category = $dish->getCategory();

            if (!isset($dishesByCategory[$category->getId()])) {
                $dishesByCategory[$category->getId()] = [
                    'category' => $category,
                    'dishes' => [],
                ];
            }

            $dishesByCategory[$category->getId()]['dishes'][] = $dish;
        }

        return array_values($dishesByCategory);
    }



    //    /**
    //     * @return Dishe[] Returns an array of Dishe objects
    //     */
    // public function findByField($menu): array
    // {
    //     return $this->createQueryBuilder('d')
    //         ->andWhere('d.menu = :menu')
    //         ->setParameter('menu', $menu)
    //         ->orderBy('d.id', 'ASC')
    //         ->setMaxResults(3)
    //         ->getQuery()
    //         ->getResult();
    // }
    //    /**
    //     * @return Dishe[] Returns an array of Dishe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Dishe
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
