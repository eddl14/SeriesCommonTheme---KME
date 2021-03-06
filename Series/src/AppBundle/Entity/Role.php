<?php

namespace AppBundle\Entity;

use AppBundle\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;



/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;
    
     /**
     * @ManyToMany(targetEntity="Acteur", mappedBy="roles")
     * 
     */
    private $acteurs;
    
     /**
     * @ManyToOne(targetEntity="Serie", inversedBy="acteursRoles")
     * 
     */
    private $seriesRoles;
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
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteurs
     *
     * @param \AppBundle\Entity\Acteur $acteurs
     * @return Role
     */
    public function addActeur(\AppBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \AppBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\AppBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set seriesRoles
     *
     * @param \AppBundle\Entity\Serie $seriesRoles
     * @return Role
     */
    public function setSeriesRoles(\AppBundle\Entity\Serie $seriesRoles = null)
    {
        $this->seriesRoles = $seriesRoles;

        return $this;
    }

    /**
     * Get seriesRoles
     *
     * @return \AppBundle\Entity\Serie 
     */
    public function getSeriesRoles()
    {
        return $this->seriesRoles;
    }
}
