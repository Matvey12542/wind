<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 21.07.14
 * Time: 13:46
 */

namespace Wind\ModelBundle\Repository;


use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {
    /**
     * Find latest
     * @param $num
     */
    public function findLatests($num)
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc')
            ->setMaxResults($num);
        return $qb->getQuery()->getResult();
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('WindModelBundle:Post')
            ->createQueryBuilder('p');
        return $qb;
    }
} 