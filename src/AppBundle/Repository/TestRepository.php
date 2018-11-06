<?php

// src/AppBundle/Repository/ProductRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TestRepository extends EntityRepository
{
    public function findByParent()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c FROM AppBundle:Test c WHERE c.parent IS NULL '
            )
            ->getResult();
    }
}