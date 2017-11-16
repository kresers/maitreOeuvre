<?php

namespace MaitreOeuvreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="chantier")
 * @ORM\Entity(repositoryClass="MaitreOeuvreBundle\Repository\ChantierRepository")
 */
class Chantier
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
     * @ORM\ManyToOne(targetEntity="MaitreOeuvreBundle\Entity\TypeChantier",inversedBy="chantier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeChantier;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="chantier")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="MaitreOeuvreBundle\Entity\Etape", mappedBy="chantier",cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $etape;

    /**
     * @var string
     *
     * @ORM\Column(name="numPermis", type="string", length=255)
     */
    private $numPermis;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    private $rue;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="string")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;


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
     * Set numPermis
     *
     * @param string $numPermis
     * @return Chantier
     */
    public function setNumPermis($numPermis)
    {
        $this->numPermis = $numPermis;

        return $this;
    }

    /**
     * Get numPermis
     *
     * @return string 
     */
    public function getNumPermis()
    {
        return $this->numPermis;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Chantier
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Chantier
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Chantier
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Chantier
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Chantier
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
     * Set typeChantier
     *
     * @param \MaitreOeuvreBundle\Entity\TypeChantier $typeChantier
     * @return Chantier
     */
    public function setTypeChantier(\MaitreOeuvreBundle\Entity\TypeChantier $typeChantier)
    {
        $this->typeChantier = $typeChantier;
    
        return $this;
    }

    /**
     * Get typeChantier
     *
     * @return \MaitreOeuvreBundle\Entity\TypeChantier 
     */
    public function getTypeChantier()
    {
        return $this->typeChantier;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chantier = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $chantier
     * @return Chantier
     */
    public function addChantier(\MaitreOeuvreBundle\Entity\Etape $chantier)
    {
        $this->chantier[] = $chantier;

        return $this;
    }

    /**
     * Remove chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $chantier
     */
    public function removeChantier(\MaitreOeuvreBundle\Entity\Etape $chantier)
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

    /**
     * Set client
     *
     * @param \UserBundle\Entity\User $client
     * @return Chantier
     */
    public function setClient(\UserBundle\Entity\User $client)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \UserBundle\Entity\User 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Chantier
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Add etape
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $etape
     * @return Chantier
     */
    public function addEtape(\MaitreOeuvreBundle\Entity\Etape $etape)
    {
        $this->etape[] = $etape;
    
        return $this;
    }

    /**
     * Remove etape
     *
     * @param \MaitreOeuvreBundle\Entity\Etape $etape
     */
    public function removeEtape(\MaitreOeuvreBundle\Entity\Etape $etape)
    {
        $this->etape->removeElement($etape);
    }

    /**
     * Get etape
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtape()
    {
        return $this->etape;
    }
}
