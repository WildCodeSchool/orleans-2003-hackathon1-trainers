<?php

namespace App\DataFixtures;

use App\Entity\CountryCocktail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryCocktailFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $cocktails = [
            "MX" => [11007, 11008],
            "CU" => [11000, 11288],
            "FR" => [17201, 11003],
            "IT" => [17215],
        ];

        foreach ($cocktails as $countryIso => $cocktailIds)
        {
            foreach ($cocktailIds as $cocktailId) {
                $countryCocktail = new CountryCocktail();
                $countryCocktail->setCountryIso($countryIso);
                $countryCocktail->setCocktailApiId($cocktailId);

                $manager->persist($countryCocktail);
            }
        }

        $manager->flush();
    }
}


