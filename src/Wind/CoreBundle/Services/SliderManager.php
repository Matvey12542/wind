<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 21.08.14
 * Time: 22:19
 */

namespace Wind\CoreBundle\Services;

use Doctrine\ORM\EntityManager;

class SliderManager {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function findAll() {
        $sliders = $this->em->getRepository('WindModelBundle:Slider')->findAll();
        return $sliders;
    }
} 