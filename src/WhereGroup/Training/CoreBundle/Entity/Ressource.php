<?php

namespace WhereGroup\Training\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WhereGroup\CoreBundle\Entity\Ressource
 *
 * @package WhereGroup\CoreBundle\Entity
 * @author  Thorsten Hildebrand <thorsten.hildebrand@wheregroup.com>
 *
 * @ORM\Table(name="training_ressource")
 * @ORM\Entity
 */
class Ressource
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ressourcenname fehlt.")
     * @Assert\Length(
     *      min = 2,
     *      max = 10,
     *      minMessage = "Your ressource name must be at least {{ limit }} characters long",
     *      maxMessage = "Your ressource name cannot be longer than {{ limit }} characters long"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Beschreibung fehlt.")
     */
    private $description;

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
     * Set name
     *
     * @param string $name
     * @return Ressource
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
     * @return Ressource
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
}
