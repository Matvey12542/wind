<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SliderController extends Controller
{
    /**
     * @Route("/slider-upload")
     * @Template()
     */
    public function SliderUploadAction()
    {
        return array(

            );
    }

}
