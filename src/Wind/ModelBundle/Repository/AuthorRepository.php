<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 27.07.14
 * Time: 12:18
 */

namespace Wind\ModelBundle\Repository;


use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository {

    public function findFirst() {
        $qb = $this->getQueryBuilder()
            ->orderBy('a.id', 'asc')
            ->setMaxResults(1);
        return $qb->getQuery()->getSingleResult();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('WindModelBundle:Author')
            ->createQueryBuilder('a');
        return $qb;
    }
} 