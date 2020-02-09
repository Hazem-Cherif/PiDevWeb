<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * animateur
 *
 * @ORM\Table(name="animateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\animateurRepository")
 */
class animateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string")
     * @ORM\Id
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */

    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="activiter", type="string", length=255)
     */
    private $activiter;


    /**
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param string $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return animateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return animateur
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
     * Set activiter
     *
     * @param string $activiter
     *
     * @return animateur
     */
    public function setActiviter($activiter)
    {
        $this->activiter = $activiter;

        return $this;
    }

    /**
     * Get activiter
     *
     * @return string
     */
    public function getActiviter()
    {
        return $this->activiter;
    }
    /**
     * @ORM\ManyToMany(targetEntity="formation")
     * @ORM\JoinTable(name="formation_animateur",
     *      joinColumns={@ORM\JoinColumn(name="nom", referencedColumnName="nom")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="nom", referencedColumnName="nom")}
     *      )
     */
    private $formation;


    /**
     * @return mixed
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * @param mixed $formation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;
    }
    /**
     * @ORM\ManyToMany(targetEntity="suivie")
     * @ORM\JoinTable(name="suivie_animateur",
     *      joinColumns={@ORM\JoinColumn(name="cin", referencedColumnName="cin")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id")}
     *      )
     */
    private $suivie;

    /**
     * @return mixed
     */
    public function getSuivie()
    {
        return $this->suivie;
    }

    /**
     * @param mixed $suivie
     */
    public function setSuivie($suivie)
    {
        $this->suivie = $suivie;
    }

}

