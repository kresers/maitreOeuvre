<?php

namespace MaitreOeuvreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etape
 *
 * @ORM\Table(name="etape")
 * @ORM\Entity(repositoryClass="MaitreOeuvreBundle\Repository\EtapeRepository")
 */
class Etape
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\ManyToOne(targetEntity="MaitreOeuvreBundle\Entity\Chantier",inversedBy="etape")
     * @ORM\JoinColumn(nullable=true)
     */
    private $chantier;

    /**
     * @ORM\ManyToOne(targetEntity="MaitreOeuvreBundle\Entity\Specialite",inversedBy="etape")
     * @ORM\JoinColumn(nullable=true)
     */
    private $specialite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeb", type="date")
     */
    private $dateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity="MaitreOeuvreBundle\Entity\VisiteChantier", mappedBy="etape",cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $visite;

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
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     * @return Etape
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime 
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Etape
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set etape
     *
     * @param \MaitreOeuvreBundle\Entity\Chantier $etape
     * @return Etape
     */
    public function setEtape(\MaitreOeuvreBundle\Entity\Chantier $etape = null)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return \MaitreOeuvreBundle\Entity\Chantier 
     */
    public function getEtape()
    {
        return $this->etape;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etapeVisite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etapeVisite
     *
     * @param \MaitreOeuvreBundle\Entity\VisiteChantier $etapeVisite
     * @return Etape
     */
    public function addEtapeVisite(\MaitreOeuvreBundle\Entity\VisiteChantier $etapeVisite)
    {
        $this->etapeVisite[] = $etapeVisite;

        return $this;
    }

    /**
     * Remove etapeVisite
     *
     * @param \MaitreOeuvreBundle\Entity\VisiteChantier $etapeVisite
     */
    public function removeEtapeVisite(\MaitreOeuvreBundle\Entity\VisiteChantier $etapeVisite)
    {
        $this->etapeVisite->removeElement($etapeVisite);
    }

    /**
     * Get etapeVisite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtapeVisite()
    {
        return $this->etapeVisite;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return Etape
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Chantier $chantier
     * @return Etape
     */
    public function setChantier(\MaitreOeuvreBundle\Entity\Chantier $chantier = null)
    {
        $this->chantier = $chantier;
    
        return $this;
    }

    /**
     * Get chantier
     *
     * @return \MaitreOeuvreBundle\Entity\Chantier 
     */
    public function getChantier()
    {
        return $this->chantier;
    }

    /**
     * Add visite
     *
     * @param \MaitreOeuvreBundle\Entity\VisiteChantier $visite
     * @return Etape
     */
    public function addVisite(\MaitreOeuvreBundle\Entity\VisiteChantier $visite)
    {
        $this->visite[] = $visite;
    
        return $this;
    }

    /**
     * Remove visite
     *
     * @param \MaitreOeuvreBundle\Entity\VisiteChantier $visite
     */
    public function removeVisite(\MaitreOeuvreBundle\Entity\VisiteChantier $visite)
    {
        $this->visite->removeElement($visite);
    }

    /**
     * Get visite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisite()
    {
        return $this->visite;
    }

    /**
     * Set specialite
     *
     * @param \MaitreOeuvreBundle\Entity\Specialite $specialite
     * @return Etape
     */
    public function setSpecialite(\MaitreOeuvreBundle\Entity\Specialite $specialite = null)
    {
        $this->specialite = $specialite;
    
        return $this;
    }

    /**
     * Get specialite
     *
     * @return \MaitreOeuvreBundle\Entity\Specialite 
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }
}
