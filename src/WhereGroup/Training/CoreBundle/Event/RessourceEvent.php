<?php

namespace WhereGroup\Training\CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class RessourceEvent
 *
 * @package WhereGroup\Training\CoreBundle\Event
 * @author  Thorsten Hildebrand <thorsten.hildebrand@wheregroup.com>
 */
class RessourceEvent extends Event
{
    protected $entity;

    /**
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
