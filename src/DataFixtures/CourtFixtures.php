<?php

namespace App\DataFixtures;

use App\Entity\Court;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourtFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $court=new Court();
        $court->setName("Platz1");
        $manager->persist($court);

        $manager->flush();
    }
}
