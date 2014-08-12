<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class GeneratorController
 * @Route("{_locale}", requirements={"_locale"="en|ua"}, defaults={"_locale"="en"})
 */
class GeneratorController extends Controller
{
    /**
     * @Route("/main")
     * @Template()
     */
    public function indexAction()
    {
        $generators = $this->getGeneratorManager()->findAll();
        return array(
            'generators' =>  $generators
        );
    }
    /**
     * @return object
     */
    private function getGeneratorManager() {
        return $this->get('generatorManager');
    }
}
