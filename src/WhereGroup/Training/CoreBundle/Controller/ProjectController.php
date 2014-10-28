<?php

namespace WhereGroup\Training\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class ProjectController
 *
 * @package WhereGroup\CoreBundle\Controller
 * @author  A.R.Pour <info@rpour.de>
 * @Route("/")
 */
class ProjectController extends Controller
{
    /**
     * @Route("/", name="project_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array(
        );
    }
}
