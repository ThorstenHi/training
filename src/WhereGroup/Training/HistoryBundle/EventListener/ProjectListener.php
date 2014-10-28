<?php

namespace WhereGroup\Training\HistoryBundle\EventListener;

use WhereGroup\Training\CoreBundle\Event\ProjectEvent;
use WhereGroup\Training\HistoryBundle\Component\HistoryInterface;

/**
 * Class ProjectListener
 *
 * @package WhereGroup\Training\HistoryBundle\EventListener
 * @author  A.R.Pour
 */
class ProjectListener
{
    protected $history;

    /**
     * @param HistoryInterface $history
     */
    public function __construct(HistoryInterface $history)
    {
        $this->history = $history;
    }

    /**
     * @param ProjectEvent $event
     */
    public function onSave(ProjectEvent $event)
    {
        $this->history->save($event->getEntity());
    }

    /**
     * @param ProjectEvent $event
     */
    public function onDelete(ProjectEvent $event)
    {
        $this->history->delete($event->getEntity());
    }
}
