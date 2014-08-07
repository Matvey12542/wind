<?php

namespace Wind\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     *
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('wind_admin_post_index'));
    }
}
