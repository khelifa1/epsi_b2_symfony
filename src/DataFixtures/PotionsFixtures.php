<?php

namespace App\DataFixtures;

use App\Entity\Potions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PotionsFixtures extends Fixture
{
		public function load (ObjectManager $manager)
		{
			$i= 1;
			foreach ($this->getPotionsData() as [$name, $vie, $description]) 
			{
			  $potions = new Potions();
			  $potions
				   	->setName($name)
				   	->setVie($vie)
					->setDescription($description)
			;

			$i++;
			//$i = $i +1;
			$manager ->persist($potions);
			$reference = $this ->addReference("potion_" . $i, $potions);
			
			}

			$manager-> flush();
		
		}

	public function getPotionsData(): array

	{
		return [
 				//['nom', vie, description]
			   	['Potion', 50, "text"],
				['SuperPotion', 75, "text"],
				['HyperPotion', 100, "text"],
		 		
		 	  ];
			        
	}

	public function getOrder()
	{
		return 1;
	}
	
}