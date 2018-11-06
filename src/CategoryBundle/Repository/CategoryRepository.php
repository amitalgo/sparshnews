<?php

namespace CategoryBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function findByParent()
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT c FROM CategoryBundle:category c LEFT JOIN NewsBundle:News n WITH n.newsCategory=c.id WHERE c.parentId IS NULL GROUP BY c.id ORDER BY c.sortOrder ASC"
            )
            ->getResult();
    }
    //.id,c.name,c.children,c.icon,c.image,count(n.id) AS news_count
}

?>