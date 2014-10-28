<?php

namespace WhereGroup\Training\CoreBundle\Component;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use WhereGroup\Training\CoreBundle\Event\ProjectEvent;

/**
 * Class Project
 *
 * @package WhereGroup\CoreBundle\Component
 * @author  A.R.Pour <info@rpour.de>
 */
class Project
{
    private $em;
    private $ed;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em, EventDispatcherInterface $ed)
    {
        $this->em = $em;
        /** @var  \WhereGroup\Training\CoreBundle\Entity\Project */
        $this->repo = $this->em->getRepository('TrainingCoreBundle:Project');
        $this->ed = $ed;
    }

    /**
     * @return array|\WhereGroup\Training\CoreBundle\Entity\Project[]
     */
    public function getAll()
    {
        return $this->repo->findAll(array('id' => 'asc'));
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
        $this->ed->dispatch('project.save', new ProjectEvent($entity));

    }

    /**
     * @param $entity
     */
    public function delete($entity)
    {
        // dispatch event
        $this->ed->dispatch('project.delete', new ProjectEvent($entity));

        $this->em->remove($entity);
        $this->em->flush();
    }
}