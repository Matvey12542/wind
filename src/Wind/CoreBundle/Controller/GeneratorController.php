<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wind\ModelBundle\Entity\Generator;

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
     * @Route("/upload")
     * @Template()
     */
    public function uploadAction(Request $request)
    {
        $generator = new Generator();
        $form = $this->createFormBuilder($generator)
            ->add('title')
            ->add('file')
            ->add('body')
            ->add('performance')
            ->add('author')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $generator->upload();
            $em->persist($generator);
            $em->flush();

            return $this->redirect($this->generateUrl('/'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @return object
     */
    private function getGeneratorManager() {
        return $this->get('generatorManager');
    }

    /**
     * Login check
     *
     * @Route("upload_check")
     */
    public function uploadCheckAction() {
    }
}
