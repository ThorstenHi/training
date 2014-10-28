<?php

namespace WhereGroup\Training\HistoryBundle\Component;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class HistoryInterface
 *
 * @package WhereGroup\TrainingBundle\Component
 * @author  A.R.Pour
 */
interface HistoryInterface
{
    public function __construct(EntityManagerInterface $em);
    public function newEntity();
    public function getAll($id);
    public function save($entity);
    public function delete($entity);
}
