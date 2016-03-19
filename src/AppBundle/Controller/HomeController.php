<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    /**
     * @Route ("/", name = "homepage")
     */

    public function indexAction()
    {
        $test = $this->getDoctrine()
            ->getRepository('AppBundle:Test')
            ->findAll();

        return $this->render('homepage/index.html.twig', array(
            "tests"     => $test,
        ));
    }
}