<?php

namespace Acme\RedirectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    public function indexAction($name)
    {

        return $this->render('AcmeRedirectBundle:Default:index.html.twig', array('name' => $name));
    }
}
