<?php

namespace WhereGroup\Training\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WhereGroup\CoreBundle\Entity\Project
 *
 * @package WhereGroup\CoreBundle\Entity
 * @author  A.R.Pour <info@rpour.de>
 *
 * @ORM\Table(name="training_project")
 * @ORM\Entity
 */
class Project
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Projektname fehlt.")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Beschreibung fehlt.")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Projektleiter fehlt.")
     */
    private $leader;
}
