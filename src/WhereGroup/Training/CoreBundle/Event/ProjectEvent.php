<?php

namespace WhereGroup\Training\CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ProjectEvent
 *
 * @package WhereGroup\Training\CoreBundle\Event
 * @author  A.R.Pour
 */
class ProjectEvent extends Event
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
