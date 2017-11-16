<?php

namespace MaitreOeuvreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeChantier
 *
 * @ORM\Table(name="type_chantier")
 * @ORM\Entity(repositoryClass="MaitreOeuvreBundle\Repository\TypeChantierRepository")
 */
class TypeChantier
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="MaitreOeuvreBundle\Entity\Chantier",mappedBy="typeChantier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chantier;


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
     * Set libelle
     *
     * @param string $libelle
     * @return TypeChantier
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chantier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * Add chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Chantier $chantier
     * @return TypeChantier
     */
    public function addChantier(\MaitreOeuvreBundle\Entity\Chantier $chantier)
    {
        $this->chantier[] = $chantier;
    
        return $this;
    }

    /**
     * Remove chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Chantier $chantier
     */
    public function removeChantier(\MaitreOeuvreBundle\Entity\Chantier $chantier)
    {
        $this->chantier->removeElement($chantier);
    }

    /**
     * Get chantier
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChantier()
    {
        return $this->chantier;
    }
}
