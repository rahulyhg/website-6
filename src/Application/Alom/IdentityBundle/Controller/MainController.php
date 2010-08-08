<?php

namespace Application\Alom\IdentityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;

/**
 * Identity controller.
 *
 * Contains actions for CV page, blog page, etc.
 *
 * @author     Alexandre Salomé <alexandre.salome@gmail.com>
 */
class MainController extends Controller
{

    /**
     * CV : Static page
     */
    public function cvAction()
    {
        return $this->render('IdentityBundle:Main:cv');
    }

    /**
     * Contact : Static page
     */
    public function contactAction()
    {
        return $this->render('IdentityBundle:Main:contact');
    }
}
