<?php

namespace MaitreOeuvreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends EntityRepository
{
    public function listeClients()
	{
		$qb = $this->createQueryBuilder('p');
		$qb->orderBy('p.prenom','DESC');

		return $qb->getQuery()->getResult();
	}

}
