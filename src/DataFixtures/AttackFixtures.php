<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AttackFixtures extends Fixture
{
		public function load (ObjectManager $manager)
		{
			
			foreach ($this->getAttacksData() as [$name, $power, $type]) 
			{
			  $attack = new Attack();
			  $attack
			    	->setName($name)
				   	->setPower($power)
					->setType($type)
			;

			$manager ->persist($attack);
			$reference = $this ->addReference($name, $attack);
			
			}

			$manager-> flush();
		
		}

	public function getAttacksData(): array

	{
		return [
 				//['nom', Puissance, TYPE]
			   	['Flamèche', 90, Type::TYPE_FIRE],
				["Tranch'herb", 90, Type::TYPE_PLANT],
				['Pistolet à O', 90, Type::TYPE_WATER],
		 		['Acier', 90, Type::TYPE_NORMAL]
		 	  ];
			        
	}

	public function getOrder()
	{
		return 1;
	}
	
}