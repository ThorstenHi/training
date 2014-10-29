<?php

namespace WhereGroup\Training\HistoryBundle\Component;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class History
 *
 * @package WhereGroup\TrainingBundle\Component
 * @author  A.R.Pour
 */
class History implements HistoryInterface
{
    private $em;
    private $sc;
    private $repo;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em, SecurityContextInterface $sc)
    {
        $this->em = $em;
        $this->sc = $sc;
        /** @var  \WhereGroup\Training\CoreBundle\Entity\Project */
        $this->repo = $this->em->getRepository('TrainingHistoryBundle:History');
    }

    /**
     * @return \WhereGroup\Training\HistoryBundle\Entity\History
     */
    public function newEntity()
    {
        return new \WhereGroup\Training\HistoryBundle\Entity\History();
    }

    /**
     * @return array|\WhereGroup\Training\CoreBundle\Entity\Project[]
     */
    public function getAll($id)
    {
        return $this->repo->findByProjectId($id, array('id' => 'desc'));
    }

    /**
     * @param \WhereGroup\Training\CoreBundle\Entity\Project $entity
     */
    public function save($entity)
    {
        $user = $this->sc->getToken()->getUser();
        // echo $user->getUsername();

        $history = $this->newEntity();
        $history
            ->setProjectId($entity->getId())
            ->setName($entity->getName())
            ->setDescription($entity->getDescription())
            ->setLeader($entity->getLeader())
            ->setDatetimez(new \DateTime())
            ->setUsername($this->getUser()->getUsername());

        $this->em->persist($history);
        $this->em->flush();
    }

    /**
     * @param $entity
     */
    public function delete($entity)
    {
        $rows = $this->repo->findByProjectId($entity->getId());

        foreach ($rows as $row) {
            $this->em->remove($row);
        }

        $this->em->flush();
    }
}
