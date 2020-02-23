<?php

namespace GarderieBundle\Repository;

/**
 * PayementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PayementRepository extends \Doctrine\ORM\EntityRepository
{
    public function getListEnfant($id)
    {
        $Query = $this->getEntityManager()->createQuery(
            "SELECT A FROM EnfantBundle:enfant A   WHERE A.garderie = :p")
            ->setParameter('p',$id);

        return $Query->getResult();
    }

    public function verifPayement($id, $dateNow)
    {
        $Query = $this->getEntityManager()->createQuery(
                "SELECT A FROM GarderieBundle:Payement A   WHERE A.enfant = :p and A.date > :date")
            ->setParameter('p',$id)
            ->setParameter('date', $dateNow);

        return $Query->getResult();
    }
}