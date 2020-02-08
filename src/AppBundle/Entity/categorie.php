<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\categorieRepository")
 */
class categorie
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_evenement", type="string")
     * @ORM\Id
     */
    private $type_evenement;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return categorie
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

    /**
     * @return string
     */
    public function getTypeEvenement()
    {
        return $this->type_evenement;
    }

    /**
     * @param string $type_evenement
     */
    public function setTypeEvenement($type_evenement)
    {
        $this->type_evenement = $type_evenement;
    }

}

