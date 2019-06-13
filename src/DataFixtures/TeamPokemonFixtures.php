<?php

namespace App\DataFixtures;

use App\Entity\TeamPokemon;
use App\Entity\Pokemon;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class TeamPokemonFixtures extends Fixture
{
	
	public function load (ObjectManager $manager)
		{
			
			foreach ($this->getTeamPokemon() as [$users, $pokemons, $nickname, $pv]) 
			{
			  $TeamPokemon = new TeamPokemon();
			  $TeamPokemon	
					->setUsers($this->getReference($user))
					->setPokemons($this->getReference($pokemon))
			    	->setNicknam($pokemon)
					->setPv($pv)
			       ;

			   $manager ->persist($teamPokemon);
			  

				$this->addReference('Sacha', $user);
				$this->addReference('Salamèche', $pokemon);
			}

			$manager-> flush();
	    }  
		
	public function getTeamPokemonData(): array
		{

		  return [
			
		    	//[ Username, Pokemonname, Nickname, Pv]
			    ['Sacha', 'Salamèche', 'Charmander', 50],
			    ['Sacha', 'Carapuce', 'Charizard', 50],
			    ['Sacha', 'Bulbizare', 'Bulbasaur', 50]
		    ];

		}

	public function getOrder()
		{
			return 2;
		}
}