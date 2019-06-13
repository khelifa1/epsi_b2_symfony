<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder)
	{
		$this->encoder = $encoder;
	}

	public function load(ObjectManager $manager)
	{
		foreach ($this->getUserData() as [$username, $roles, $password]){
			$user = new User();
			$encryptPassword = $this->encoder->encodePassword($user, $password);

    		$user
			   	->setUsername($username)
				->setRoles([$roles])
				->setPassword($encryptPassword)
			;

			$manager->persist($user);
		}	

   		$manager->flush();
	}

	public function getUserData(): array
	{
		return [
			//[Username, Roles, Password]
		   	['admin', 'ROLE_ADMIN', 'admin'],
			['sacha', 'ROLE_USER', 'loveOndine']
		];        
	}
}