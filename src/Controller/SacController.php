<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SacController extends AbstractController
{
    /**
     * @Route("/sac", name="sac")
     */
    public function index()
    {
        return $this->render('sac/index.html.twig', [
            'controller_name' => 'SacController',
        ]);
    }
}
