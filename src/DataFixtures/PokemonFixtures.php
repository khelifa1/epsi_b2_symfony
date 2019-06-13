<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
	public function load (ObjectManager $manager)
	{
		
		foreach ($this->getPokemons() as $pokemonData) {
			
			$pokemon = new Pokemon();
			$pokemon
				->setName($pokemonData[0])
				->setPv($pokemonData[1])
				->setType($pokemonData[2])
				->addAttack($pokemonData[3])
			;

			$manager->persist($pokemon);
		}

		$manager->flush();
	}

	public function getPokemons()
	{
		//['Nom', pvMax, TYPE,'attaque de base']
		
		return [
			['Salamèche', 100, Type::TYPE_FIRE, $this->getReference('Flamèche')],
			['Carapuce', 100, Type::TYPE_PLANT, $this->getReference("Tranch'herb")],
			['Bulbizare', 100, Type::TYPE_WATER, $this->getReference('Pistolet à O')],
			['Dracaufeu', 100, Type::TYPE_NORMAL, $this->getReference('Acier')]
		];
	}

	public function getOrder()

	{
		return 2;
	}
}