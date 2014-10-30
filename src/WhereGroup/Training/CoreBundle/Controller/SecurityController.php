<?php

namespace WhereGroup\Training\CoreBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller
{

    /**
     *
     * @Route("/login", name="training_login")
     * @Template()
     */
    public function loginAction()
    {
        return array();
    }

    /**
     *
     * @Route("/login/check", name="training_login_check")
     */
    public function loginCheckAction()
    {

    }

    /**
     *
     * @Route("/logout", name="training_logout")
     */
    public function logoutAction()
    {

    }
}
