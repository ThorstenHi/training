<?php

namespace WhereGroup\Training\HistoryBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use WhereGroup\Training\CoreBundle\Event\ProjectEvent;

/**
 * Class ProjectListener
 *
 * @package WhereGroup\Training\HistoryBundle\EventListener
 * @author  A.R.Pour
 */
class ProjectListener
{
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param ProjectEvent $event
     */
    public function onSave(ProjectEvent $event)
    {
        $this->container->get('wheregroup.training.history')
            ->save($event->getEntity());

    }

    /**
     * @param ProjectEvent $event
     */
    public function onDelete(ProjectEvent $event)
    {
        $this->container->get('wheregroup.training.history')
            ->delete($event->getEntity());
    }
}
