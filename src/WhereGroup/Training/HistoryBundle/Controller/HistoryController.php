<?php

namespace WhereGroup\Training\HistoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class HistoryController
 *
 * @package WhereGroup\Training\HistoryBundle\Controller
 * @author  A.R.Pour <info@rpour.de>
 */
class HistoryController extends Controller
{
    /**
     * @Route("/history/{id}", name="history_show")
     * @Template()
     */
    public function showAction($id)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        return array(
            'rows' => $this->get('wheregroup.training.history')
                ->getAll($id)
        );
    }
}
