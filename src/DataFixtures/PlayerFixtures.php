<?php

namespace App\DataFixtures;

use App\Entity\Player;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create();


        for($i = 0; $i <= 100; $i++) {
            $firstname=$faker->firstName;
            $player_db = new Player();
            $player_db->setCreatedAt(new DateTime());
            $player_db->setFirstName($firstname);
            $player_db->setLastName($faker->lastName);


            $manager->persist($player_db);
        }

        $manager->flush();
    }
}
