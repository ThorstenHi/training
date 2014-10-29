<?php

namespace WhereGroup\Training\CoreBundle\Component;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use WhereGroup\Training\CoreBundle\Event\RessourceEvent;

/**
 * Class Ressource
 *
 * @package WhereGroup\CoreBundle\Component
 * @author  Thorsten Hildebrand <thorsten.hildebrand@wheregroup.com>
 */
class Ressource
{
    private $em;
    private $ed;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em, EventDispatcherInterface $ed)
    {
        $this->em = $em;
        /** @var  \WhereGroup\Training\CoreBundle\Entity\Ressource */
        $this->repo = $this->em->getRepository('TrainingCoreBundle:Ressource');
        $this->ed = $ed;
    }

    /**
     * @return array|\WhereGroup\Training\CoreBundle\Entity\Ressource[]
     */
    public function getAll()
    {
        return $this->repo->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->repo->findOneById($id);
    }

    /**
     * @param $entity
     */
    public function save($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        // dispatch event
        $this->ed->dispatch('ressource.save', new RessourceEvent($entity));

    }

    /**
     * @param $entity
     */
    public function delete($entity)
    {
        // dispatch event
        $this->ed->dispatch('ressource.delete', new RessourceEvent($entity));

        $this->em->remove($entity);
        $this->em->flush();
    }
}
