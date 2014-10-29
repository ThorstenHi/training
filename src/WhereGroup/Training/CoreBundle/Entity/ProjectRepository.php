<?php

namespace WhereGroup\Training\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends EntityRepository
{

    public function findAllOrderedById()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM TrainingCoreBundle:Project p ORDER BY p.id ASC'
            )
            ->getResult();
    }
}
