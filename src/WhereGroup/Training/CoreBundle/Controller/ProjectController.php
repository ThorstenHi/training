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
        return array(
            'form' => $this->createForm('project', new Project())->createView()
        );
    }

    /**
     * @Route("/create", name="project_create")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function createAction()
    {
        $form = $this
            ->createForm('project', new Project())
            ->submit($this->get('request'));

        if ($form->isValid()) {

            $this->get('session')->getFlashBag()->add(
                'success',
                'Your changes were saved!'
            );

            $this->get('wheregroup.training.project')->save($form->getData());

            return $this->redirect($this->generateUrl('project_index'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/edit/{id}", name="project_edit")
     * @Method("GET")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function editAction($id)
    {
        return array(
            'form' => $this->createForm(
                'project',
                $this->get('wheregroup.training.project')->getById($id)
            )->createView()
        );
    }

    /**
     * @Route("/update/{id}", name="project_update")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Project:new.html.twig")
     */
    public function updateAction($id)
    {
        $entity = $this->get('wheregroup.training.project')->getById($id);

        $form = $this
            ->createForm('project', $entity)
            ->submit($this->get('request'));

        if ($form->isValid()) {
            $this->get('wheregroup.training.project')->save($entity);

            return $this->redirect($this->generateUrl('project_index'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/confirm/{id}", name="project_confirm_delete")
     * @Method("GET")
     * @Template()
     */
    public function confirmAction($id)
    {
        $entity = $this->get('wheregroup.training.project')->getById($id);

        $form = $this->createFormBuilder($entity)
            ->add('delete', 'submit', array('label' => 'löschen'))
            ->getForm();

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/delete/{id}", name="project_delete")
     * @Method("POST")
     */
    public function deleteAction($id)
    {
        $entity = $this->get('wheregroup.training.project')->getById($id);

        $form = $this->createFormBuilder($entity)
            ->add('delete', 'submit', array('label' => 'löschen'))
            ->getForm()
            ->submit($this->get('request'));

        if ($form->isValid()) {
            $this->get('wheregroup.training.project')->delete($entity);
        }

        return $this->redirect($this->generateUrl('project_index'));
  }
}
