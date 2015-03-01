<?php

namespace Victoire\Bundle\AnalyticsBundle\Repository;

/**
 * BrowseEventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BrowseEventRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function getMostVisited(array $referencesIds, $maxNumber = 10)
    {
        return $this->createQueryBuilder('be')
            ->select('be, COUNT(be.viewReferenceId) AS HIDDEN visits')
            ->groupBy('be.viewReferenceId')
            ->andWhere('be.viewReferenceId in (:ids)')
            ->setParameter('ids', $referencesIds)
            ->setMaxResults($maxNumber)
            ->orderBy('visits', 'DESC');
    }
}