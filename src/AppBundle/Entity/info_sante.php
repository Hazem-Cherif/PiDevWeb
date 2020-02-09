<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * info_sante
 *
 * @ORM\Table(name="info_sante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\info_santeRepository")
 */
class info_sante
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
     * @ORM\Column(name="date_vaccin", type="date")
     */
    private $dateVaccin;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateVaccin
     *
     * @param \DateTime $dateVaccin
     *
     * @return info_sante
     */
    public function setDateVaccin($dateVaccin)
    {
        $this->dateVaccin = $dateVaccin;

        return $this;
    }

    /**
     * Get dateVaccin
     *
     * @return \DateTime
     */
    public function getDateVaccin()
    {
        return $this->dateVaccin;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return info_sante
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
     * @ORM\ManyToOne(targetEntity="medecin")
     * @ORM\JoinColumn(name="info_sante_medecin",referencedColumnName="cin")
     */
    private  $medecin;

    /**
     * @return mixed
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * @param mixed $medecin
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;
    }

}

