<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/starter")
 */
class StarterController extends AbstractController
{
    /**
	 * @Route ("/")
	 */
    public function index()
    
    {
    	// return array
    	$pokemonStarter = $this->getDoctrine()->getRepository(Pokemon::class)->findAll();

        return $this->render('starter/index.html.twig', [
             'pokemon' => $pokemonStarter,
        ]);
    }

}    

