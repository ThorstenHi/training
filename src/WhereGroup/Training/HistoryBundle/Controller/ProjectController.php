<?php

namespace WhereGroup\Training\HistoryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use WhereGroup\Training\CoreBundle\Controller\ProjectController AS BaseController;

/**
 * Class ProjectController
 *
 * @package WhereGroup\CoreBundle\Controller
 * @author  A.R.Pour <info@rpour.de>
 * @Route("/")
 */
class ProjectController extends BaseController
{
    /**
     * @Route("/", name="project_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $response = parent::indexAction();
        return $response;
    }
}
