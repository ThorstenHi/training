<?php

namespace WhereGroup\Training\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WhereGroup\Training\CoreBundle\Entity\Ressource;

/**
 * Class RessourceController
 *
 * @package WhereGroup\CoreBundle\Controller
 * @author  Thorsten Hildebrand <thorsten.hildebrand@wheregroup.com>
 * @Route("/")
 */
class RessourceController extends Controller
{
    /**
     * @Route("/listRessource", name="ressource_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'ressourcen' => $this->get('wheregroup.training.ressource')->getAll()
        );
    }

    /**
     * @Route("/newRessource", name="ressource_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return array(
            'form' => $this->createForm('ressource', new Ressource())->createView()
        );
    }

    /**
     * @Route("/createRessource", name="ressource_create")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Ressource:new.html.twig")
     */
    public function createAction()
    {
        $form = $this
            ->createForm('ressource', new Ressource())
            ->submit($this->get('request'));

        if ($form->isValid()) {
            $this->get('wheregroup.training.ressource')->save($form->getData());

            return $this->redirect($this->generateUrl('ressource_index'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/editRessource/{id}", name="ressource_edit")
     * @Method("GET")
     * @Template("TrainingCoreBundle:Ressource:new.html.twig")
     */
    public function editAction($id)
    {
        return array(
            'form' => $this->createForm(
                'ressource',
                $this->get('wheregroup.training.ressource')->getById($id)
            )->createView()
        );
    }

    /**
     * @Route("/updateRessource/{id}", name="ressource_update")
     * @Method("POST")
     * @Template("TrainingCoreBundle:Ressource:new.html.twig")
     */
    public function updateAction($id)
    {
        $entity = $this->get('wheregroup.training.ressource')->getById($id);

        $form = $this
            ->createForm('ressource', $entity)
            ->submit($this->get('request'));

        if ($form->isValid()) {
            $this->get('wheregroup.training.ressource')->save($entity);

            return $this->redirect($this->generateUrl('ressource_index'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/confirmRessource/{id}", name="ressource_confirm_delete")
     * @Method("GET")
     * @Template()
     */
    public function confirmAction($id)
    {
        $entity = $this->get('wheregroup.training.ressource')->getById($id);

        $form = $this->createFormBuilder($entity)
            ->add('delete', 'submit', array('label' => 'löschen'))
            ->getForm();

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/deleteRessource/{id}", name="ressource_delete")
     * @Method("POST")
     */
    public function deleteAction($id)
    {
        $entity = $this->get('wheregroup.training.ressource')->getById($id);

        $form = $this->createFormBuilder($entity)
            ->add('delete', 'submit', array('label' => 'löschen'))
            ->getForm()
            ->submit($this->get('request'));

        if ($form->isValid()) {
            $this->get('wheregroup.training.ressource')->delete($entity);
        }

        return $this->redirect($this->generateUrl('ressource_index'));
  }
}
