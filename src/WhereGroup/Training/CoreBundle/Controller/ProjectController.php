<?php

namespace WhereGroup\Training\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WhereGroup\Training\CoreBundle\Entity\Project;

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
            'projects' => $this->get('wheregroup.training.project')->getAll()
        );
    }

    /**
     * @Route("/new", name="project_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return array();
    }

    /**
     * @Route("/create", name="project_create")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function createAction()
    {
        return array();
    }

    /**
     * @Route("/edit/{id}", name="project_edit")
     * @Method("GET")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function editAction($id)
    {
        return array();
    }

    /**
     * @Route("/update/{id}", name="project_update")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function updateAction($id)
    {
        return array();
    }

    /**
     * @Route("/confirm/{id}", name="project_confirm_delete")
     * @Method("GET")
     * @Template()
     */
    public function confirmAction($id)
    {
        return array();
    }

    /**
     * @Route("/delete/{id}", name="project_delete")
     * @Method("POST")
     */
    public function deleteAction($id)
    {
        return array();
  }
}
