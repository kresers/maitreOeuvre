<?php

namespace MaitreOeuvreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VisiteChantier
 *
 * @ORM\Table(name="visite_chantier")
 * @ORM\Entity(repositoryClass="MaitreOeuvreBundle\Repository\VisiteChantierRepository")
 */
class VisiteChantier
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateVisite", type="date")
     */
    private $dateVisite;

    /**
     * @var \String
     *
     * @ORM\Column(name="compteRendu", type="string")
     */
    private $compteRendu;


    /**
     * @ORM\ManyToOne(targetEntity="MaitreOeuvreBundle\Entity\Etape", inversedBy="visite",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $etape;


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
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     * @return VisiteChantier
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    /**
     * Get dateVisite
     *
     * @return \DateTime
     */
    public function getDateVisite()
    {
        return $this->dateVisite;
    }

    /**
     * Set compteRendu
     *
     * @param string $compteRendu
     * @return VisiteChantier
     */
    public function setCompteRendu($compteRendu)
    {
        $this->compteRendu = $compteRendu;

        return $this;
    }

    /**
     * Get compteRendu
     *
     * @return string 
     */
    public function getCompteRendu()
    {
        return $this->compteRendu;
    }


    /**
     * Set visite
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $visite
     * @return VisiteChantier
     */
    public function setVisite(\MaitreOeuvreBundle\Entity\Etape $visite = null)
    {
        $this->visite = $visite;

        return $this;
    }

    /**
     * Get visite
     *
     * @return \MaitreOeuvreBundle\Entity\Etape 
     */
    public function getVisite()
    {
        return $this->visite;
    }



    /**
     * Set etape
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $etape
     * @return VisiteChantier
     */
    public function setEtape(\MaitreOeuvreBundle\Entity\Etape $etape = null)
    {
        $this->etape = $etape;
    
        return $this;
    }

    /**
     * Get etape
     *
     * @return \MaitreOeuvreBundle\Entity\Etape 
     */
    public function getEtape()
    {
        return $this->etape;
    }
}
