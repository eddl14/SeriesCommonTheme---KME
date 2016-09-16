<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Producteur;
use AppBundle\Entity\Serie;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Producteur
 *
 * @ORM\Table(name="producteur")
 * @ORM\Entity(repositoryClass="ProducteurRepository")
 */
class Producteur
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
     * @ORM\Column(name="nomProducteur", type="string", length=255)
     */
    private $nomProducteur;
    
    /**
     * @ManyToMany(targetEntity="Serie", inversedBy="producteurs")
     * 
     */
    private $series;
    /**
     * @var string
     *
     * @ORM\Column(name="prenomProducteur", type="string", length=255)
     */
    private $prenomProducteur;


    /**
     * @var string
     * 
     * @Assert\Url(
     *  message = "The url '{{ value }}' is not a valid url",
     * )
     */
    private $photo;
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
     * Set nomProducteur
     *
     * @param string $nomProducteur
     * @return Producteur
     */
    public function setNomProducteur($nomProducteur)
    {
        $this->nomProducteur = $nomProducteur;

        return $this;
    }

    /**
     * Get nomProducteur
     *
     * @return string 
     */
    public function getNomProducteur()
    {
        return $this->nomProducteur;
    }

    /**
     * Set prenomProducteur
     *
     * @param string $prenomProducteur
     * @return Producteur
     */
    public function setPrenomProducteur($prenomProducteur)
    {
        $this->prenomProducteur = $prenomProducteur;

        return $this;
    }

    /**
     * Get prenomProducteur
     *
     * @return string 
     */
    public function getPrenomProducteur()
    {
        return $this->prenomProducteur;
    }
    
     /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Producteur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->series = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add series
     *
     * @param \AppBundle\Entity\Serie $series
     * @return Producteur
     */
    public function addSeries(\AppBundle\Entity\Serie $series)
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * Remove series
     *
     * @param \AppBundle\Entity\Serie $series
     */
    public function removeSeries(\AppBundle\Entity\Serie $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeries()
    {
        return $this->series;
    }
}
