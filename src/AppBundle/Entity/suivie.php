<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * suivie
 *
 * @ORM\Table(name="suivie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\suivieRepository")
 */
class suivie
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
     * @ORM\Column(name="evaluation", type="string", length=255)
     */
    private $evaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat", type="string", length=255)
     */
    private $resultat;


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
     * Set evaluation
     *
     * @param string $evaluation
     *
     * @return suivie
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return string
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set resultat
     *
     * @param string $resultat
     *
     * @return suivie
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}

