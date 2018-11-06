<?php

namespace NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function fetchExcept($catId,$newsId)
    {
        // return $this->getEntityManager()
        //     ->createQuery(
        //         "SELECT c FROM NewsBundle:News c WHERE c.newsCategory=$catId and c.id!=$newsId"
        //     )
        //     ->getResult();
            
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder->select('n')->from('NewsBundle:News', 'n')->where('n.newsCategory = (:catId)')->andWhere('n.id != (:newsId)')->setParameter('catId', $catId)->setParameter('newsId',$newsId);
        return $queryBuilder->getQuery()->getResult();
    }
}