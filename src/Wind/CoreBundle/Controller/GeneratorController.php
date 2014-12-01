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
     * @Route("/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $slides = $this->getSliderManager()->findAll();

//        $generators = $this->getGeneratorManager()->findAll();
//      $em = $this->getDoctrine()->getManager()->getRepository('WindModelBundle:Post');
//      $main = $em->findBy(array('ontop' => true));
        $main = $this->getPostManager()->findLatest(3, 'ua');


        $generator = new Generator();
//        $generator->setTitle('Title');
        $form = $this->createFormBuilder($generator)
            ->add('title', 'text')
            ->getForm();

        if ($request->getMethod() == 'POST') {
            return $this->redirect();
        }
        return array(
            'slides' => $slides,
            'posts' =>  $main,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/generator/{slug}")
     * @Template()
     */
    public function showAction($slug) {
        $generator = $this->getGeneratorManager()->findBySlug($slug);

        return array(
            'generator' => $generator,
        );
    }

    /**
     * @Route("/upload")
     * @Template()
     * @TODO move this method to admin bundle!!!
     */
    public function uploadAction(Request $request)
    {
        $generator = new Generator();
        $form = $this->createFormBuilder($generator)
            ->add('title')
            ->add('file')
            ->add('body')
            ->add('performance')
            ->add('initial_speed')
            ->add('rated_speed')
            ->add('weight')
            ->add('price')
            ->add('author')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $generator->upload();
            $em->persist($generator);
            $em->flush();

            return $this->redirect($this->generateUrl('wind_core_generator_upload'));
        }

        return array('form' => $form->createView());
    }
    private function getPostManager() {
        return $this->get('post_manager');
    }

    /**
     * @return object
     */
    private function getGeneratorManager() {
        return $this->get('generator_manager');
    }

    /**
     * @return object
     */
    private function getSliderManager() {
        return $this->get('slider_manager');
    }

    /**
     * Login check
     *
     * @Route("upload_check")
     */
    public function uploadCheckAction() {
    }
}
