<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EpisodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EpisodeRepository extends EntityRepository
{
     public function episodeDoesNotExists($episode){
        $query = $this->createQueryBuilder('e')
                    ->where('e.numeroEpisode = ?1')
                    ->setParameter(1, $episode->getNumeroEpisode())
                    ->getQuery();
        $res = $query->getOneOrNullResult();
        
        return !isset($res);
    }
}
