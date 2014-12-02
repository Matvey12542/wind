<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 31.10.14
 * Time: 23:47
 */

namespace Wind\CoreBundle\Services;
use Doctrine\ORM\Event\LifecycleEventArgs;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class TestEvent {
    public function postPersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        // perhaps you only want to act on some "Product" entity
//        if ($entity instanceof Product) {
//            // ... do something with the Product
//        }
    }
}