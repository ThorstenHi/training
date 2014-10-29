<?php

namespace WhereGroup\Training\HistoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class History
 *
 * @package WhereGroup\CoreBundle\Entity
 * @author  A.R.Pour <info@rpour.de>
 *
 * @ORM\Table(name="training_history")
 * @ORM\Entity
 */
class History
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $projectId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $leader;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $datetimez;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set projectId
     *
     * @param integer $projectId
     * @return History
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return integer 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return History
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return History
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set leader
     *
     * @param string $leader
     * @return History
     */
    public function setLeader($leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return string 
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set datetimez
     *
     * @param \DateTime $datetimez
     * @return History
     */
    public function setDatetimez($datetimez)
    {
        $this->datetimez = $datetimez;

        return $this;
    }

    /**
     * Get datetimez
     *
     * @return \DateTime 
     */
    public function getDatetimez()
    {
        return $this->datetimez;
    }
}
