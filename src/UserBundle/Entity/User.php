<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="email",
 *         column=@ORM\Column(
 *              name     = "email",
 *              type     = "string",
 *              length   = 255,
 *              nullable = true
 *          )
 *      ),
 *     @ORM\AttributeOverride(name="emailCanonical",
 *         column=@ORM\Column(
 *              name     = "emailCanonical",
 *              type     = "string",
 *              length   = 255,
 *              nullable = true
 *          )
 *      ),
 * })
 */
class User extends BaseUser
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCrea", type="date", nullable=true)
     */
    protected $dateCrea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="date", nullable=true)
     */
    protected $dateModif;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_port", type="string", length=255, nullable=true)
     */
    protected $telPort;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    protected $site;

    /**
     * @var string
     *
     * @ORM\Column(name="num_police", type="string", length=255, nullable=true)
     */
    protected $numPolice;

    /**
     * @var string
     *
     * @ORM\Column(name="num_assureur", type="string", length=255, nullable=true)
     */
    protected $numAssureur;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255, nullable=true)
     */
    protected $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=255, nullable=true)
     */
    protected $cp;
    /**
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", length=255, nullable=true)
     */
    protected $telFixe;

    /**
     * @ORM\ManyToOne(targetEntity="MaitreOeuvreBundle\Entity\Specialite", inversedBy="user")
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id")
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity="MaitreOeuvreBundle\Entity\Chantier", mappedBy="client")
     * @ORM\JoinColumn()
     */
    private $chantier;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="string", length=255, nullable=true)
     */
    protected $avis;

    /**
     * @ORM\ManyToMany(targetEntity="MaitreOeuvreBundle\Entity\Certification",cascade={"persist"})
     */
    private $certification;

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telPort
     *
     * @param string $telPort
     * @return User
     */
    public function setTelPort($telPort)
    {
        $this->telPort = $telPort;

        return $this;
    }

    /**
     * Get telPort
     *
     * @return string
     */
    public function getTelPort()
    {
        return $this->telPort;
    }

    /**
     * Set telFixe
     *
     * @param string $telFixe
     * @return User
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * Get telFixe
     *
     * @return string
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     * @return User
     */
    public function setDateCrea($dateCrea)
    {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    /**
     * Get dateCrea
     *
     * @return \DateTime
     */
    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     * @return User
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return User
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
     * Set ville
     *
     * @param string $ville
     * @return User
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
     * Set cp
     *
     * @param string $cp
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set numPolice
     *
     * @param string $numPolice
     * @return User
     */
    public function setNumPolice($numPolice)
    {
        $this->numPolice = $numPolice;
    
        return $this;
    }

    /**
     * Get numPolice
     *
     * @return string 
     */
    public function getNumPolice()
    {
        return $this->numPolice;
    }

    /**
     * Set numAssureur
     *
     * @param string $numAssureur
     * @return User
     */
    public function setNumAssureur($numAssureur)
    {
        $this->numAssureur = $numAssureur;
    
        return $this;
    }

    /**
     * Get numAssureur
     *
     * @return string 
     */
    public function getNumAssureur()
    {
        return $this->numAssureur;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return User
     */
    public function setSite($site)
    {
        $this->site = $site;
    
        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set specialite
     *
     * @param \MaitreOeuvreBundle\Entity\Specialite $specialite
     * @return User
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

    /**
     * Add certfication
     *
     * @param \MaitreOeuvreBundle\Entity\Certification $certfication
     * @return User
     */
    public function addCertfication(\MaitreOeuvreBundle\Entity\Certification $certfication)
    {
        $this->certfication[] = $certfication;
    
        return $this;
    }

    /**
     * Remove certfication
     *
     * @param \MaitreOeuvreBundle\Entity\Certification $certfication
     */
    public function removeCertfication(\MaitreOeuvreBundle\Entity\Certification $certfication)
    {
        $this->certfication->removeElement($certfication);
    }

    /**
     * Get certfication
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCertfication()
    {
        return $this->certfication;
    }

    /**
     * Add certification
     *
     * @param \MaitreOeuvreBundle\Entity\Certification $certification
     * @return User
     */
    public function addCertification(\MaitreOeuvreBundle\Entity\Certification $certification)
    {
        $this->certification[] = $certification;
    
        return $this;
    }

    /**
     * Remove certification
     *
     * @param \MaitreOeuvreBundle\Entity\Certification $certification
     */
    public function removeCertification(\MaitreOeuvreBundle\Entity\Certification $certification)
    {
        $this->certification->removeElement($certification);
    }

    /**
     * Get certification
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCertification()
    {
        return $this->certification;
    }

    /**
     * Add chantier
     *
     * @param \MaitreOeuvreBundle\Entity\Chantier $chantier
     * @return User
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
