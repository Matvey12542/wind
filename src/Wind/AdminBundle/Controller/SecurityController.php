<?php
/**
 *
 */

namespace Wind\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller {

    /**
     * @return Response
     *
     * @Route("/login")
     */
    public function loginAction(){
        $reqeust = $this->getRequest();
        $session = $reqeust->getSession();

        if ($reqeust->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $reqeust->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else{
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'AdminBundle:Security:login.html.twig',
            array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );
    }

    /**
     * Login check
     *
     * @Route("login_check")
     */
    public function loginCheckAction() {

    }
} 