<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function findAllOrdered()
    {
        $qb = $this->createQueryBuilder('cat')

            ->addOrderBy('cat.name', 'ASC');
        $query = $qb->getQuery();

        return $query->execute();
        //dump($query->getSQL());
        //die;
    }
    
    public function search($term)
    {
        return $qb = $this->createQueryBuilder('cat')
            ->andWhere('cat.name LIKE :searchTerm OR cat.iconKey LIKE :searchTerm')
            ->setParameter('searchTerm', '%'.$term.'%')
            ->getQuery()
            ->execute();
    }
}
