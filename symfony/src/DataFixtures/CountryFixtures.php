<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends AbstractFixtures
{
    public function load(ObjectManager $manager)
    {
        $countries = [
            'Espagne',
            'Angleterre',
            'Allemagne',
            'Italie',
            'France'
        ];

        foreach ($countries as $country) {
            $newCountry = new Country();
            $newCountry->setName($country);

            $manager->persist($newCountry);
            $this->setReference($country, $newCountry);
        }

        $manager->flush();
    }
}